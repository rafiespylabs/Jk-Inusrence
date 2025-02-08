<?php

namespace App\Http\Controllers;

use App\Models\Tbl_items;
use App\Models\Tbl_jw_category;
use App\Models\Tbl_jw_subcategory;
use App\Models\Tbl_jw_unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index(){
        $items = Tbl_items::with(['category','subcategory','unit','user'])->get();
        $category = Tbl_jw_category::all();
        $subcategory = Tbl_jw_subcategory::all();
        $unit = Tbl_jw_unit::all();

        return view('admin.items', [
            'items' => $items,
            'category' => $category,
            'subcategory' => $subcategory,
            'unit' => $unit,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'item_name' => 'required|string|max:255',
            'item_code' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:tbl_jw_categories,id',
            'subcategory_id' => 'required|integer|exists:tbl_jw_subcategories,id',
            'hsn_code' => 'required|string|max:255',
            'hsn_value' => 'required|numeric|min:0',
            'hsn_description' => 'required|string|max:255',            
            'type' => 'required|boolean',
            'unit_id' => 'required|integer|exists:tbl_jw_units,id',         
        ]);
    
        try {
            $created_by = Auth::user()->id;
            $created_date = date('Y-m-d');
    
            $items = new Tbl_items();
            $items->item_name = $validatedData['item_name'];
            $items->item_code = $validatedData['item_code'];
            $items->category_id = $validatedData['category_id'];           
            $items->subcategory_id = $validatedData['subcategory_id'];           
            $items->hsn_code = $validatedData['hsn_code'];           
            $items->hsn_value = $validatedData['hsn_value'];           
            $items->hsn_description = $validatedData['hsn_description'];           
            $items->type = $validatedData['type'];           
            $items->unit_id = $validatedData['unit_id'];  
            $items->created_by = $created_by;    
            $items->created_date = $created_date;                
            $items->save();
    
            $category = Tbl_jw_category::find($validatedData['category_id']);
            $items->category_name = $category->category_name;

            $subcategory = Tbl_jw_subcategory::find($validatedData['subcategory_id']);
            $items->subcategory_name = $subcategory->subcategory_name;

            $unit = Tbl_jw_unit::find($validatedData['unit_id']);
            $items->unit_name = $unit->unit_name;
            
            $user=User::find($created_by);
            $items->created_user = $user->name;
    
            return response()->json([
                'success' => true,
                'message' => 'Item created successfully',
                'data' => $items,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create item: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:tbl_items,id',
        ]);
        $items = Tbl_items::with('category','subcategory','unit')->find($request->id);
        if (!$items) {
            return response()->json(['success' => false, 'message' => 'Item not found'], 404);
        }
        return response()->json([
            'success' => true,
            'data' => [

                'item_name' => $items->item_name ,
                'item_code' => $items->item_code,
                'category_id' => $items->category_id,       
                'subcategory_id' => $items->subcategory_id,          
                'hsn_code' => $items->hsn_code,         
                'hsn_value' => $items->hsn_value,       
                'hsn_description' => $items->hsn_description,       
                'type' => $items->type,       
                'unit_id' => $items->unit_id,        
                 
            ]
        ]);
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_items,id',
            'item_name' => 'required|string|max:255',
            'item_code' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:tbl_jw_categories,id',
            'subcategory_id' => 'required|integer|exists:tbl_jw_subcategories,id',
            'hsn_code' => 'required|string|max:255',
            'hsn_value' => 'required|numeric|min:0',
            'hsn_description' => 'required|string|max:255',            
            'type' => 'required|boolean',
            'unit_id' => 'required|integer|exists:tbl_jw_units,id',   
        ]);

        $items = Tbl_items::find($validatedData['id']);
        $items->item_name = $validatedData['item_name'];
        $items->item_code = $validatedData['item_code'];
        $items->category_id = $validatedData['category_id'];           
        $items->subcategory_id = $validatedData['subcategory_id'];           
        $items->hsn_code = $validatedData['hsn_code'];           
        $items->hsn_value = $validatedData['hsn_value'];           
        $items->hsn_description = $validatedData['hsn_description'];           
        $items->type = $validatedData['type'];           
        $items->unit_id = $validatedData['unit_id']; 
        $items->save();

        $category = Tbl_jw_category::find($validatedData['category_id']);
        $items->category_name = $category->category_name;

        $subcategory = Tbl_jw_subcategory::find($validatedData['subcategory_id']);
        $items->subcategory_name = $subcategory->subcategory_name;

        $unit = Tbl_jw_unit::find($validatedData['unit_id']);
        $items->unit_name = $unit->unit_name;
    
        $user=User::find($created_by);
        $items->created_user = $user->name;
           
        return response()->json([
            'success' => true,
            'message' => 'Item updated successfully',
            'data' => $items,
        ]);
    }

    public function destroy(Request $request)
    {
        
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_items,id', 
        ]);
        
        $items = Tbl_item::find($validatedData['id']);
        if (!$items) {
            return response()->json([
                'success' => false,
                'message' => 'Item not found.',
            ], 404);
        }
       
        $items->delete();

        return response()->json([
            'success' => true,
            'message' => 'Item deleted successfully.',
        ]);
    }

}
