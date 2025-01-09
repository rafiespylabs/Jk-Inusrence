<?php

namespace App\Http\Controllers;

use App\Models\Tbl_vechicle_categories;
use Illuminate\Http\Request;

class VechiclecategoryController extends Controller
{
    public function index()
    {
        $vechiclecategories=Tbl_vechicle_categories::all();
        return view('admin.vechiclecategories',['vechiclecategories'=>$vechiclecategories]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'vechile_category' => 'required|string|max:100',           
        ]);

        try {
            $vechiclecategories = new Tbl_vechicle_categories();
            $vechiclecategories->vechile_category = $validatedData['vechile_category'];           
            $vechiclecategories->save();
            
            return response()->json([
                'success' => true,
                'message' => 'Vechicle Category created successfully',
                'data' => $vechiclecategories,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create Vechicle Category : ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $vechiclecategories = Tbl_vechicle_categories::find($request->vechiclecategories_id);
    
        if (!$vechiclecategories) {
            return response()->json(['success' => false, 'message' => 'Vechicle Category not found'], 404);
        }
    
        return response()->json([
            'success' => true,
            'data' => $vechiclecategories
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_vechicle_categories,id',
            'vechile_category' => 'required|string|max:100',
            
        ]);

        $vechiclecategories = Tbl_vechicle_categories::find($validatedData['id']);
        $vechiclecategories->vechile_category = $validatedData['vechile_category'];             
        $vechiclecategories->save();
       
        return response()->json([
            'success' => true,
            'message' => 'Vechicle Category updated successfully',
            'data' => $vechiclecategories,
        ]);
    }

    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_vechicle_categories,id',
        ]);

        $vechiclecategories = tbl_vechicle_categories::find($validatedData['id']);
        if (!$vechiclecategories) {
            return response()->json([
                'success' => false,
                'message' => 'Vechicle Category not found',
            ], 404);
        }
        $vechiclecategories->delete();

        return response()->json([
            'success' => true,
            'message' => 'Vechicle Category deleted successfully',
        ]);
    } 
}
