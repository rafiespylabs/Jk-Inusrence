<?php

namespace App\Http\Controllers;

use App\Models\Tbl_vehicle_types;
use Illuminate\Http\Request;

class VehicletypeController extends Controller
{
    public function index()
    {
        $vehicletypes=Tbl_vehicle_types::all();
        return view('admin.vehicletypes',['vehicletypes'=>$vehicletypes]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|string|max:100',           
        ]);

        try {
            $vehicletypes = new Tbl_vehicle_types();
            $vehicletypes->type = $validatedData['type'];           
            $vehicletypes->save();
            
            return response()->json([
                'success' => true,
                'message' => 'Vehicle Types created successfully',
                'data' => $vehicletypes,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create Vehicle Types: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $vehicletypes = Tbl_vehicle_types::find($request->vehicletypes_id);
    
        if (!$vehicletypes) {
            return response()->json(['success' => false, 'message' => 'Vehicle Types not found'], 404);
        }
    
        return response()->json([
            'success' => true,
            'data' => $vehicletypes
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_vehicle_types,id',
            'type' => 'required|string|max:100',
            
        ]);

        $vehicletypes = Tbl_vehicle_types::find($validatedData['id']);
        $vehicletypes->type = $validatedData['type'];             
        $vehicletypes->save();
       
        return response()->json([
            'success' => true,
            'message' => 'Vehicle Types updated successfully',
            'data' => $vehicletypes,
        ]);
    }

    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_vehicle_types,id',
        ]);

        $vehicletypes = Tbl_vehicle_types::find($validatedData['id']);
        if (!$vehicletypes) {
            return response()->json([
                'success' => false,
                'message' => 'Vehicle Types not found',
            ], 404);
        }
        $vehicletypes->delete();

        return response()->json([
            'success' => true,
            'message' => 'Vehicle Types deleted successfully',
        ]);
    } 
}
