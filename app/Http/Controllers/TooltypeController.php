<?php

namespace App\Http\Controllers;

use App\Models\Tbl_tool_types;
use Illuminate\Http\Request;

class TooltypeController extends Controller
{
    public function index()
    {
        $tooltypes=Tbl_tool_types::all();
        return view('admin.tooltypes',['tooltypes'=>$tooltypes]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type_name' => 'required|string|max:100',           
        ]);

        try {
            $tooltypes = new Tbl_tool_types();
            $tooltypes->type_name = $validatedData['type_name'];           
            $tooltypes->save();
            
            return response()->json([
                'success' => true,
                'message' => 'Tool Types created successfully',
                'data' => $tooltypes,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create Tool Types: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $tooltypes = Tbl_tool_types::find($request->tooltypes_id);
    
        if (!$tooltypes) {
            return response()->json(['success' => false, 'message' => 'Tool Types not found'], 404);
        }
    
        return response()->json([
            'success' => true,
            'data' => $tooltypes
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_tool_types,id',
            'type_name' => 'required|string|max:100',
            
        ]);

        $tooltypes = Tbl_tool_types::find($validatedData['id']);
        $tooltypes->type_name = $validatedData['type_name'];             
        $tooltypes->save();
       
        return response()->json([
            'success' => true,
            'message' => 'Tool Types updated successfully',
            'data' => $tooltypes,
        ]);
    }

    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_tool_types,id',
        ]);

        $tooltypes = Tbl_tool_types::find($validatedData['id']);
        if (!$tooltypes) {
            return response()->json([
                'success' => false,
                'message' => 'Tool Types not found',
            ], 404);
        }
        $tooltypes->delete();

        return response()->json([
            'success' => true,
            'message' => 'Tool Types deleted successfully',
        ]);
    } 
}
