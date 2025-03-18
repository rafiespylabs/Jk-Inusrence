<?php

namespace App\Http\Controllers;

use App\Models\Tbl_jw_purchasetypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PurchasetypeController extends Controller
{
    public function index()
    {
        $purchasetypes=Tbl_jw_purchasetypes::with(['createdByUser','editedByUser'])->get();
        return view('admin.purchasetypes',['purchasetypes'=>$purchasetypes]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',           
        ]);

        try {  

            $purchasetypes = new Tbl_jw_purchasetypes();
            $purchasetypes->name  = $validatedData['name'];           
            $purchasetypes->created_by = Auth::user()->name;           
            $purchasetypes->created_date = Carbon::now();             
            $purchasetypes->save();
            
            return response()->json([
                'success' => true,
                'message' => 'purchase type created successfully',
                'data' => $purchasetypes,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create purchase type : ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $purchasetypes = Tbl_jw_purchasetypes::find($request->purchasetypes_id);
    
        if (!$purchasetypes) {
            return response()->json(['success' => false, 'message' => 'purchase type not found'], 404);
        }
    
        return response()->json([
            'success' => true,
            'data' => $purchasetypes
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_jw_purchasetypes,id',
            'name' => 'required|string|max:255', 
            
        ]);

        $purchasetypes = Tbl_jw_purchasetypes::find($validatedData['id']);
        $purchasetypes->name = $validatedData['name'];             
        $purchasetypes->edited_by = Auth::user()->name;
        $purchasetypes->edited_date = Carbon::now();         
        $purchasetypes->save();
       
        return response()->json([
            'success' => true,
            'message' => 'purchase type updated successfully',
            'data' => $purchasetypes,
        ]);
    }

    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_jw_purchasetypes,id',
        ]);

        $purchasetypes = Tbl_jw_purchasetypes::find($validatedData['id']);
        if (!$purchasetypes) {
            return response()->json([
                'success' => false,
                'message' => 'purchase type not found',
            ], 404);
        }
        $purchasetypes->delete();

        return response()->json([
            'success' => true,
            'message' => 'purchase type deleted successfully',
        ]);
    } 
}
