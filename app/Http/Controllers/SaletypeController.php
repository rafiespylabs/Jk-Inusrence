<?php

namespace App\Http\Controllers;

use App\Models\Tbl_jw_saletypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SaletypeController extends Controller
{
    public function index()
    {
        $saletypes=Tbl_jw_saletypes::with(['createdByUser','editedByUser'])->get();
        return view('admin.saletypes',['saletypes'=>$saletypes]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',           
        ]);

        try {  

            $saletypes = new Tbl_jw_saletypes();
            $saletypes->name  = $validatedData['name'];           
            $saletypes->created_by = Auth::user()->name;           
            $saletypes->created_date = Carbon::now();             
            $saletypes->save();
            
            return response()->json([
                'success' => true,
                'message' => 'sale type created successfully',
                'data' => $saletypes,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create sale type : ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $saletypes = Tbl_jw_saletypes::find($request->saletypes_id);
    
        if (!$saletypes) {
            return response()->json(['success' => false, 'message' => 'sale type not found'], 404);
        }
    
        return response()->json([
            'success' => true,
            'data' => $saletypes
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_jw_saletypes,id',
            'name' => 'required|string|max:255', 
            
        ]);

        $saletypes = Tbl_jw_saletypes::find($validatedData['id']);
        $saletypes->name = $validatedData['name'];             
        $saletypes->edited_by = Auth::user()->name;
        $saletypes->edited_date = Carbon::now();         
        $saletypes->save();
       
        return response()->json([
            'success' => true,
            'message' => 'sale type updated successfully',
            'data' => $saletypes,
        ]);
    }

    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_jw_saletypes,id',
        ]);

        $saletypes = Tbl_jw_saletypes::find($validatedData['id']);
        if (!$saletypes) {
            return response()->json([
                'success' => false,
                'message' => 'sale type not found',
            ], 404);
        }
        $saletypes->delete();

        return response()->json([
            'success' => true,
            'message' => 'sale type deleted successfully',
        ]);
    } 
}
