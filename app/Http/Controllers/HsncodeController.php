<?php

namespace App\Http\Controllers;

use App\Models\Tbl_jw_hsncodes;
use Illuminate\Http\Request;

class HsncodeController extends Controller
{
    public function index()
    {
        $hsncodes=Tbl_jw_hsncodes::all();
        return view('admin.hsncodes',['hsncodes'=>$hsncodes]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'hsncode' => 'required|string|max:255', 
            'hsnvalue' => 'required|numeric|min:0', 
            'cgst_perc' => 'required|numeric|min:0',  
            'sgst_perc' => 'required|numeric|min:0',  
            'igst_perc' => 'required|numeric|min:0',           
        ]);

        try {
            $hsncodes = new Tbl_jw_hsncodes();
            $hsncodes->hsncode = $validatedData['hsncode'];           
            $hsncodes->hsnvalue = $validatedData['hsnvalue'];           
            $hsncodes->cgst_perc = $validatedData['cgst_perc'];           
            $hsncodes->sgst_perc = $validatedData['sgst_perc'];           
            $hsncodes->igst_perc = $validatedData['igst_perc'];           
            $hsncodes->save();
            
            return response()->json([
                'success' => true,
                'message' => 'hsn code created successfully',
                'data' => $hsncodes,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create hsn code : ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $hsncodes = Tbl_jw_hsncodes::find($request->hsncodes_id);
    
        if (!$hsncodes) {
            return response()->json(['success' => false, 'message' => 'hsn code not found'], 404);
        }
    
        return response()->json([
            'success' => true,
            'data' => $hsncodes
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_jw_hsncodes,id',
            'hsncode' => 'required|string|max:255', 
            'hsnvalue' => 'required|numeric|min:0', 
            'cgst_perc' => 'required|numeric|min:0',  
            'sgst_perc' => 'required|numeric|min:0',  
            'igst_perc' => 'required|numeric|min:0', 
            
        ]);

        $hsncodes = Tbl_jw_hsncodes::find($validatedData['id']);
        $hsncodes->hsncode = $validatedData['hsncode'];             
        $hsncodes->hsnvalue = $validatedData['hsnvalue'];             
        $hsncodes->cgst_perc = $validatedData['cgst_perc'];             
        $hsncodes->sgst_perc = $validatedData['sgst_perc'];             
        $hsncodes->igst_perc = $validatedData['igst_perc'];             
        $hsncodes->save();
       
        return response()->json([
            'success' => true,
            'message' => 'hsn code updated successfully',
            'data' => $hsncodes,
        ]);
    }

    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_jw_hsncodes,id',
        ]);

        $hsncodes = Tbl_jw_hsncodes::find($validatedData['id']);
        if (!$hsncodes) {
            return response()->json([
                'success' => false,
                'message' => 'hsn code not found',
            ], 404);
        }
        $hsncodes->delete();

        return response()->json([
            'success' => true,
            'message' => 'hsn code deleted successfully',
        ]);
    } 
}
