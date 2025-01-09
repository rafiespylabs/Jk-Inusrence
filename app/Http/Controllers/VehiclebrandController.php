<?php

namespace App\Http\Controllers;

use App\Models\Tbl_vehicle_brand;
use Illuminate\Http\Request;

class VehiclebrandController extends Controller
{
    public function index()
    {
        $vehiclebrands=Tbl_vehicle_brand::all();
        return view('admin.vehiclebrands',['vehiclebrands'=>$vehiclebrands]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'brand' => 'required|string|max:100',           
        ]);

        try {
            $vehiclebrands = new Tbl_vehicle_brand();
            $vehiclebrands->brand = $validatedData['brand'];           
            $vehiclebrands->save();
            
            return response()->json([
                'success' => true,
                'message' => 'Vehicle brand created successfully',
                'data' => $vehiclebrands,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create Vehicle brand: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $vehiclebrands = Tbl_vehicle_brand::find($request->vehiclebrands_id);
    
        if (!$vehiclebrands) {
            return response()->json(['success' => false, 'message' => 'Vehicle brand not found'], 404);
        }
    
        return response()->json([
            'success' => true,
            'data' => $vehiclebrands
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_vehicle_brands,id',
            'brand' => 'required|string|max:100',
            
        ]);

        $vehiclebrands = Tbl_vehicle_brand::find($validatedData['id']);
        $vehiclebrands->brand = $validatedData['brand'];             
        $vehiclebrands->save();
       
        return response()->json([
            'success' => true,
            'message' => 'Vehicle brand updated successfully',
            'data' => $vehiclebrands,
        ]);
    }

    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_vehicle_brands,id',
        ]);

        $vehiclebrands = Tbl_vehicle_brand::find($validatedData['id']);
        if (!$vehiclebrands) {
            return response()->json([
                'success' => false,
                'message' => 'Vehicle brand not found',
            ], 404);
        }
        $vehiclebrands->delete();

        return response()->json([
            'success' => true,
            'message' => 'Vehicle brand deleted successfully',
        ]);
    } 
}
