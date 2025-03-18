<?php

namespace App\Http\Controllers;

use App\Models\Tbl_items;
use App\Models\Tbl_jw_batches;
use App\Models\Tbl_jw_openingstocks;
use App\Models\Tbl_jw_stocktypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;


class OpeningstockController extends Controller
{
    public function index()
    {
        $openstocks=Tbl_jw_openingstocks::with(['createdByUser','editedByUser','item','batch','stocktype'])->get();
        $item = Tbl_items::all();
        $batch = Tbl_jw_batches::all();
        $stocktype = Tbl_jw_stocktypes::all();
        return view('admin.openingstocks',[
            'openstocks'=>$openstocks,
            'item'=>$item,
            'batch'=>$batch,
            'stocktype'=>$stocktype
        ]);
    }

    public function list(Request $request)
    {
        $limit = $request->input('length', 10);
        $start = $request->input('start', 0);
        $searchValue = $request->input('search.value');
    
        $query = Tbl_jw_openingstocks::with(['createdByUser', 'editedByUser', 'item','batch','stocktype']);
    
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->whereHas('item', function ($q) use ($searchValue) {
                    $q->where('item_name', 'like', "%$searchValue%")
                      ->orWhere('item_code', 'like', "%$searchValue%");
                })
                ->orWhereHas('batch', function ($q) use ($searchValue) {
                    $q->where('batch', 'like', "%$searchValue%"); // Assuming 'batch_code' exists
                })
                ->orWhereHas('stock_type', function ($q) use ($searchValue) {
                    $q->where('stock_type', 'like', "%$searchValue%"); // Assuming 'name' exists in stocktype table
                });
            });
        }
    
    
        $totalRecords = Tbl_jw_openingstocks::count(); 
    
        $filteredQuery = clone $query; 
        $filteredRecords = $filteredQuery->count(); 
    
        $openstocks = $query->skip($start)
            ->take($limit)
            ->latest('id')
            ->get();
    
        $data = [];
        $slNo = $start + 1;
        foreach ($openstocks as $openstock) {
            $createdUser = Auth::user()->name ?? ' ';
            $editedUser = $openstock->updated_at ? optional(Auth::user())->name ?? ' ' : ''; 
            $createdDate = $openstock->created_at ? Carbon::parse($openstock->created_at)->format('d/m/Y h:i A') : '';
            $editedDate = $openstock->updated_at ? Carbon::parse($openstock->updated_at)->format('d/m/Y h:i A') : '';
            
            $editButton = '<button class="btn btn-sm btn-primary edit_openstocks" onclick="editopenstocks('.$openstock->id.')" title="Edit">
                            <i class="fa fa-edit"></i>
                          </button>';
            $deleteButton = '<button class="btn btn-sm btn-danger delete_openstocks" onclick="deleteopenstocks('.$openstock->id.')" title="Delete">
                                <i class="fa fa-trash"></i>
                             </button>';
    
            $data[] = [
                'sl_no' => $slNo++,
                'item_name' => optional($openstock->item)->item_name ?? ' ',
                'item_code' => optional($openstock->item)->item_code ?? ' ', 
                'batch' => optional($openstock->batch)->batch ?? ' ',
                'pur_rate' => $openstock->pur_rate,
                'sale_rate' => $openstock->sale_rate,
                'mrp' => $openstock->mrp,
                'qty' => $openstock->qty,
                'stock_type' => $openstock->stock_type,
                'created_by' => $createdUser,
                'created_date' => $createdDate,
                'edited_by' => $editedUser,
                'edited_date' => $editedDate,
                'action' => $editButton . ' ' . $deleteButton,
                'id' => $openstock->id,
            ];
        }
    
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $data,
        ]);
    }
    
    

    public function fetch(Request $request)
    {
        Log::info($request->all());
    
        $item = null;
        
        if ($request->has('item_code')) {
            $item = Tbl_items::where('item_code', $request->item_code)->first();
        } elseif ($request->has('item_name')) {
            $item = Tbl_items::where('item_name', 'LIKE', '%' . $request->item_name . '%')->first();
        }
    
        if (!$item) {
            return response()->json(['success' => false, 'message' => 'Item not found']);
        }
    
        $latestStock = Tbl_jw_openingstocks::where('item_id', $item->id)
                        ->with(['batch', 'stocktype']) 
                        ->latest('createddate') 
                        ->first();
    
        return response()->json([
            'success' => true,
            'item_name' => $item->item_name,
            'item_code' => $item->item_code,            
            'batch_id' => optional($latestStock)->batch_id,
            'pur_rate' => optional($latestStock)->pur_rate ?? 0,
            'sale_rate' => optional($latestStock)->sale_rate ?? 0,
            'mrp' => optional($latestStock)->mrp ?? 0,
            'qty' => optional($latestStock)->qty ?? 0,
            'stocktype_id' => optional($latestStock)->stocktype_id,
        ]);
    }
        public function show(Request $request)
        {
           $openstock =Tbl_jw_openingstocks::with('item')->find($request->openstocks_id);
            if (!$openstock) {
                return response()->json(['message' => 'openstocks not found'], 404);
            }
            return response()->json([
                'success' => true,
                'data' => $openstock
            ]);
        }
    
        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'item_name' => 'required|string|exists:tbl_items,item_name', 
            'item_code' => 'required|string|exists:tbl_items,item_code', 
            'batch_id' => 'required|integer|exists:tbl_jw_batches,id', 
            'pur_rate' => 'required|numeric|min:0',   
            'sale_rate' => 'required|numeric|min:0',         
            'mrp' => 'required|numeric|min:0',         
            'qty' => 'required|numeric|min:0', 
            'stocktype_id' => 'required|integer|exists:tbl_jw_stocktypes,id',       
            ]);
            try {  
                $item = Tbl_items::where('item_name', $validatedData['item_name'])
                        ->where('item_code', $validatedData['item_code'])
                        ->first();

                        if (!$item) {
                            return response()->json([
                                'success' => false,
                                'message' => 'Item not found!',
                            ], 400);
                        }

    
                $openstocks = new Tbl_jw_openingstocks();
                $openstocks->batch_id  = $validatedData['batch_id'];    
                $openstocks->pur_rate   = $validatedData['pur_rate'];    
                $openstocks->sale_rate  = $validatedData['sale_rate'];    
                $openstocks->mrp  = $validatedData['mrp'];    
                $openstocks->qty  = $validatedData['qty'];    
                $openstocks->stocktype_id  = $validatedData['stocktype_id'];    
                $openstocks->item_id = $item->id;        
                $openstocks->createdby = Auth::user()->id;           
                $openstocks->createddate= Carbon::now();             
                $openstocks->save();
                return response()->json([
                    'success' => true,
                    'message' => 'openstock created successfully',
                    'data' => [
                        'id' => $openstocks->id,                        
                        'item_name' => $item->item_name,
                        'item_code' => $item->item_code,
                        'batch_id' => $openstocks->batch_id,
                        'pur_rate' => $openstocks->pur_rate,
                        'sale_rate' => $openstocks->sale_rate,
                        'mrp' => $openstocks->mrp,
                        'qty' => $openstocks->qty,
                        'stocktype_id' => $openstocks->stocktype_id,
                        'created_by' => $openstocks->created_by,
                        'created_date' => $openstocks->created_date,
                    ],
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to create openstocks : ' . $e->getMessage(),
                ], 500);
            }
        }

    
    public function edit($id)
    {
        $openstocks = Tbl_jw_openingstocks::with('item')->find($id);
    
        if (!$openstocks) {
            return response()->json(['success' => false, 'message' => 'openstocks not found'], 404);
        }
    
        return response()->json([
            'success' => true,
            'data' => $openstocks
        ]);
    }
        public function update(Request $request)
        {
            $validatedData = $request->validate([
                'id' => 'required|exists:tbl_jw_openingstocks,id',
                'item_id' => 'required|integer|exists:tbl_items,id',  
                'batch_id' => 'required|integer|exists:tbl_jw_batches,id', 
            'pur_rate' => 'required|numeric|min:0',   
            'sale_rate' => 'required|numeric|min:0',         
            'mrp' => 'required|numeric|min:0',         
            'qty' => 'required|numeric|min:0', 
            'stocktype_id' => 'required|integer|exists:tbl_jw_stocktypes,id',   
                
            ]);
    
            $openstocks = Tbl_jw_openingstocks::find($validatedData['id']);
            $openstocks->batch = $validatedData['batch'];             
            $openstocks->item_id = $validatedData['item_id'];             
            $openstocks->edited_by = Auth::user()->name;
            $openstocks->edited_date = Carbon::now();         
            $openstocks->save();
            
            $item = Tbl_items::find($validatedData['item_id']);
            $openstocks->item_name = $item->item_name;
           
            return response()->json([
                'success' => true,
                'message' => 'openstocks updated successfully',
                'data' => $openstocks,
            ]);
        }
    
        public function destroy(Request $request)
        {
            $validatedData = $request->validate([
                'id' => 'required|exists:tbl_jw_openingstocks,id',
            ]);
    
            $openstocks = Tbl_jw_openingstocks::find($validatedData['id']);
            if (!$openstocks) {
                return response()->json([
                    'success' => false,
                    'message' => 'batch not found',
                ], 404);
            }
            $openstocks->delete();
    
            return response()->json([
                'success' => true,
                'message' => 'openstocks deleted successfully',
            ]);
        } 
}
