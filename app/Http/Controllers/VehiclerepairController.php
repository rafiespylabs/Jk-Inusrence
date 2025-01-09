<?php

namespace App\Http\Controllers;

use App\Models\Tbl_staffs;
use App\Models\Tbl_vehicle_creation;
use App\Models\Tbl_vehicle_repair;
use Illuminate\Http\Request;

class VehiclerepairController extends Controller
{
    public function index(){
        $vehiclerepair = Tbl_vehicle_repair::with(['vehicle_number','staff'])->get();
        $vehiclecreation = Tbl_vehicle_creation::all();
        $staff = Tbl_staffs::all();
        return view('admin.vehiclerepair', [
            'vehiclerepair' => $vehiclerepair,
            'vehiclecreation' => $vehiclecreation,
            'staff' => $staff,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'complaint_description' => 'required|string|max:100',
            'remarks' => 'required|string|max:100',
            'repair_link' => 'required|string|max:100',
            'vehicle_number_id' => 'required|exists:tbl_vehicle_creations,id',
            'staff_user_id' => 'required|exists:tbl_staffs,user_id',
            'status' => 'required|in:Pending,In Progress,Completed,Cancelled',
        ]);        

    
        try {
    
            $vehiclerepair = new Tbl_vehicle_repair();
            $vehiclerepair->vehicle_number_id = $validatedData['vehicle_number_id'];
            $vehiclerepair->staff_user_id = $validatedData['staff_user_id'];
            $vehiclerepair->complaint_description = $validatedData['complaint_description'];            
            $vehiclerepair->remarks = $validatedData['remarks'];
            $vehiclerepair->repair_link = $validatedData['repair_link'];
            $vehiclerepair->status = $validatedData['status'];
            $vehiclerepair->save();
    
            $vehicle_number = Tbl_vehicle_creation::find($validatedData['vehicle_number_id']);
            $vehiclerepair->vehicle_number = $vehicle_number->vehicle_number;
            
            $staff = Tbl_staffs::where('user_id', $validatedData['staff_user_id'])->first();
            if (!$staff) {
                throw new \Exception('Staff user not found');
            }

            $vehiclerepair->user_id = $staff->user_id;
    
            return response()->json([
                'success' => true,
                'message' => 'Vehicle repair created successfully',
                'data' => $vehiclerepair,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create Vehicle repair: ' . $e->getMessage(),
            ], 500);
        }
    }


    public function edit(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:tbl_vehicle_repairs,id',
        ]);
         
        $vehiclerepair = Tbl_vehicle_repair::with('vehicle_number','staff')->find($request->id);

        if (!$vehiclerepair) {
            return response()->json(['success' => false, 'message' => 'Vehicle not found'], 404);
        }
        return response()->json([
            'success' => true,
            'data' => [

                'vehicle_number_id' => $vehiclerepair->vehicle_number_id,                
                'staff_user_id' => $vehiclerepair->staff->user_id,            
                'complaint_description' => $vehiclerepair->complaint_description,                
                'remarks' => $vehiclerepair->remarks,                
                'repair_link' => $vehiclerepair->repair_link,                
                'status' => $vehiclerepair->status,
            ]
        ]);
    }


    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_vehicle_repairs,id',
          'complaint_description' => 'required|string|max:100',
            'remarks' => 'required|string|max:100',
            'repair_link' => 'required|string|max:100',
            'vehicle_number_id' => 'required|exists:tbl_vehicle_creations,id',
            'staff_user_id' => 'required|exists:tbl_staffs,user_id',
            'status' => 'required|in:Pending,In Progress,Completed,Cancelled',
            
                
        ]);

        $vehiclerepair = Tbl_vehicle_repair::find($validatedData['id']);    
        $vehiclerepair->vehicle_number_id = $validatedData['vehicle_number_id'];
            $vehiclerepair->staff_user_id = $validatedData['staff_user_id'];
            $vehiclerepair->complaint_description = $validatedData['complaint_description'];            
            $vehiclerepair->remarks = $validatedData['remarks'];
            $vehiclerepair->repair_link = $validatedData['repair_link'];
            $vehiclerepair->status = $validatedData['status'];
            $vehiclerepair->save();

        $vehicle_number = Tbl_vehicle_creation::find($validatedData['vehicle_number_id']);            
            $vehiclerepair->vehicle_number = $vehicle_number->vehicle_number;  
            
            $staff = Tbl_staffs::where('user_id', $validatedData['staff_user_id'])->first();
        if (!$staff) {
            throw new \Exception('Staff user not found');
        }
        $vehiclerepair->user_id = $staff->user_id;  
           
        return response()->json([
            'success' => true,
            'message' => 'Vehicle repair updated successfully',
            'data' => $vehiclerepair,
        ]);
       
    }

    public function destroy(Request $request)
    {
        
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_vehicle_repairs,id', 
        ]);
        
        $vehiclerepair = Tbl_vehicle_repair::find($validatedData['id']);
        if (!$vehiclerepair) {
            return response()->json([
                'success' => false,
                'message' => 'Vehicle repair not found.',
            ], 404);
        }
       
        $vehiclerepair->delete();

        return response()->json([
            'success' => true,
            'message' => 'Vehicle repair deleted successfully.',
        ]);
    }

}
