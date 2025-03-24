<?php
namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tbl_jw_purchases;
use App\Models\Tbl_jw_purchase_trans;
use App\Models\Tbl_supplier;
use App\Models\Tbl_items;
use App\Models\Tbl_jw_purchasetypes;
use App\Models\Tbl_jw_unit;
use App\Models\Tbl_jw_livestocks;
use Carbon\Carbon;
use Response;
use Redirect;
class PurchaseController extends Controller
{
    public function index()
    {
        return view('purchase.index');
    }
    public function list(Request $request)
    {
        $limit = $request->input('length', 10); 
        $start = $request->input('start', 0);   
        $searchValue = $request->input('search.value');
        $query =Tbl_jw_purchases::query();
        if (!empty($searchValue)) {
            $query->where('invoice_num', 'like', '%' . $searchValue . '%')
                ->orWhere('purchase_date', 'like', '%' . $searchValue . '%');
        }
        $totalRecords = $query->count();
        $purchases= $query->skip($start)
                    ->take($limit)
                    ->with(['added_user','supplier'])
                    ->latest('id') 
                    ->get();
        $data = [];
        $slNo = $start + 1;
        foreach ($purchases as $purchase) {
            $created_user =$purchase->added_user->name ?? '';
            $created_date = $purchase->createddate
                ? Carbon::parse($purchase->createddate)->format('d/m/Y') : '';
            $purchase_date = $purchase->purchase_date
                ? Carbon::parse($purchase->purchase_date)->format('d/m/Y') : '';
            $data[] = [
                'sl_no' => $slNo++,
                'invoice_number' => $purchase->invoice_num,
                'purchase_date' =>$purchase_date ,
                'supplier'=>$purchase->supplier->supplier_name ??"N/A",
                'total_taxable_amount' =>$purchase->total_taxable_amount,
                'total_tax' =>$purchase->total_tax ,
                'total_qty' =>$purchase->total_qty ,
                'grand_total' =>$purchase->grand_total ,
                'created_by' =>  $created_user,
                'created_date' => $created_date,
                'items'=>'<a href="/purchaseitems/' . $purchase->id . '">Items</a>',
                'action' => '<i class="fa fa-edit edit_purchase" data-id="' . $purchase->id . '" data-rowid="'. $purchase->id . '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>',
                'id' => $purchase->id
            ];
        }
        return response()->json([
            'draw' => intval($request->input('draw')), 
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $searchValue ? $query->count() : $totalRecords,
            'data' => $data,
        ]);
    }
    public function create()
    {
        $suppliers=Tbl_supplier::all();
        $items=Tbl_items::all();
        $units=Tbl_jw_unit::all();
        $purchasetypes=Tbl_jw_purchasetypes::all();
        return view('purchase.create',['suppliers'=>$suppliers,
        'items'=>$items,'units'=>$units,'purchasetypes'=>$purchasetypes]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'invoice_num' => 'required|string|max:255',
            'purchase_date' => 'required|date',
            'supplier_id' => 'nullable|integer|exists:tbl_suppliers,id',
            'item_id' => 'required|array|min:1', 
            'item_id.*' => 'required|exists:tbl_items,id',
            'batch_id' => 'required|array|min:1', 
            'batch_id.*' => 'required|exists:tbl_jw_batches,id',
            'qty' => 'required|array|min:1',
            'qty.*' => 'required|integer|min:1',
            'unit_id' => 'required|array|min:1', 
            'unit_id.*' => 'required|exists:tbl_jw_units,id',
            'purchase_type_id' => 'required|array|min:1',
            'purchase_type_id.*' => 'required|exists:tbl_jw_purchasetypes,id',
            'pur_rate' => 'required|array|min:1',
            'pur_rate.*' => 'required|numeric|min:0',
            'sale_rate' => 'required|array|min:1',
            'sale_rate.*' => 'required|numeric|min:0',
            'mrp' => 'required|array|min:1',
            'mrp.*' => 'required|numeric|min:0',
            'subtotal' => 'required|array|min:1',
            'subtotal.*' => 'required|numeric|min:0',
            'total_taxable_amount' => 'required|numeric|min:0',
            'total_tax' => 'required|numeric|min:0',
            'total_qty' => 'required|numeric|min:0',
            'grand_total' => 'required|numeric|min:0',
        ]);
        try {

            $existInvoiceNum =Tbl_jw_purchases::where('invoice_num',$validatedData['invoice_num'] )->exists();
            if($existInvoiceNum)
            {
                return Response::json(['success' => false,'message'=>'Invoice Number Already Exist']);
            }
              $item_id=$validatedData['item_id'];
              $batch_id=$validatedData['batch_id'];
              $qty=$validatedData['qty'];
              $unit_id=$validatedData['unit_id'];
              $purchase_type_id=$validatedData['purchase_type_id'];
              $pur_rate=$validatedData['pur_rate'];
              $sale_rate=$validatedData['sale_rate'];
              $mrp=$validatedData['mrp'];
              $subtotal=$validatedData['subtotal'];

              $created_by=Auth::user()->id;
              $currentdate=Carbon::now()->format('Y-m-d H:i:s');
              $purchase=new Tbl_jw_purchases;
              $purchase->invoice_num=$validatedData['invoice_num'];
              $purchase->purchase_date=$validatedData['purchase_date'];
              $purchase->supplier_id=$validatedData['supplier_id'];
              $purchase->total_taxable_amount=$validatedData['total_taxable_amount'];
              $purchase->total_tax=$validatedData['total_tax'];
              $purchase->total_qty=$validatedData['total_qty'];
              $purchase->grand_total=$validatedData['grand_total'];
              $purchase->createdby=$created_by;
              $purchase->createddate=$currentdate;
              $purchase->save();
              
            for ($i = 0; $i < count($item_id); $i++) 
            {                
                $purchase_trans=new Tbl_jw_purchase_trans;
                $purchase_trans->purchase_id= $purchase->id;
                $purchase_trans->item_id= $item_id[$i];
                $purchase_trans->batch_id= $batch_id[$i];
                $purchase_trans->qty= $qty[$i];
                $purchase_trans->unit_id= $unit_id[$i];
                $purchase_trans->pur_rate= $pur_rate[$i];
                $purchase_trans->sale_rate= $sale_rate[$i];
                $purchase_trans->mrp= $mrp[$i];
                $purchase_trans->subtotal= $subtotal[$i];
                $purchase_trans->purchase_type_id=$purchase_type_id[$i];
                $purchase_trans->createdby= $created_by;
                $purchase_trans->createddate= $currentdate;
                $purchase_trans->save();

                $item=Tbl_items::find($item_id[$i]);

                $checkLiveStock=Tbl_jw_livestocks::where('item_id',$item_id[$i])->where('batch_id',$batch_id[$i])->first();
                if($checkLiveStock){
                    $checkLiveStock->qty=($checkLiveStock->qty+intval($qty[$i]));
                    $checkLiveStock->save();
                }
                else{
                    $LiveStock=new Tbl_jw_livestocks;
                    $LiveStock->item_id= $item_id[$i];
                    $LiveStock->batch_id= $batch_id[$i];
                    $LiveStock->manufacturer_id= $item->manufacturer_id;
                    $LiveStock->pur_rate= $pur_rate[$i];
                    $LiveStock->sale_rate= $sale_rate[$i];
                    $LiveStock->mrp= $mrp[$i];
                    $LiveStock->qty= $qty[$i];
                    $LiveStock->save();
                }
            }
            return response()->json([
                'success' => true,
                'message' => 'Purchase Added Successfully',
            ]);
        }catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create Purchase: ' . $e->getMessage(),
            ], 500);
        }
    }
}
