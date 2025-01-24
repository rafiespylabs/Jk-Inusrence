<?php

namespace App\Http\Controllers;

use App\Models\Tbl_supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers=Tbl_supplier::all();
        return view('admin.suppliers',['suppliers'=>$suppliers]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'supplier_name' => 'required|string|max:255',
            'supplier_gst' => 'required|string|max:15',
            'supplier_address' => 'nullable|string|max:500',
            'supplier_contact_number' => 'required|integer',           
        ]);

        try {
            $suppliers = new Tbl_supplier();
            $suppliers->supplier_name = $validatedData['supplier_name'];           
            $suppliers->supplier_gst = $validatedData['supplier_gst'];           
            $suppliers->supplier_address = $validatedData['supplier_address'];           
            $suppliers->supplier_contact_number = $validatedData['supplier_contact_number'];        
            $suppliers->save();
            
            return response()->json([
                'success' => true,
                'message' => 'Supplier created successfully',
                'data' => $suppliers,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create Supplier : ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $suppliers = Tbl_supplier::find($request->suppliers_id);
    
        if (!$suppliers) {
            return response()->json(['success' => false, 'message' => 'Supplier not found'], 404);
        }
    
        return response()->json([
            'success' => true,
            'data' => $suppliers
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_suppliers,id',
            'supplier_name' => 'required|string|max:255',
            'supplier_gst' => 'required|string|max:15',
            'supplier_address' => 'nullable|string|max:500',
            'supplier_contact_number' => 'required|integer',
            
        ]);

        $suppliers = Tbl_supplier::find($validatedData['id']);
        $suppliers->supplier_name = $validatedData['supplier_name'];             
        $suppliers->supplier_gst = $validatedData['supplier_gst'];             
        $suppliers->supplier_address = $validatedData['supplier_address'];             
        $suppliers->supplier_contact_number = $validatedData['supplier_contact_number'];             
        $suppliers->save();
       
        return response()->json([
            'success' => true,
            'message' => 'Supplier updated successfully',
            'data' => $suppliers,
        ]);
    }

    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_suppliers,id',
        ]);

        $suppliers = Tbl_supplier::find($validatedData['id']);
        if (!$suppliers) {
            return response()->json([
                'success' => false,
                'message' => 'Supplier not found',
            ], 404);
        }
        $suppliers->delete();

        return response()->json([
            'success' => true,
            'message' => 'Supplier deleted successfully',
        ]);
    } 
}
