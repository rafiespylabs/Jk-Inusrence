<?php

namespace App\Http\Controllers;

use App\Models\Tbl_loantypes;
use Illuminate\Http\Request;

class LoantypeController extends Controller
{
    public function index()
    {
        $loantypes=Tbl_loantypes::all();
        return view('admin.loantypes',['loantypes'=>$loantypes]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'loan_type' => 'required|string|max:100',           
        ]);

        try {
            $loantypes = new Tbl_loantypes();
            $loantypes->loan_type = $validatedData['loan_type'];           
            $loantypes->save();
            
            return response()->json([
                'success' => true,
                'message' => 'Loan Types created successfully',
                'data' => $loantypes,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create loan types: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $loantypes = Tbl_loantypes::find($request->loantypes_id);
    
        if (!$loantypes) {
            return response()->json(['success' => false, 'message' => 'Loan types not found'], 404);
        }
    
        return response()->json([
            'success' => true,
            'data' => $loantypes
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_loantypes,id',
            'loan_type' => 'required|string|max:100',
            
        ]);

        $loantypes = Tbl_loantypes::find($validatedData['id']);
        $loantypes->loan_type = $validatedData['loan_type'];             
        $loantypes->save();
       
        return response()->json([
            'success' => true,
            'message' => 'Loan types updated successfully',
            'data' => $loantypes,
        ]);
    }

    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_loantypes,id',
        ]);

        $loantypes = Tbl_loantypes::find($validatedData['id']);
        if (!$loantypes) {
            return response()->json([
                'success' => false,
                'message' => 'Loan types not found',
            ], 404);
        }
        $loantypes->delete();

        return response()->json([
            'success' => true,
            'message' => 'Loan types deleted successfully',
        ]);
    } 
}
