<?php

namespace App\Http\Controllers;

use App\Models\Tbl_vehicle_model;
use Illuminate\Http\Request;

class VehiclemodelController extends Controller
{
    public function index()
    {
        $vehiclemodels=Tbl_vehicle_model::all();
        return view('admin.vehiclemodels',data: ['vehiclemodels'=>$vehiclemodels]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'model' => 'required|string|max:100',           
        ]);

        try {
            $vehiclemodels = new Tbl_vehicle_model();
            $vehiclemodels->model = $validatedData['model'];           
            $vehiclemodels->save();
            
            return response()->json([
                'success' => true,
                'message' => 'Vehicle model created successfully',
                'data' => $vehiclemodels,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create Vehicle model: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $vehiclemodels = Tbl_vehicle_model::find($request->vehiclemodels_id);
    
        if (!$vehiclemodels) {
            return response()->json(['success' => false, 'message' => 'Vehicle model not found'], 404);
        }
    
        return response()->json([
            'success' => true,
            'data' => $vehiclemodels
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_vehicle_models,id',
            'model' => 'required|string|max:100',
            
        ]);

        $vehiclemodels = Tbl_vehicle_model::find($validatedData['id']);
        $vehiclemodels->model = $validatedData['model'];             
        $vehiclemodels->save();
       
        return response()->json([
            'success' => true,
            'message' => 'Vehicle model updated successfully',
            'data' => $vehiclemodels,
        ]);
    }

    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_vehicle_models,id',
        ]);

        $vehiclemodels = Tbl_vehicle_model::find($validatedData['id']);
        if (!$vehiclemodels) {
            return response()->json([
                'success' => false,
                'message' => 'Vehicle model not found',
            ], 404);
        }
        $vehiclemodels->delete();

        return response()->json([
            'success' => true,
            'message' => 'Vehicle model deleted successfully',
        ]);
    } 
}
