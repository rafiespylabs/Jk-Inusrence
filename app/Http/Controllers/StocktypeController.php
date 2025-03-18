<?php

namespace App\Http\Controllers;

use App\Models\Tbl_jw_stocktypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class StocktypeController extends Controller
{
    public function index()
    {
        $stocktypes=Tbl_jw_stocktypes::with(['createdByUser','editedByUser'])->get();
        return view('admin.stocktypes',['stocktypes'=>$stocktypes]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'stock_type' => 'required|string|max:100',           
        ]);


        try {  

            $stocktypes = new Tbl_jw_stocktypes();
            $stocktypes->stock_type  = $validatedData['stock_type'];           
            $stocktypes->created_by = Auth::user()->name;           
            $stocktypes->created_date = Carbon::now();             
            $stocktypes->save();
            
            return response()->json([
                'success' => true,
                'message' => 'stock type created successfully',
                'data' => $stocktypes,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create stock type : ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $stocktypes = Tbl_jw_stocktypes::find($request->stocktypes_id);
    
        if (!$stocktypes) {
            return response()->json(['success' => false, 'message' => 'stock type not found'], 404);
        }
    
        return response()->json([
            'success' => true,
            'data' => $stocktypes
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_jw_stocktypes,id',
            'stock_type' => 'required|string|max:255', 
            
        ]);

        $stocktypes = Tbl_jw_stocktypes::find($validatedData['id']);
        $stocktypes->stock_type = $validatedData['stock_type'];             
        $stocktypes->edited_by = Auth::user()->name;
        $stocktypes->edited_date = Carbon::now();         
        $stocktypes->save();
       
        return response()->json([
            'success' => true,
            'message' => 'stock type updated successfully',
            'data' => $stocktypes,
        ]);
    }

    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_jw_stocktypes,id',
        ]);

        $stocktypes = Tbl_jw_stocktypes::find($validatedData['id']);
        if (!$stocktypes) {
            return response()->json([
                'success' => false,
                'message' => 'stock type not found',
            ], 404);
        }
        $stocktypes->delete();

        return response()->json([
            'success' => true,
            'message' => 'stock type deleted successfully',
        ]);
    } 
}
