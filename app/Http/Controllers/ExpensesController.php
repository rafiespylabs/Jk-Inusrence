<?php

namespace App\Http\Controllers;

use App\Models\Tbl_expense_types;
use App\Models\Tbl_expenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpensesController extends Controller
{
    public function index(){
        $expenses = Tbl_expenses::with(['type', 'user'])->get();
        $expenseTypes = Tbl_expense_types::all();

        return view('admin.expenses', [
            'expenses' => $expenses,
            'expenseTypes' => $expenseTypes
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:100',
            'date' => 'required|date|date_format:Y-m-d',
            'type_id' => 'required|exists:tbl_expense_types,id',
        ]);
    
        try {
            $created_by = Auth::user()->id;
            $created_date = date('Y-m-d');
    
            $expenses = new Tbl_expenses();
            $expenses->amount = $validatedData['amount'];
            $expenses->description = $validatedData['description'] ?? null;
            $expenses->date = $validatedData['date'];
            $expenses->type_id = $validatedData['type_id'];
            $expenses->created_date = $created_date;
            $expenses->created_by = $created_by;
            $expenses->save();
    
            $type = Tbl_expense_types::find($validatedData['type_id']);
            $expenses->type = $type->type;
    
            return response()->json([
                'success' => true,
                'message' => 'Expenses created successfully',
                'data' => $expenses,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create Expenses: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:tbl_expenses,id',
        ]);
         
        $expense = Tbl_expenses::with('type')->find($request->id);

        if (!$expense) {
            return response()->json(['success' => false, 'message' => 'Expense not found'], 404);
        }
        return response()->json([
            'success' => true,
            'data' => [
                'amount' => $expense->amount,
                'description' => $expense->description,
                'date' => $expense->date,
                'type_id' => $expense->type_id,
            
            ]
        ]);
    }


    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_expenses,id',
           'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:100',
            'date' => 'required|date',
            'type_id' => 'required|exists:tbl_expense_types,id',           
        ]);

        $expenses = Tbl_expenses::find($validatedData['id']);

        $expenses->amount = $validatedData['amount'];
        $expenses->description = $validatedData['description'];
        $expenses->date = $validatedData['date'];
        $expenses->type_id = $validatedData['type_id'];       
        $expenses->save();

        $type = Tbl_expense_types::find($validatedData['type_id']);
            
            $expenses->type = $type->type;
           
        return response()->json([
            'success' => true,
            'message' => 'Expenses updated successfully',
            'data' => $expenses,
        ]);
    }

    public function destroy(Request $request)
    {
        
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_expenses,id', 
        ]);
        
        $expense = Tbl_expenses::find($validatedData['id']);
        if (!$expense) {
            return response()->json([
                'success' => false,
                'message' => 'Expense not found.',
            ], 404);
        }
       
        $expense->delete();

        return response()->json([
            'success' => true,
            'message' => 'Expense deleted successfully.',
        ]);
    }

}
