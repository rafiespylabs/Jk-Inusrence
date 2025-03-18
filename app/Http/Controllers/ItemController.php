<?php

namespace App\Http\Controllers;

use App\Models\Tbl_items;
use App\Models\Tbl_jw_category;
use App\Models\Tbl_jw_hsncodes;
use App\Models\Tbl_jw_subcategory;
use App\Models\Tbl_jw_unit;
use App\Models\Tbl_manufacturers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ItemController extends Controller
{
    public function index()
    {
        $items=Tbl_items::with(['createdByUser','editedByUser','category','subcategory',
        'unit','hsn_code','manufacturer'])->get();
        $category = Tbl_jw_category::all();
        $subcategory = Tbl_jw_subcategory::all();
        $unit = Tbl_jw_unit::all();
        $hsn_code = Tbl_jw_hsncodes::all();
        $manufacturers=Tbl_manufacturers::all();
        return view('admin.items', [
            'items' => $items,
            'category' => $category,
            'subcategory' => $subcategory,
            'unit' => $unit,
            'hsn_code' => $hsn_code,
            'manufacturers'=>$manufacturers
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'item_name' => 'required|string|max:255',
            'item_code' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:tbl_jw_categories,id',
            'subcategory_id' => 'required|integer|exists:tbl_jw_subcategories,id',
            'hsn_code_id' => 'nullable|integer|exists:tbl_jw_hsncodes,id',
            'type' => 'required',
            'unit_id' => 'required|integer|exists:tbl_jw_units,id',  
            'manufacturer_id' => 'nullable|integer|exists:tbl_manufacturers,id',
        ]);
        try {
            $items = new Tbl_items();
            $items->item_name = $validatedData['item_name'];           
            $items->item_code = $validatedData['item_code'];           
            $items->category_id = $validatedData['category_id'];           
            $items->subcategory_id = $validatedData['subcategory_id'];   
            $items->hsn_code_id = $validatedData['hsn_code_id'];   
            $items->type = $validatedData['type'];   
            $items->unit_id = $validatedData['unit_id'];   
            $items->manufacturer_id = $validatedData['manufacturer_id']; 
            $items->created_by = Auth::user()->id;           
            $items->created_date = Carbon::now();                    
            $items->save();

            $category=Tbl_jw_category::find($validatedData['category_id']);
            $items->category_name=$category->category_name;

            $subcategory=Tbl_jw_subcategory::find($validatedData['subcategory_id']);
            $items->subcategory_name=$subcategory->subcategory_name;
           if($validatedData['hsn_code_id'])
           {
            $hsncode=Tbl_jw_hsncodes::find($validatedData['hsn_code_id']);
            $items->hsncode=$hsncode->hsncode;
            $items->hsnvalue=$hsncode->hsnvalue;
           }
            $unit=Tbl_jw_unit::find($validatedData['unit_id']);
            $items->unit_name=$unit->unit_name;

            $user=User::find(Auth::user()->id);
            $items->created_by=$user->name;

            if($validatedData['manufacturer_id'])
            {
                $manufacturer=Tbl_manufacturers::find($validatedData['manufacturer_id']);
                $items->manufacturer=$manufacturer->manufacturer;
            }
            return response()->json([
                'success' => true,
                'message' => 'items created successfully',
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
        $items = Tbl_items::find($request->items_id);
        if (!$items) {
            return response()->json(['success' => false, 'message' => 'item not found'], 404);
        }
        return response()->json([
            'success' => true,
            'data' => [
                'item_name' => $items->item_name ,
                'item_code' => $items->item_code,
                'category_id' => $items->category_id,       
                'subcategory_id' => $items->subcategory_id,          
                'hsn_code_id' => $items->hsn_code_id,               
                'hsn_code_value' => $items->hsn_code->hsnvalue ?? 'N/A',               
                'type' => $items->type,       
                'unit_id' => $items->unit_id,  
                'manufacturer_id' => $items->manufacturer_id,  
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
            'hsn_code_id' => 'nullable|integer|exists:tbl_jw_hsncodes,id',
            'type' => 'required',
            'unit_id' => 'required|integer|exists:tbl_jw_units,id', 
            'manufacturer_id' => 'nullable|integer|exists:tbl_manufacturers,id',
        ]);

            $items = Tbl_items::find($validatedData['id']);
            $items->item_name = $validatedData['item_name'];           
            $items->item_code = $validatedData['item_code'];           
            $items->category_id = $validatedData['category_id'];           
            $items->subcategory_id = $validatedData['subcategory_id'];   
            $items->hsn_code_id = $validatedData['hsn_code_id'];   
            $items->type = $validatedData['type'];   
            $items->unit_id = $validatedData['unit_id'];
            $items->manufacturer_id = $validatedData['manufacturer_id'];    
            $items->edited_by = Auth::user()->id;
            $items->edited_date = Carbon::now();              
            $items->save();

            $category=Tbl_jw_category::find($validatedData['category_id']);
            $items->category_name=$category->category_name;

            $subcategory=Tbl_jw_subcategory::find($validatedData['subcategory_id']);
            $items->subcategory_name=$subcategory->subcategory_name;
            if($validatedData['hsn_code_id'])
            {
                $hsncode=Tbl_jw_hsncodes::find($validatedData['hsn_code_id']);
                $items->hsncode=$hsncode->hsncode;
                $items->hsnvalue=$hsncode->hsnvalue;
            }
            $unit=Tbl_jw_unit::find($validatedData['unit_id']);
            $items->unit_name=$unit->unit_name;

            $user=User::find(Auth::user()->id);
            $items->edited_by=$user->name;

            $items->created_by=User::find($items->created_by)->name;
            if($validatedData['manufacturer_id'])
            {
                $manufacturer=Tbl_manufacturers::find($validatedData['manufacturer_id']);
                $items->manufacturer=$manufacturer->manufacturer;
            }
        return response()->json([
            'success' => true,
            'message' => 'item updated successfully',
            'data' => $items,
        ]);
    }

    public function getHsnValue($id)
    {
        $hsn = Tbl_jw_hsncodes::find($id);
        
        if ($hsn) {
            return response()->json(['hsn_code' => $hsn->hsnvalue]);
        } else {
            return response()->json(['error' => 'HSN Value not found'], 404);
        }
    }

    public function getSubcategories(Request $request)
    {
        $categoryId = $request->category_id;

        if (!$categoryId) {
            return response()->json([
                'success' => false,
                'message' => 'Category ID is required.'
            ]);
        }

        $subcategories = Tbl_jw_subcategory::where('cat_id', $categoryId)->get();

        return response()->json([
            'success' => true,
            'data' => $subcategories
        ]);
    }


    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_items,id',
        ]);

        $items = Tbl_items::find($validatedData['id']);
        if (!$items) {
            return response()->json([
                'success' => false,
                'message' => 'item not found',
            ], 404);
        }
        $items->delete();

        return response()->json([
            'success' => true,
            'message' => 'item deleted successfully',
        ]);
    } 
}
