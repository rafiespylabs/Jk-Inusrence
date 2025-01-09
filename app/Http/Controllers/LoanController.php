<?php

namespace App\Http\Controllers;

use App\Models\Tbl_loans;
use App\Models\Tbl_loantypes;
use App\Models\Tbl_vechicle_categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function index(){
        $loans = Tbl_loans::with(['loan_type','vehicle_category','user'])->get();
        $loan_type = Tbl_loantypes::all();
        $vehicle_category = Tbl_vechicle_categories::all();

        return view('admin.loans', [
            'loans' => $loans,
            'loan_type' => $loan_type,
            'vehicle_category' => $vehicle_category,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'customer_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'loan_type_id' => 'required|integer|exists:tbl_loantypes,id',
            'bank' => 'required|string|max:255',
            'loan_amount' => 'required|numeric|min:0',
            'vehicle_cat_id' => 'required|integer|exists:tbl_vechicle_categories,id',
            'status' => 'required|boolean',
            'reason' => 'nullable|string|max:255',
            'approved_date' => 'nullable|date',
            'remarks' => 'required|string|max:255',            
        ]);
    
        try {
            $created_by = Auth::user()->id;
            $created_date = date('Y-m-d');
    
            $loans = new Tbl_loans();
            $loans->customer_name = $validatedData['customer_name'];
            $loans->phone_number = $validatedData['phone_number'];
            $loans->loan_type_id = $validatedData['loan_type_id'];           
            $loans->bank = $validatedData['bank'];           
            $loans->loan_amount = $validatedData['loan_amount'];           
            $loans->vehicle_cat_id = $validatedData['vehicle_cat_id'];           
            $loans->status = $validatedData['status'];           
            $loans->reason = $validatedData['reason'];           
            $loans->approved_date = $validatedData['approved_date'];           
            $loans->remarks = $validatedData['remarks'];    
            $loans->created_by = $created_by;    
            $loans->created_date = $created_date;                
            $loans->save();
    
            $loan_type = Tbl_loantypes::find($validatedData['loan_type_id']);
            $loans->loan_type = $loan_type->loan_type;

            $vehicle_category = Tbl_vechicle_categories::find($validatedData['vehicle_cat_id']);
            $loans->vehicle_category = $vehicle_category->vehicle_category;
    
            return response()->json([
                'success' => true,
                'message' => 'Loan created successfully',
                'data' => $loans,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create Loan: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:tbl_loans,id',
        ]);
         
        $loans = Tbl_loans::with('loan_type','vehicle_category')->find($request->id);

        
        if (!$loans) {
            return response()->json(['success' => false, 'message' => 'Loan not found'], 404);
        }
        

        return response()->json([
            'success' => true,
            'data' => [

                'customer_name' => $loans->customer_name ,
                'phone_number' => $loans->phone_number,
                'loan_type_id' => $loans->loan_type_id,       
                'bank' => $loans->bank,          
                'loan_amount' => $loans->loan_amount,         
                'vehicle_cat_id' => $loans->vehicle_cat_id,       
                'status' => $loans->status,       
                'reason' => $loans->reason,       
                'approved_date' => $loans->approved_date,    
                'remarks' => $loans->remarks,         
                 
            ]
        ]);
    }
   

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_loans,id',
            'customer_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'loan_type_id' => 'required|integer|exists:tbl_loantypes,id',
            'bank' => 'required|string|max:255',
            'loan_amount' => 'required|numeric|min:0',
            'vehicle_cat_id' => 'required|integer|exists:tbl_vechicle_categories,id',
            'status' => 'required|boolean',
            'reason' => 'nullable|string|max:255',
            'approved_date' => 'nullable|date',
            'remarks' => 'required|string|max:255', 
        ]);

        $loans = Tbl_loans::find($validatedData['id']);
        $loans->customer_name = $validatedData['customer_name'];
        $loans->phone_number = $validatedData['phone_number'];
        $loans->loan_type_id = $validatedData['loan_type_id'];           
        $loans->bank = $validatedData['bank'];           
        $loans->loan_amount = $validatedData['loan_amount'];           
        $loans->vehicle_cat_id = $validatedData['vehicle_cat_id'];           
        $loans->status = $validatedData['status'];           
        $loans->reason = $validatedData['reason'];           
        $loans->approved_date = $validatedData['approved_date'];           
        $loans->remarks = $validatedData['remarks'];           
        $loans->save();

        $loan_type = Tbl_loantypes::find($validatedData['loan_type_id']);
        $loans->loan_type = $loan_type->loan_type;

        $vehicle_category = Tbl_vechicle_categories::find($validatedData['vehicle_cat_id']);
        $loans->vehicle_category = $vehicle_category->vechile_category;

           
        return response()->json([
            'success' => true,
            'message' => 'Loan updated successfully',
            'data' => $loans,
        ]);
    }

    public function destroy(Request $request)
    {
        
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_loans,id', 
        ]);
        
        $loans = Tbl_loans::find($validatedData['id']);
        if (!$loans) {
            return response()->json([
                'success' => false,
                'message' => 'Loan not found.',
            ], 404);
        }
       
        $loans->delete();

        return response()->json([
            'success' => true,
            'message' => 'Loan deleted successfully.',
        ]);
    }

}
