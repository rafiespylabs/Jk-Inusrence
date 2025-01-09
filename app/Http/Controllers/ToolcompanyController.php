<?php

namespace App\Http\Controllers;

use App\Models\Tbl_districts;
use App\Models\Tbl_states;
use App\Models\Tbl_tool_company;
use Illuminate\Http\Request;

class ToolcompanyController extends Controller
{
    public function index(){
        $toolcompanies = Tbl_tool_company::with(['district', 'state'])->get();
        $district = Tbl_districts::all();
        $state = Tbl_states::all();

        return view('admin.toolcompanies', [
            'toolcompanies' => $toolcompanies,
            'district' => $district,
            'state' => $state,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'company_name' => 'required|string|max:100',
            'address' => 'required|string|max:100',
            'district_id' => 'required|exists:tbl_districts,id',
            'state_id' => 'required|exists:tbl_states,id',
        ]);
    
        try {
    
            $toolcompanies = new Tbl_tool_company();
            $toolcompanies->company_name = $validatedData['company_name'];
            $toolcompanies->address = $validatedData['address'];
            $toolcompanies->district_id = $validatedData['district_id'];
            $toolcompanies->state_id = $validatedData['state_id'];           
            $toolcompanies->save();
    
            $district = Tbl_districts::find($validatedData['district_id']);
            $toolcompanies->district = $district->district;

            $state = Tbl_states::find($validatedData['state_id']);
            $toolcompanies->state = $state->state;

    
            return response()->json([
                'success' => true,
                'message' => 'Tool company created successfully',
                'data' => $toolcompanies,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create tool company: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:tbl_tool_companies,id',
        ]);
         
        $toolcompanies = Tbl_tool_company::with('district','state')->find($request->id);

        if (!$toolcompanies) {
            return response()->json(['success' => false, 'message' => 'Tool company not found'], 404);
        }
        return response()->json([
            'success' => true,
            'data' => [
                'company_name' => $toolcompanies->company_name,
                'address' => $toolcompanies->address,
                'district_id' => $toolcompanies->district_id,
                'state_id' => $toolcompanies->state_id,            
            ]
        ]);
    }


    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_tool_companies,id',
            'company_name' => 'required|string|max:100',
            'address' => 'required|string|max:100',
            'district_id' => 'required|exists:tbl_districts,id',
            'state_id' => 'required|exists:tbl_states,id',       
        ]);

        $toolcompanies = Tbl_tool_company::find($validatedData['id']);

        $toolcompanies->company_name = $validatedData['company_name'];
            $toolcompanies->address = $validatedData['address'];
            $toolcompanies->district_id = $validatedData['district_id'];
            $toolcompanies->state_id = $validatedData['state_id'];       
        $toolcompanies->save();

        $district = Tbl_districts::find($validatedData['district_id']);            
            $toolcompanies->district = $district->district;

            $state = Tbl_states::find($validatedData['state_id']);            
            $toolcompanies->state = $state->state;
           
        return response()->json([
            'success' => true,
            'message' => 'Tool company updated successfully',
            'data' => $toolcompanies,
        ]);
    }

    public function destroy(Request $request)
    {
        
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_tool_companies,id', 
        ]);
        
        $toolcompanies = Tbl_tool_company::find($validatedData['id']);
        if (!$toolcompanies) {
            return response()->json([
                'success' => false,
                'message' => 'Tool company not found.',
            ], 404);
        }
       
        $toolcompanies->delete();

        return response()->json([
            'success' => true,
            'message' => 'Tool company deleted successfully.',
        ]);
    }

}
