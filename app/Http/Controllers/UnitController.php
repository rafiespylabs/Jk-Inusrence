<?php

namespace App\Http\Controllers;

use App\Models\Tbl_jw_unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $units=Tbl_jw_unit::all();
        return view('admin.units',['units'=>$units]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'unit_name' => 'required|string|max:100',           
        ]);

        try {
            $units = new Tbl_jw_unit();
            $units->unit_name = $validatedData['unit_name'];           
            $units->save();
            
            return response()->json([
                'success' => true,
                'message' => 'Unit created successfully',
                'data' => $units,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create Unit : ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $units = Tbl_jw_unit::find($request->units_id);
    
        if (!$units) {
            return response()->json(['success' => false, 'message' => 'Unit not found'], 404);
        }
    
        return response()->json([
            'success' => true,
            'data' => $units
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_jw_units,id',
            'unit_name' => 'required|string|max:100',
            
        ]);

        $units = Tbl_jw_unit::find($validatedData['id']);
        $units->unit_name = $validatedData['unit_name'];             
        $units->save();
       
        return response()->json([
            'success' => true,
            'message' => 'Unit updated successfully',
            'data' => $units,
        ]);
    }

    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_jw_units,id',
        ]);

        $units = Tbl_jw_unit::find($validatedData['id']);
        if (!$units) {
            return response()->json([
                'success' => false,
                'message' => 'Unit not found',
            ], 404);
        }
        $units->delete();

        return response()->json([
            'success' => true,
            'message' => 'Unit deleted successfully',
        ]);
    } 
}
