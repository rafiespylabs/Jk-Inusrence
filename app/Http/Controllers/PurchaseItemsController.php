<?php
namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tbl_jw_purchase_trans;
use App\Models\Tbl_jw_purchases;
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
    public function list(Request $request)
    {
        $purchase_id = $request->input('purchase_id', null);
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
                'action' => '',
                'id' => $Item->id
            ];
        }
        return response()->json([
            'draw' => intval($request->input('draw')), 
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $searchValue ? $query->count() : $totalRecords,
            'data' => $data,
        ]);
    }
}
