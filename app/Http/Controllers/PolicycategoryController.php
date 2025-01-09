<?php

namespace App\Http\Controllers;

use App\Models\Tbl_policy_categories;
use Illuminate\Http\Request;

class PolicycategoryController extends Controller
{
    public function index()
    {
        $policycategories=Tbl_policy_categories::all();
        return view('admin.policycategories',['policycategories'=>$policycategories]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'policycategories' => 'required|string|max:100',           
        ]);

        try {
            $policycategories = new Tbl_policy_categories();
            $policycategories->policy_category = $validatedData['policycategories'];           
            $policycategories->save();
            
            return response()->json([
                'success' => true,
                'message' => 'Policy Category created successfully',
                'data' => $policycategories,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create Policy Category: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $policycategories = Tbl_policy_categories::find($request->policycategories_id);
    
        if (!$policycategories) {
            return response()->json(['success' => false, 'message' => 'Policy Categories not found'], 404);
        }
    
        return response()->json([
            'success' => true,
            'data' => $policycategories
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:Tbl_policy_categories,id',
            'policycategories' => 'required|string|max:100',
            
        ]);

        $policycategories = Tbl_policy_categories::find($validatedData['id']);
        $policycategories->policy_category = $validatedData['policycategories'];             
        $policycategories->save();
       
        return response()->json([
            'success' => true,
            'message' => 'Policy Category updated successfully',
            'data' => $policycategories,
        ]);
    }

    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:Tbl_policy_categories,id',
        ]);

        $policycategories = Tbl_policy_categories::find($validatedData['id']);
        if (!$policycategories) {
            return response()->json([
                'success' => false,
                'message' => 'Policy Categories not found',
            ], 404);
        }
        $policycategories->delete();

        return response()->json([
            'success' => true,
            'message' => 'Policy Categories deleted successfully',
        ]);
    } 
}
