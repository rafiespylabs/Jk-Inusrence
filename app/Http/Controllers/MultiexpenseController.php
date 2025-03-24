<?php

namespace App\Http\Controllers;

use App\Models\Tbl_branches;
use App\Models\Tbl_business_category;
use App\Models\Tbl_expense_types;
use App\Models\Tbl_multi_expenses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MultiexpenseController extends Controller
{
    public function index(){
        $multiexpenses = Tbl_multi_expenses::with(['type','business_catogory','branch', 'addedByUser','editedByUser'])->get();
        $expensetypes = Tbl_expense_types::all();
        $businesscategories = Tbl_business_category::all();
        $branches = Tbl_branches::all();

        return view('admin.multiexpenses', [
            'multiexpenses' => $multiexpenses,
            'expensetypes' => $expensetypes,
            'businesscategories' => $businesscategories,
            'branches' => $branches
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:100',
            'date' => 'required|date|date_format:Y-m-d',
            'type_id' => 'required|exists:tbl_expense_types,id',
            'business_catogory_id' => 'required|exists:tbl_business_categories,id',
            'branch_id' => 'required|exists:tbl_branches,id',
        ]);
    
        try {
    
            $multiexpenses = new Tbl_multi_expenses();
            $multiexpenses->amount = $validatedData['amount'];
            $multiexpenses->description = $validatedData['description'] ?? null;
            $multiexpenses->date = $validatedData['date'];
            $multiexpenses->type_id = $validatedData['type_id'];
            $multiexpenses->business_catogory_id = $validatedData['business_catogory_id'];
            $multiexpenses->branch_id = $validatedData['branch_id'];
            $multiexpenses->added_by = Auth::user()->id;  ;
            $multiexpenses->added_date = Carbon::now();
            $multiexpenses->save();
    
            $expensetypes = Tbl_expense_types::find($validatedData['type_id']);
            $multiexpenses->type = $expensetypes->type;

            $businesscategories = Tbl_business_category::find($validatedData['business_catogory_id']);
            $multiexpenses->business_category_name = $businesscategories->business_category_name;

            $branches = Tbl_branches::find($validatedData['branch_id']);
            $multiexpenses->branch = $branches->branch;

            $user = User::find(Auth::user()->id);
            $multiexpenses->added_by = $user->name;
    
            return response()->json([
                'success' => true,
                'message' => 'MultiExpenses created successfully',
                'data' => $multiexpenses,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create MultiExpenses: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:tbl_multi_expenses,id',
        ]);
         
        $multiexpenses = Tbl_multi_expenses::with('type')->find($request->id);

        if (!$multiexpenses) {
            return response()->json(['success' => false, 'message' => 'multiexpense not found'], 404);
        }
        return response()->json([
            'success' => true,
            'data' => [
                'amount' => $multiexpenses->amount,
                'description' => $multiexpenses->description,
                'date' => $multiexpenses->date,
                'type_id' => $multiexpenses->type_id,
                'business_catogory_id' => $multiexpenses->business_catogory_id,
                'branch_id' => $multiexpenses->branch_id,
            
            ]
        ]);
    }


    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_multi_expenses,id',
           'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:100',
            'date' => 'required|date|date_format:Y-m-d',
            'type_id' => 'required|exists:tbl_expense_types,id',
            'business_catogory_id' => 'required|exists:tbl_business_categories,id',
            'branch_id' => 'required|exists:tbl_branches,id',           
        ]);

        $multiexpenses = Tbl_multi_expenses::find($validatedData['id']);

        $multiexpenses->amount = $validatedData['amount'];
        $multiexpenses->description = $validatedData['description'];
        $multiexpenses->date = $validatedData['date'];
        $multiexpenses->type_id = $validatedData['type_id'];       
        $multiexpenses->business_catogory_id = $validatedData['business_catogory_id'];       
        $multiexpenses->branch_id = $validatedData['branch_id'];    
        $multiexpenses->edited_by = Auth::user()->id;
        $multiexpenses->edited_date = Carbon::now();     
        $multiexpenses->save();

        $expensetypes = Tbl_expense_types::find($validatedData['type_id']);
        $multiexpenses->type = $expensetypes->type;

        $businesscategories = Tbl_business_category::find($validatedData['business_catogory_id']);
        $multiexpenses->business_category_name= $businesscategories->business_category_name;

        $branches = Tbl_branches::find($validatedData['branch_id']);
        $multiexpenses->branch = $branches->branch;

        $user = User::find( $multiexpenses->added_by);
        $multiexpenses->added_by = $user->name;

        $edited_user = User::find(Auth::user()->id);
        $multiexpenses->edited_by = $edited_user->name;
        return response()->json([
            'success' => true,
            'message' => 'multi expense updated successfully',
            'data' => $multiexpenses,
        ]);
    }

    public function destroy(Request $request)
    {
        
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_multi_expenses,id', 
        ]);
        
        $multiexpenses = Tbl_multi_expenses::find($validatedData['id']);
        if (!$multiexpenses) {
            return response()->json([
                'success' => false,
                'message' => 'multi expense not found.',
            ], 404);
        }
       
        $multiexpenses->delete();

        return response()->json([
            'success' => true,
            'message' => 'multi expense deleted successfully.',
        ]);
    }
}
