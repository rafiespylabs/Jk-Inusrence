<?php

namespace App\Http\Controllers;

use App\Models\Tbl_jw_category;
use App\Models\Tbl_jw_subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index(){
        $subcategories = Tbl_jw_subcategory::with(['category'])->get();
        $category = Tbl_jw_category::all();

        return view('admin.subcategories', [
            'subcategories' => $subcategories,
            'category' => $category,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'cat_id' => 'required|integer|exists:tbl_jw_categories,id',
            'subcategory_name' => 'required|string|max:255',                    
        ]);
    
        try {
           
            $subcategories = new Tbl_jw_subcategory();
            $subcategories->cat_id = $validatedData['cat_id'];          
            $subcategories->subcategory_name = $validatedData['subcategory_name'];                          
            $subcategories->save();
    
            $category = Tbl_jw_category::find($validatedData['cat_id']);
            $subcategories->category_name = $category->category_name;           
    
            return response()->json([
                'success' => true,
                'message' => 'Sub Category created successfully',
                'data' => $subcategories,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create Sub Category: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:tbl_jw_subcategories,id',
        ]);
         
        $subcategories = Tbl_jw_subcategory::with('category')->find($request->id);
        
        if (!$subcategories) {
            return response()->json(['success' => false, 'message' => 'Sub Category not found'], 404);
        }        

        return response()->json([
            'success' => true,
            'data' => [

                'cat_id' => $subcategories->cat_id, 
                'subcategory_name' => $subcategories->subcategory_name ,                
            ]
        ]);
    }
   

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_jw_subcategories,id',
            'cat_id' => 'required|integer|exists:tbl_jw_categories,id',
            'subcategory_name' => 'required|string|max:255',            
        ]);

        $subcategories = Tbl_jw_subcategory::find($validatedData['id']);
        $subcategories->cat_id = $validatedData['cat_id'];   
        $subcategories->subcategory_name = $validatedData['subcategory_name'];
             
        $subcategories->save();

        $category = Tbl_jw_category::find($validatedData['cat_id']);
        $subcategories->category_name = $category->category_name;      
           
        return response()->json([
            'success' => true,
            'message' => 'Sub Category updated successfully',
            'data' => $subcategories,
        ]);
    }

    public function destroy(Request $request)
    {
        
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_jw_subcategories,id', 
        ]);
        
        $subcategories = Tbl_jw_subcategory::find($validatedData['id']);
        if (!$subcategories) {
            return response()->json([
                'success' => false,
                'message' => 'Sub Category not found.',
            ], 404);
        }
       
        $subcategories->delete();

        return response()->json([
            'success' => true,
            'message' => 'Sub Category deleted successfully.',
        ]);
    }


}
