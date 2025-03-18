<?php

namespace App\Http\Controllers;

use App\Models\Tbl_manufacturers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ManufacturerController extends Controller
{
    public function index()
    {
        $manufacturers=Tbl_manufacturers::with(['addedByUser','editedByUser'])->get();
        return view('admin.manufacturers',[
            'manufacturers'=>$manufacturers
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'manufacturer' => 'required|string|max:100',           
        ]);

        try {
            $manufacturers = new Tbl_manufacturers();
            $manufacturers->manufacturer = $validatedData['manufacturer'];  
            $manufacturers->added_by = Auth::user()->id;           
            $manufacturers->added_date = Carbon::now();          
            $manufacturers->save();
            
            return response()->json([
                'success' => true,
                'message' => 'manufacturer created successfully',
                'data' =>  [
                    'id' => $manufacturers->id,
                    'manufacturer' => $manufacturers->manufacturer,
                    'added_by' => optional($manufacturers->addedByUser)->name, 
                    'added_date' => $manufacturers->added_date,
                    'edited_by' => optional($manufacturers->editedByUser)->name, 
                    'edited_date' => $manufacturers->edited_date,
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create manufacturer: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $manufacturers = Tbl_manufacturers::find($request->manufacturers_id);
    
        if (!$manufacturers) {
            return response()->json(['success' => false, 'message' => 'manufacturer not found'], 404);
        }
    
        return response()->json([
            'success' => true,
            'data' => $manufacturers
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_manufacturers,id',
            'manufacturer' => 'required|string|max:100',
            
        ]);

        $manufacturers = Tbl_manufacturers::find($validatedData['id']);
        $manufacturers->manufacturer = $validatedData['manufacturer'];  
        $manufacturers->edited_by = Auth::user()->id;
        $manufacturers->edited_date = Carbon::now();             
        $manufacturers->save();
       
        return response()->json([
            'success' => true,
            'message' => 'manufacturer updated successfully',
            'data' =>  [
                'id' => $manufacturers->id,
                'manufacturer' => $manufacturers->manufacturer,
                'added_by' => optional($manufacturers->addedByUser)->name, 
                'added_date' => $manufacturers->added_date,
                'edited_by' => optional($manufacturers->editedByUser)->name, 
                'edited_date' => $manufacturers->edited_date,
            ],
        ]);
    }

    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_manufacturers,id',
        ]);

        $manufacturers = Tbl_manufacturers::find($validatedData['id']);
        if (!$manufacturers) {
            return response()->json([
                'success' => false,
                'message' => 'manufacturer not found',
            ], 404);
        }
        $manufacturers->delete();

        return response()->json([
            'success' => true,
            'message' => 'manufacturer deleted successfully',
        ]);
    } 
}
