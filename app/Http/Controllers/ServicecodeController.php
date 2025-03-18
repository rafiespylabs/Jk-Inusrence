<?php

namespace App\Http\Controllers;

use App\Models\Tbl_jw_hsncodes;
use App\Models\Tbl_jw_servicecodes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ServicecodeController extends Controller
{
    public function index()
    {
        $servicecodes=Tbl_jw_servicecodes::with(['createdByUser','editedByUser','hsn'])->get();
        $hsn = Tbl_jw_hsncodes::all();
        return view('admin.servicecodes',['servicecodes'=>$servicecodes,'hsn'=>$hsn]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'service_code' => 'required|string|max:100', 
            'service_name' => 'required|string|max:100', 
            'hsn_id' => 'required|integer|exists:tbl_jw_hsncodes,id',          
        ]);


        try {  

            $servicecodes = new Tbl_jw_servicecodes();
            $servicecodes->service_code  = $validatedData['service_code'];    
            $servicecodes->service_name  = $validatedData['service_name'];    
            $servicecodes->hsn_id = $validatedData['hsn_id'];          
            $servicecodes->created_by = Auth::user()->name;           
            $servicecodes->created_date = Carbon::now();             
            $servicecodes->save();

            $hsn = Tbl_jw_hsncodes::find($validatedData['hsn_id']);
            $servicecodes->hsncode = $hsn->hsncode;
            
            return response()->json([
                'success' => true,
                'message' => 'Service code created successfully',
                'data' => $servicecodes,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create service code : ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $servicecodes = Tbl_jw_servicecodes::with('hsn')->find($request->servicecodes_id);
    
        if (!$servicecodes) {
            return response()->json(['success' => false, 'message' => 'service code not found'], 404);
        }
    
        return response()->json([
            'success' => true,
            'data' => $servicecodes
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_jw_servicecodes,id',
            'service_code' => 'required|string|max:100', 
            'service_name' => 'required|string|max:100', 
            'hsn_id' => 'required|integer|exists:tbl_jw_hsncodes,id',  
            
        ]);

        $servicecodes = Tbl_jw_servicecodes::find($validatedData['id']);
        $servicecodes->service_code = $validatedData['service_code'];             
        $servicecodes->service_name = $validatedData['service_name'];             
        $servicecodes->hsn_id = $validatedData['hsn_id'];             
        $servicecodes->edited_by = Auth::user()->name;
        $servicecodes->edited_date = Carbon::now();         
        $servicecodes->save();
        
        $hsn = Tbl_jw_hsncodes::find($validatedData['hsn_id']);
        $servicecodes->hsncode = $hsn->hsncode;
       
        return response()->json([
            'success' => true,
            'message' => 'service code updated successfully',
            'data' => $servicecodes,
        ]);
    }

    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_jw_servicecodes,id',
        ]);

        $servicecodes = Tbl_jw_servicecodes::find($validatedData['id']);
        if (!$servicecodes) {
            return response()->json([
                'success' => false,
                'message' => 'service code not found',
            ], 404);
        }
        $servicecodes->delete();

        return response()->json([
            'success' => true,
            'message' => 'service code deleted successfully',
        ]);
    } 
}
