<?php

namespace App\Http\Controllers;

use App\Models\Tbl_business_categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class BusinesscategoryController extends Controller
{
    public function index()
    {
        $businesscategories=Tbl_business_categories::with(['addedByUser','editedByUser'])->get();
        return view('admin.businesscategories',['businesscategories'=>$businesscategories]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'business_category_name' => 'required|string|max:100',           
        ]);

        try {
            $businesscategories = new Tbl_business_categories();
            $businesscategories->business_category_name = $validatedData['business_category_name'];  
            $businesscategories->added_by = Auth::user()->id;           
            $businesscategories->added_date = Carbon::now();           
            $businesscategories->save();
            
            return response()->json([
                'success' => true,
                'message' => 'Business Category created successfully',
                'data' => $businesscategories,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create Business Category: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $businesscategories = Tbl_business_categories::find($request->businesscategories_id);
    
        if (!$businesscategories) {
            return response()->json(['success' => false, 'message' => 'Business Category not found'], 404);
        }
    
        return response()->json([
            'success' => true,
            'data' => $businesscategories
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_business_categories,id',
            'business_category_name' => 'required|string|max:100',
            
        ]);

        $businesscategories = Tbl_business_categories::find($validatedData['id']);
        $businesscategories->business_category_name = $validatedData['business_category_name'];  
        $businesscategories->edited_by = Auth::user()->id;
        $businesscategories->edited_date = Carbon::now();            
        $businesscategories->save();
       
        return response()->json([
            'success' => true,
            'message' => 'Business Categories updated successfully',
            'data' => $businesscategories,
        ]);
    }

    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_business_categories,id',
        ]);

        $businesscategories = Tbl_business_categories::find($validatedData['id']);
        if (!$businesscategories) {
            return response()->json([
                'success' => false,
                'message' => 'Business Category not found',
            ], 404);
        }
        $businesscategories->delete();

        return response()->json([
            'success' => true,
            'message' => 'Business Category deleted successfully',
        ]);
    } 
}
