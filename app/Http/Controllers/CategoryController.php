<?php

namespace App\Http\Controllers;

use App\Models\Tbl_jw_category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Tbl_jw_category::all();
        return view('admin.categories',['categories'=>$categories]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|string|max:100',           
        ]);

        try {
            $categories = new Tbl_jw_category();
            $categories->category_name = $validatedData['category_name'];           
            $categories->save();
            
            return response()->json([
                'success' => true,
                'message' => 'Category created successfully',
                'data' => $categories,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create Category : ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $categories = Tbl_jw_category::find($request->categories_id);
    
        if (!$categories) {
            return response()->json(['success' => false, 'message' => 'Category not found'], 404);
        }
    
        return response()->json([
            'success' => true,
            'data' => $categories
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_jw_categories,id',
            'category_name' => 'required|string|max:100',
            
        ]);

        $categories = Tbl_jw_category::find($validatedData['id']);
        $categories->category_name = $validatedData['category_name'];             
        $categories->save();
       
        return response()->json([
            'success' => true,
            'message' => 'Category updated successfully',
            'data' => $categories,
        ]);
    }

    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_jw_categories,id',
        ]);

        $categories = Tbl_jw_category::find($validatedData['id']);
        if (!$categories) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found',
            ], 404);
        }
        $categories->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully',
        ]);
    } 
}
