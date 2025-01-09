<?php

namespace App\Http\Controllers;

use App\Models\Tbl_expense_types;
use Illuminate\Http\Request;

class ExpensetypesController extends Controller
{
    public function index()
    {
        $expensetypes=Tbl_expense_types::all();
        return view('admin.expensetypes',['expensetypes'=>$expensetypes]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|string|max:100',           
        ]);

        try {
            $expensetypes = new Tbl_expense_types();
            $expensetypes->type = $validatedData['type'];           
            $expensetypes->save();
            
            return response()->json([
                'success' => true,
                'message' => 'Expense Types created successfully',
                'data' => $expensetypes,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create Expense Types: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $expensetypes = Tbl_expense_types::find($request->expensetypes_id);
    
        if (!$expensetypes) {
            return response()->json(['success' => false, 'message' => 'Expense Types not found'], 404);
        }
    
        return response()->json([
            'success' => true,
            'data' => $expensetypes
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_expense_types,id',
            'type' => 'required|string|max:100',
            
        ]);

        $expensetypes = Tbl_expense_types::find($validatedData['id']);
        $expensetypes->type = $validatedData['type'];             
        $expensetypes->save();
       
        return response()->json([
            'success' => true,
            'message' => 'Expense Types updated successfully',
            'data' => $expensetypes,
        ]);
    }

    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_expense_types,id',
        ]);

        $expensetypes = Tbl_expense_types::find($validatedData['id']);
        if (!$expensetypes) {
            return response()->json([
                'success' => false,
                'message' => 'Expense Types not found',
            ], 404);
        }
        $expensetypes->delete();

        return response()->json([
            'success' => true,
            'message' => 'Expense Types deleted successfully',
        ]);
    } 
}
