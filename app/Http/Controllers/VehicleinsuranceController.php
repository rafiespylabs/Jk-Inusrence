<?php

namespace App\Http\Controllers;

use App\Models\Tbl_vehicle_brand;
use App\Models\Tbl_vehicle_creation;
use App\Models\Tbl_vehicle_insurance;
use Illuminate\Http\Request;

class VehicleinsuranceController extends Controller
{
    public function index(){
        $vehicleinsurances = Tbl_vehicle_insurance::with(['vehicle_number'])->get();
        $vehiclecreation = Tbl_vehicle_creation::all();
        return view('admin.vehicleinsurances', [
            'vehicleinsurances' => $vehicleinsurances,
            'vehiclecreation' => $vehiclecreation,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'start_date' => 'required|date|date_format:Y-m-d',
            'end_date' => 'required|date|date_format:Y-m-d',
            'insurance_company_name' => 'required|string|max:100',
            'vehicle_number_id' => 'required|exists:tbl_vehicle_creations,id',
        ]);
    
        try {
    
            $vehicleinsurances = new Tbl_vehicle_insurance();
            $vehicleinsurances->vehicle_number_id = $validatedData['vehicle_number_id'];
            $vehicleinsurances->start_date = $validatedData['start_date'];            
            $vehicleinsurances->end_date = $validatedData['end_date'];
            $vehicleinsurances->insurance_company_name = $validatedData['insurance_company_name'];
            $vehicleinsurances->save();
    
            $vehicle_number = Tbl_vehicle_creation::find($validatedData['vehicle_number_id']);
            $vehicleinsurances->vehicle_number = $vehicle_number->vehicle_number;           
    
            return response()->json([
                'success' => true,
                'message' => 'Vehicle insurance created successfully',
                'data' => $vehicleinsurances,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create Vehicle insurance: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:tbl_vehicle_insurances,id',
        ]);
         
        $vehicleinsurances = Tbl_vehicle_insurance::with('vehicle_number')->find($request->id);

        if (!$vehicleinsurances) {
            return response()->json(['success' => false, 'message' => 'Vehicle not found'], 404);
        }
        return response()->json([
            'success' => true,
            'data' => [

                'vehicle_number_id' => $vehicleinsurances->vehicle_number_id,                
                'start_date' => $vehicleinsurances->start_date,
                'end_date' => $vehicleinsurances->end_date,
                'insurance_company_name' => $vehicleinsurances->insurance_company_name,
            ]
        ]);
    }


    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_vehicle_insurances,id',
            'vehicle_number_id' => 'required|exists:tbl_vehicle_creations,id',        
            'start_date' => 'required|date|date_format:Y-m-d',
            'end_date' => 'required|date|date_format:Y-m-d',
            'insurance_company_name' => 'required|string|max:100',
            
                
        ]);

        $vehicleinsurances = Tbl_vehicle_insurance::find($validatedData['id']);    
        $vehicleinsurances->vehicle_number_id = $validatedData['vehicle_number_id'];           
        $vehicleinsurances->start_date = $validatedData['start_date'];
        $vehicleinsurances->end_date = $validatedData['end_date'];
        $vehicleinsurances->insurance_company_name = $validatedData['insurance_company_name'];          
        $vehicleinsurances->save();

        $vehicle_number = Tbl_vehicle_creation::find($validatedData['vehicle_number_id']);            
            $vehicleinsurances->vehicle_number = $vehicle_number->vehicle_number;           
           
        return response()->json([
            'success' => true,
            'message' => 'Vehicle insurance updated successfully',
            'data' => $vehicleinsurances,
        ]);
    }

    public function destroy(Request $request)
    {
        
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_vehicle_insurances,id', 
        ]);
        
        $vehicleinsurances = Tbl_vehicle_insurance::find($validatedData['id']);
        if (!$vehicleinsurances) {
            return response()->json([
                'success' => false,
                'message' => 'Vehicle insurance not found.',
            ], 404);
        }
       
        $vehicleinsurances->delete();

        return response()->json([
            'success' => true,
            'message' => 'Vehicle insurance deleted successfully.',
        ]);
    }

}
