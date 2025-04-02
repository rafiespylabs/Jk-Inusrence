<?php
namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tbl_jw_purchase_trans;
use App\Models\Tbl_jw_purchases;
use App\Models\Tbl_supplier;
use App\Models\Tbl_items;
use App\Models\Tbl_jw_purchasetypes;
use App\Models\Tbl_jw_unit;
use App\Models\Tbl_jw_livestocks;
use App\Models\Tbl_jw_batches;
use App\Models\Tbl_manufacturers;
use App\Models\Tbl_jw_hsncodes;
use App\Models\Tbl_jw_category;
use App\Models\Tbl_jw_subcategory;
use Carbon\Carbon;
use Response;
use Redirect;
class PurchaseItemsController extends Controller
{
    public function index($purchase_id)
    {
        $purchase=Tbl_jw_purchases::find($purchase_id);
        return view('purchase.purchase_items',['purchase_id'=>$purchase_id,'purchase'=>$purchase]);
    }

    public function addItems($id){
        $suppliers=Tbl_supplier::all();
        $items=Tbl_items::all();
        $units=Tbl_jw_unit::all();
        $batches=Tbl_jw_batches::all();
        $purchasetypes=Tbl_jw_purchasetypes::all();
        $manufacturers=Tbl_manufacturers::all();
        $hsncode=Tbl_jw_hsncodes::all();
        $category = Tbl_jw_category::all();
        $subcategory = Tbl_jw_subcategory::all();
        return view('purchase.additem', ["purchaseId" => $id,'suppliers'=>$suppliers,
        'items'=>$items,'units'=>$units,'purchasetypes'=>$purchasetypes,'batches'=>$batches,'manufacturers'=>$manufacturers,'hsncodes'=>$hsncode,'category'=>$category,'subcategory'=>$subcategory]);
    }

    public function list(Request $request)
    {
        $purchase_id = $request->input('purchase_id');
        $limit = $request->input('length', 10); 
        $start = $request->input('start', 0);   
        $searchValue = $request->input('search.value');
        $query =Tbl_jw_purchase_trans::query();
        if (!empty($searchValue)) {
            $query->whereHas('item', function ($q) use ($searchValue) {
                    $q->where('item_name', 'like', "%$searchValue%");
                    })
                    ->orWhereHas('batch', function ($q) use ($searchValue) {
                        $q->where('batch', 'like', "%$searchValue%");
                    });
        }
        if(!empty($purchase_id))
        {
            $query->where('purchase_id', $purchase_id);
        }
        $totalRecords = $query->count();
        $PurchaseItems= $query->skip($start)
                    ->take($limit)
                    ->with(['item','batch','unit'])
                    ->latest('id') 
                    ->get();
        $data = [];
        $slNo = $start + 1;
        foreach ($PurchaseItems as $Item) {
            $editButton = '<button class="btn btn-sm btn-primary" onclick="editItemModal('.$Item->id.')" title="Edit">
                            <i class="fa fa-edit"></i>';
            $data[] = [
                'sl_no' => $slNo++,
                'item' => $Item->item->item_name ?? 'N/A',
                'batch' =>$Item->batch->batch ?? 'N/A' ,
                'unit'=>$Item->unit->unit_name ??"N/A",
                'quantity' =>$Item->qty,
                'purchase_rate' =>$Item->pur_rate ,
                'sale_rate' =>$Item->sale_rate ,
                'mrp' =>$Item->mrp ,
                'subtotal' =>$Item->subtotal,
                'action' => $editButton,
                'id' => $Item->id
            ];
        }
        return response()->json([
            'draw' => intval($request->input('draw')), 
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $searchValue ? $query->count() : $totalRecords,
            'data' => $data,
            'purchase_id' => $purchase_id
        ]);
    }

    public function getItemDetails(Request $request)
    {
        $item = Tbl_items::with(['manufacturer', 'hsn_code'])
            ->where('id', $request->item_id)
            ->first();
        $itemBatches = Tbl_jw_batches::where('item_id',$request->item_id)->get();

        if (!$item) {
            return response()->json(['success' => false, 'message' => 'Item not found'], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'manufacturer_id' => $item->manufacturer_id,
                'hsn_code_id' => $item->hsn_code_id,
                'batches' => $itemBatches
            ]
        ]);
    }

    public function getBatchForItem(Request $request){
        $latestBatch = Tbl_jw_batches::orderBy('id', 'desc')
        ->first();

        $newBatchNumber = 'batch0'; 

        if ($latestBatch) {
            preg_match('/(\d+)$/', $latestBatch->batch, $matches);
            $currentBatchNumber = isset($matches[1]) ? (int)$matches[1] : 0;
            $newBatchNumber = 'batch' . ($currentBatchNumber + 1);
        }

        return response()->json(['success' => true,'data' => ['newBatch' => $newBatchNumber]]);
    }

    public function addBatch(Request $request){
        $request->validate([
            'item_id_batch' => 'required|exists:tbl_items,id',
            'batch' => 'required|string|unique:tbl_jw_batches,batch',
        ]);
    
        $batch = new Tbl_jw_batches();
        $batch->item_id = $request->item_id_batch;
        $batch->batch = $request->batch;
        $batch->created_by = auth()->user()->id;
        $batch->created_date=date('Y-m-d');
        $batch->save();

        $itemBatches = Tbl_jw_batches::all();
    
        return response()->json([
            'message' => 'Batch created successfully!',
            'batch' => $batch,
            'batches' => $itemBatches
        ], 201);
    }

    public function calculateTotals()
    {
        $totals = Tbl_jw_purchase_trans::selectRaw("
            SUM(qty) as total_qty, 
            SUM(qty * pur_rate) as total_purchase_amount, 
            SUM(qty * sale_rate) as total_sale_amount,
            SUM(qty * mrp) as total_mrp,
            SUM(subtotal) as total_subtotal
        ")->first();

        return response()->json([
            'total_qty' => $totals->total_qty ?? 0,
            'total_purchase_amount' => $totals->total_purchase_amount ?? 0,
            'total_sale_amount' => $totals->total_sale_amount ?? 0,
            'total_mrp' => $totals->total_mrp ?? 0,
            'total_subtotal' => $totals->total_subtotal ?? 0,
        ]);
    }

    public function storePurchaseDetails(Request $request)
    {
        $validatedData = $request->validate([
            'purchase_id' => 'required|exists:tbl_jw_purchases,id',
            'item_id' => 'required|exists:tbl_items,id',
            'batch_id' => 'required|exists:tbl_jw_batches,id',
            'qty' => 'required|integer|min:1',
            'unit_id' => 'required|exists:tbl_jw_units,id',
            'purchase_type_id' => 'required|exists:tbl_jw_purchasetypes,id',
            'pur_rate' => 'required|numeric|min:0',
            'sale_rate' => 'required|numeric|min:0',
            'mrp' => 'required|numeric|min:0',
            // 'subtotal' => 'required|numeric|min:0',
        ]);

        try {
            $purchase_id = $validatedData['purchase_id'];
            $item_id = $validatedData['item_id'];
            $batch_id = $validatedData['batch_id'];
            $qty = $validatedData['qty'];
            $unit_id = $validatedData['unit_id'];
            $purchase_type_id = $validatedData['purchase_type_id'];
            $pur_rate = $validatedData['pur_rate'];
            $sale_rate = $validatedData['sale_rate'];
            $mrp = $validatedData['mrp'];
            // $subtotal = $validatedData['subtotal'];
            $subtotal = $mrp;

            $created_by = Auth::user()->id;
            $currentdate = Carbon::now()->format('Y-m-d H:i:s');


            $purchase_trans = new Tbl_jw_purchase_trans;
            $purchase_trans->purchase_id = $purchase_id;
            $purchase_trans->item_id = $item_id;
            $purchase_trans->batch_id = $batch_id;
            $purchase_trans->qty = $qty;
            $purchase_trans->unit_id = $unit_id;
            $purchase_trans->pur_rate = $pur_rate;
            $purchase_trans->sale_rate = $sale_rate;
            $purchase_trans->mrp = $mrp;
            $purchase_trans->subtotal = $subtotal;
            $purchase_trans->purchase_type_id = $purchase_type_id;
            $purchase_trans->createdby = $created_by;
            $purchase_trans->createddate = $currentdate;
            $purchase_trans->save();

            $item = Tbl_items::find($item_id);
            $checkLiveStock = Tbl_jw_livestocks::where('item_id', $item_id)
                                                ->where('batch_id', $batch_id)
                                                ->first();
            if ($checkLiveStock) {
                $checkLiveStock->qty = ($checkLiveStock->qty + intval($qty));
                $checkLiveStock->save();
            } else {
                $LiveStock = new Tbl_jw_livestocks;
                $LiveStock->item_id = $item_id;
                $LiveStock->batch_id = $batch_id;
                $LiveStock->manufacturer_id = $item->manufacturer_id;
                $LiveStock->pur_rate = $pur_rate;
                $LiveStock->sale_rate = $sale_rate;
                $LiveStock->mrp = $mrp;
                $LiveStock->qty = $qty;
                $LiveStock->save();
            }

            return response()->json([
                'success' => true,
                'message' => 'Purchase details added successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add Purchase details: ' . $e->getMessage(),
            ], 500);
        }
    }
}
