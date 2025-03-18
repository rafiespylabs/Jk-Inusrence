<?php
namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tbl_jw_sale_trans;
use App\Models\Tbl_jw_sales;
use App\Models\Tbl_client;
use App\Models\Tbl_jw_saletypes;
use App\Models\Tbl_items;
use App\Models\Tbl_jw_unit;
use App\Models\Tbl_jw_livestocks;
use App\Models\Tbl_jw_hsncodes;
use Carbon\Carbon;
use Response;
use Redirect;
class SaleController extends Controller
{
    public function index()
    {
        return view('sale.index');
    }
    public function list(Request $request)
    {
        $limit = $request->input('length', 10); 
        $start = $request->input('start', 0);   
        $searchValue = $request->input('search.value');
        $query =Tbl_jw_sales::query();
        if (!empty($searchValue)) {
            $query->where('sale_invoice_num', 'like', '%' . $searchValue . '%')
                ->orWhere('sale_date', 'like', '%' . $searchValue . '%');
        }
        $totalRecords = $query->count();
        $sales= $query->skip($start)
                    ->take($limit)
                    ->with(['added_user','client'])
                    ->latest('id') 
                    ->get();
        $data = [];
        $slNo = $start + 1;
        foreach ($sales as $sale) {
            $created_user =$sale->added_user->name ?? '';
            $created_date = $sale->createddate
                ? Carbon::parse($sale->createddate)->format('d/m/Y') : '';
            $sale_date = $sale->sale_date
                ? Carbon::parse($sale->sale_date)->format('d/m/Y') : '';
            $data[] = [
                'sl_no' => $slNo++,
                'sale_invoice_num' => $sale->sale_invoice_num,
                'sale_date' =>$sale_date ,
                'client'=>$sale->client->client_name ??"N/A",
                'total_taxable_amount' =>$sale->total_taxable_amount,
                'total_qty' =>$sale->total_qty ,
                'total_cgst' =>$sale->total_cgst ,
                'total_sgst' =>$sale->total_sgst ,
                'total_igst' =>$sale->total_igst ,
                'grand_total' =>$sale->grand_total,
                'created_by' =>  $created_user,
                'created_date' => $created_date,
                'items'=>'<a href="#">Items</a>',
                'action' => '<i class="fa fa-edit edit_sale" data-id="' .$sale->id . '" data-rowid="'. $sale->id . '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>',
                'id' => $sale->id
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
        $clients=Tbl_client::latest('id')->get();
        $saletypes=Tbl_jw_saletypes::latest('id')->get();
        $items=Tbl_items::all();
        $units=Tbl_jw_unit::all();
        $hsncodes=Tbl_jw_hsncodes::all();
        return view('sale.create',['clients'=>$clients,'saletypes'=>$saletypes,'items'=>$items,
        'units'=>$units,'hsncodes'=>$hsncodes]);
    }
    public function getsale_rate(Request $request)
    {
        $batch_id=$request->batch_id;
        $item_id=$request->item_id;
        $live_stock=Tbl_jw_livestocks::where('item_id',$item_id)->where('batch_id',$batch_id)->first();
        return Response::json(['success' => true,'live_stock'=>$live_stock]);
    }
    public function getHsn(Request $request)
    {
        $hsn_id=$request->hsn_id;
        $hsn_code=Tbl_jw_hsncodes::find($hsn_id);
        return Response::json(['success' => true,'cgst'=>$hsn_code->cgst_perc,
        'sgst'=>$hsn_code->sgst_perc,'igst'=>$hsn_code->igst_perc]);   
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sale_invoice_num' => 'required|string|max:255',
            'sale_date' => 'required|date',
            'client_id' => 'nullable|integer|exists:tbl_clients,id',
            'gst_type' => 'required|integer|in:1,2',
            'sale_type_id' => 'required|integer|exists:Tbl_jw_saletypes,id',
            'item_id' => 'required|array|min:1', 
            'item_id.*' => 'required|exists:tbl_items,id',
            'batch_id' => 'required|array|min:1', 
            'batch_id.*' => 'required|exists:tbl_jw_batches,id',
            'qty' => 'required|array|min:1',
            'qty.*' => 'required|integer|min:1',
            'unit_id' => 'required|array|min:1', 
            'unit_id.*' => 'required|exists:tbl_jw_units,id',
            'hsn_id' => 'required|array|min:1', 
            'hsn_id.*' => 'required|exists:tbl_jw_hsncodes,id',
            'sale_rate' => 'required|array|min:1',
            'sale_rate.*' => 'required|numeric|min:0',
            'sub_taxable_amount' => 'required|array|min:1',
            'sub_taxable_amount.*' => 'required|numeric|min:0',
            'cgst' => 'nullable|array|min:1',
            'cgst.*' => 'nullable|numeric|min:0',
            'sgst' => 'nullable|array|min:1',
            'sgst.*' => 'nullable|numeric|min:0',
            'igst' => 'nullable|array|min:1',
            'igst.*' => 'nullable|numeric|min:0',
            'subtotal_amount' => 'required|array|min:1',
            'subtotal_amount.*' => 'required|numeric|min:0',
            'total_taxable_amount' => 'required|numeric|min:0',
            'total_cgst' => 'required|numeric|min:0',
            'total_sgst' => 'required|numeric|min:0',
            'total_igst' => 'required|numeric|min:0',
            'total_qty' => 'required|numeric|min:0',
            'grand_total' => 'required|numeric|min:0',
        ]);
        try 
        {
            $existsaleInvoiceNum =Tbl_jw_sales::where('sale_invoice_num',$validatedData['sale_invoice_num'] )->exists();
            if($existsaleInvoiceNum)
            {
                return Response::json(['success' => false,'message'=>'Sale Invoice Number Already Exist']);
            }
            $item_id=$validatedData['item_id'];
            $batch_id=$validatedData['batch_id'];
            $qty=$validatedData['qty'];
            $unit_id=$validatedData['unit_id'];
            $hsn_id=$validatedData['hsn_id'];
            $sale_rate=$validatedData['sale_rate'];
            $sub_taxable_amount=$validatedData['sub_taxable_amount'];
            $cgst=$validatedData['cgst'];
            $sgst=$validatedData['sgst'];
            $igst=$validatedData['igst'];
            $subtotal_amount=$validatedData['subtotal_amount'];

            $created_by=Auth::user()->id;
            $currentdate=Carbon::now()->format('Y-m-d H:i:s');
            $sale=new Tbl_jw_sales;
            $sale->sale_invoice_num=$validatedData['sale_invoice_num'];
            $sale->sale_date=$validatedData['sale_date'];
            $sale->client_id=$validatedData['client_id'];
            $sale->gst_type=$validatedData['gst_type'];
            $sale->sale_type_id=$validatedData['sale_type_id'];
            $sale->total_taxable_amount=$validatedData['total_taxable_amount'];
            $sale->total_cgst=$validatedData['total_cgst'];
            $sale->total_sgst=$validatedData['total_sgst'];
            $sale->total_igst=$validatedData['total_igst'];
            $sale->total_qty=$validatedData['total_qty'];
            $sale->grand_total=$validatedData['grand_total'];
            $sale->createdby=$created_by;
            $sale->createddate=$currentdate;
            $sale->save();
                for ($i = 0; $i < count($item_id); $i++) 
                {
                    $sale_trans=new Tbl_jw_sale_trans;
                    $sale_trans->sale_id= $sale->id;
                    $sale_trans->item_id= $item_id[$i];
                    $sale_trans->batch_id= $batch_id[$i];
                    $sale_trans->qty= $qty[$i];
                    $sale_trans->unit_id= $unit_id[$i];
                    $sale_trans->hsn_id= $hsn_id[$i];
                    $sale_trans->sale_rate= $sale_rate[$i];
                    $sale_trans->sub_taxable_amount	= $sub_taxable_amount[$i];
                    $sale_trans->cgst= $cgst[$i];
                    $sale_trans->sgst= $sgst[$i];
                    $sale_trans->igst= $igst[$i];
                    $sale_trans->subtotal_amount= $subtotal_amount[$i];
                    $sale_trans->createdby= $created_by;
                    $sale_trans->createddate= $currentdate;
                    $sale_trans->save();
                    $checkLiveStock=Tbl_jw_livestocks::where('item_id',$item_id[$i])->where('batch_id',$batch_id[$i])->first();
                    if($checkLiveStock)
                    {
                        $checkLiveStock->qty=($checkLiveStock->qty-intval($qty[$i]));
                        $checkLiveStock->save();
                    }
                }
                return response()->json([
                    'success' => true,
                    'message' => 'Sale Added Successfully',
                ]);
        }catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create Purchase: ' . $e->getMessage(),
            ], 500);
        }
    }
}
