<?php

namespace App\Http\Controllers;

use App\Models\Tbl_vehicle_brand;
use App\Models\Tbl_vehicle_creation;
use App\Models\Tbl_vehicle_model;
use App\Models\Tbl_vehicle_types;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehiclecreationController extends Controller
{
    public function index(){
        $vehiclecreation = Tbl_vehicle_creation::with(['type', 'brand','model'])->get();
        $vehicletypes = Tbl_vehicle_types::all();
        $vehiclebrands = Tbl_vehicle_brand::all();
        $vehiclemodels = Tbl_vehicle_model::all();

        return view('admin.vehiclecreation', [
            'vehiclecreation' => $vehiclecreation,
            'vehicletypes' => $vehicletypes,
            'vehiclebrands' => $vehiclebrands,
            'vehiclemodels' => $vehiclemodels,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'vehicle_number' => 'required|numeric|min:0',
            'chassis_number' => 'required|numeric|min:0',
            'engine_number' => 'required|string|max:100',
            'owner_name' => 'required|string|max:100',
            'date_of_registration' => 'required|date|date_format:Y-m-d',
            'end_registration' => 'required|date|date_format:Y-m-d',
            'type_id' => 'required|exists:tbl_vehicle_types,id',
            'brand_id' => 'required|exists:tbl_vehicle_brands,id',
            'model_id' => 'required|exists:tbl_vehicle_models,id',
        ]);
    
        try {
    
            $vehiclecreation = new Tbl_vehicle_creation();
            $vehiclecreation->type_id = $validatedData['type_id'];
            $vehiclecreation->brand_id = $validatedData['brand_id'];
            $vehiclecreation->model_id = $validatedData['model_id'];
            $vehiclecreation->vehicle_number = $validatedData['vehicle_number'];
            $vehiclecreation->engine_number = $validatedData['engine_number'];
            $vehiclecreation->date_of_registration = $validatedData['date_of_registration'];
            $vehiclecreation->end_registration = $validatedData['end_registration'];
            $vehiclecreation->owner_name = $validatedData['owner_name'];
            $vehiclecreation->chassis_number = $validatedData['chassis_number'];
            $vehiclecreation->save();
    
            $type = Tbl_vehicle_types::find($validatedData['type_id']);
            $vehiclecreation->type = $type->type;

            $brand = Tbl_vehicle_brand::find($validatedData['brand_id']);
            $vehiclecreation->brand = $brand->brand;

            $model = Tbl_vehicle_model::find($validatedData['model_id']);
            $vehiclecreation->model = $model->model;
    
            return response()->json([
                'success' => true,
                'message' => 'Vehicle created successfully',
                'data' => $vehiclecreation,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create Vehicle: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:tbl_vehicle_creations,id',
        ]);
         
        $vehiclecreation = Tbl_vehicle_creation::with('type','brand','model')->find($request->id);

        if (!$vehiclecreation) {
            return response()->json(['success' => false, 'message' => 'Vehicle not found'], 404);
        }
        return response()->json([
            'success' => true,
            'data' => [
                'vehicle_number' => $vehiclecreation->vehicle_number,
                'engine_number' => $vehiclecreation->engine_number,
                'date_of_registration' => $vehiclecreation->date_of_registration,
                'end_registration' => $vehiclecreation->end_registration,
                'owner_name' => $vehiclecreation->owner_name,
                'chassis_number' => $vehiclecreation->chassis_number,
                'type_id' => $vehiclecreation->type_id,
                'brand_id' => $vehiclecreation->brand_id,
                'model_id' => $vehiclecreation->model_id,
            
            ]
        ]);
    }


    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_vehicle_creations,id',
          'vehicle_number' => 'required|numeric|min:0',
            'chassis_number' => 'required|numeric|min:0',
            'engine_number' => 'required|string|max:100',
            'owner_name' => 'required|string|max:100',
            'date_of_registration' => 'required|date|date_format:Y-m-d',
            'end_registration' => 'required|date|date_format:Y-m-d',
            'type_id' => 'required|exists:tbl_vehicle_types,id',
            'brand_id' => 'required|exists:tbl_vehicle_brands,id',
            'model_id' => 'required|exists:tbl_vehicle_models,id',           
        ]);

        $vehiclecreation = Tbl_vehicle_creation::find($validatedData['id']);

        $vehiclecreation->vehicle_number = $validatedData['vehicle_number'];
        $vehiclecreation->chassis_number = $validatedData['chassis_number'];
        $vehiclecreation->engine_number = $validatedData['engine_number'];
        $vehiclecreation->owner_name = $validatedData['owner_name'];
        $vehiclecreation->date_of_registration = $validatedData['date_of_registration'];
        $vehiclecreation->end_registration = $validatedData['end_registration'];
        $vehiclecreation->type_id = $validatedData['type_id'];       
        $vehiclecreation->brand_id = $validatedData['brand_id'];       
        $vehiclecreation->model_id = $validatedData['model_id'];       
        $vehiclecreation->save();

        $type = Tbl_vehicle_types::find($validatedData['type_id']);            
            $vehiclecreation->type = $type->type;

            $brand = Tbl_vehicle_brand::find($validatedData['brand_id']);            
            $vehiclecreation->brand = $brand->brand;

            $model = Tbl_vehicle_model::find($validatedData['model_id']);            
            $vehiclecreation->model = $model->model;
           
        return response()->json([
            'success' => true,
            'message' => 'Vehicle updated successfully',
            'data' => $vehiclecreation,
        ]);
    }

    public function destroy(Request $request)
    {
        
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_vehicle_creations,id', 
        ]);
        
        $vehiclecreation = Tbl_vehicle_creation::find($validatedData['id']);
        if (!$vehiclecreation) {
            return response()->json([
                'success' => false,
                'message' => 'Vehicle not found.',
            ], 404);
        }
       
        $vehiclecreation->delete();

        return response()->json([
            'success' => true,
            'message' => 'Vehicle deleted successfully.',
        ]);
    }

}
