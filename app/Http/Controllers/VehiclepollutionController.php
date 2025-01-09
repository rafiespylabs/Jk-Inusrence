<?php

namespace App\Http\Controllers;

use App\Models\Tbl_vehicle_creation;
use App\Models\Tbl_vehicle_pollution;
use Illuminate\Http\Request;

class VehiclepollutionController extends Controller
{
    public function index(){
        $vehiclepollutions = Tbl_vehicle_pollution::with(['vehicle_number'])->get();
        $vehiclecreation = Tbl_vehicle_creation::all();
        return view('admin.vehiclepollutions', [
            'vehiclepollutions' => $vehiclepollutions,
            'vehiclecreation' => $vehiclecreation,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'start_date' => 'required|date|date_format:Y-m-d',
            'end_date' => 'required|date|date_format:Y-m-d',
            'vehicle_number_id' => 'required|exists:tbl_vehicle_creations,id',
        ]);
    
        try {
    
            $vehiclepollutions = new Tbl_vehicle_pollution();
            $vehiclepollutions->vehicle_number_id = $validatedData['vehicle_number_id'];
            $vehiclepollutions->start_date = $validatedData['start_date'];            
            $vehiclepollutions->end_date = $validatedData['end_date'];
            $vehiclepollutions->save();
    
            $vehicle_number = Tbl_vehicle_creation::find($validatedData['vehicle_number_id']);
            $vehiclepollutions->vehicle_number = $vehicle_number->vehicle_number;           
    
            return response()->json([
                'success' => true,
                'message' => 'Vehicle pollution created successfully',
                'data' => $vehiclepollutions,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create Vehicle pollution: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:tbl_vehicle_pollutions,id',
        ]);
         
        $vehiclepollutions = Tbl_vehicle_pollution::with('vehicle_number')->find($request->id);

        if (!$vehiclepollutions) {
            return response()->json(['success' => false, 'message' => 'Vehicle not found'], 404);
        }
        return response()->json([
            'success' => true,
            'data' => [

                'vehicle_number_id' => $vehiclepollutions->vehicle_number_id,                
                'start_date' => $vehiclepollutions->start_date,
                'end_date' => $vehiclepollutions->end_date,
            ]
        ]);
    }


    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_vehicle_pollutions,id',
            'vehicle_number_id' => 'required|exists:tbl_vehicle_creations,id',        
            'start_date' => 'required|date|date_format:Y-m-d',
            'end_date' => 'required|date|date_format:Y-m-d',            
                
        ]);

        $vehiclepollutions = Tbl_vehicle_pollution::find($validatedData['id']);    
        $vehiclepollutions->vehicle_number_id = $validatedData['vehicle_number_id'];           
        $vehiclepollutions->start_date = $validatedData['start_date'];
        $vehiclepollutions->end_date = $validatedData['end_date'];        
        $vehiclepollutions->save();

        $vehicle_number = Tbl_vehicle_creation::find($validatedData['vehicle_number_id']);            
            $vehiclepollutions->vehicle_number = $vehicle_number->vehicle_number;           
           
        return response()->json([
            'success' => true,
            'message' => 'Vehicle pollution updated successfully',
            'data' => $vehiclepollutions,
        ]);
    }

    public function destroy(Request $request)
    {
        
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_vehicle_pollutions,id', 
        ]);
        
        $vehiclepollutions = Tbl_vehicle_pollution::find($validatedData['id']);
        if (!$vehiclepollutions) {
            return response()->json([
                'success' => false,
                'message' => 'Vehicle pollution not found.',
            ], 404);
        }
       
        $vehiclepollutions->delete();

        return response()->json([
            'success' => true,
            'message' => 'Vehicle pollution deleted successfully.',
        ]);
    }

}
