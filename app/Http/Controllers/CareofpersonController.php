<?php

namespace App\Http\Controllers;

use App\Models\Tbl_jw_careof_persons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CareofpersonController extends Controller
{
    public function index()
    {
        $careofpersons=Tbl_jw_careof_persons::with(['addedByUser','editedByUser'])->get();
        
        return view('admin.careofpersons',['careofpersons'=>$careofpersons]);
    }

    public function list(Request $request)
    {
        $limit = $request->input('length', 10);
        $start = $request->input('start', 0);
        $query = Tbl_jw_careof_persons::with(['addedByUser', 'editedByUser']);
        $totalRecords = Tbl_jw_careof_persons::count(); 
        $careofpersons = $query->skip($start)
            ->take($limit)
            ->latest('id')
            ->get();
    
        $data = [];
        $slNo = $start + 1;
        foreach ($careofpersons as $careofperson) {
            $createdUser = Auth::user()->name ?? ' ';
            $editedUser = $careofperson->edited_by ? optional(Auth::user())->name ?? ' ' : ''; 
            $createdDate = $careofperson->added_date ? Carbon::parse($careofperson->added_date)->format('d/m/Y h:i A') : '';
            $editedDate = $careofperson->edited_date ? Carbon::parse($careofperson->edited_date)->format('d/m/Y h:i A') : '';
            
            $editButton = '<button class="btn btn-sm btn-primary edit_careofpersons" onclick="editcareofpersons('.$careofperson->id.')" title="Edit">
                            <i class="fa fa-edit"></i>
                          </button>';
            $deleteButton = '<button class="btn btn-sm btn-danger delete_careofperson" onclick="deletecareofpersons('.$careofperson->id.')" title="Delete">
                                <i class="fa fa-trash"></i>
                             </button>';
    
            $data[] = [
                'sl_no' => $slNo++,
                'careof_person' => $careofperson->careof_person,
                'added_by' => $createdUser,
                'added_date' => $createdDate,
                'edited_by' => $editedUser,
                'edited_date' => $editedDate,
                'action' => $editButton . ' ' . $deleteButton,
                'id' => $careofperson->id,
            ];
        }
    
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $totalRecords,
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'careof_person' => 'required|string|max:100',  
        ]);

        try {  

            $careofperosons = new Tbl_jw_careof_persons();
            $careofperosons->careof_person  = $validatedData['careof_person'];         
            $careofperosons->added_by = Auth::user()->id;           
            $careofperosons->added_date = Carbon::now();             
            $careofperosons->save();            
            
            return response()->json([
                'success' => true,
                'message' => 'careofperoson created successfully',
                'data' => [
                    'id' => $careofperosons->id,
                    'careof_person' => $careofperosons->careof_person,
                    'added_by' => $careofperosons->added_by,
                    'added_date' => $careofperosons->added_date,
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create careofperoson : ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit($id)
    {
        $careofperson = Tbl_jw_careof_persons::find($id);

        if (!$careofperson) {
            return response()->json(['error' => 'Careof Person not found'], 404);
        }

        return response()->json($careofperson);
    }    
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'careof_person' => 'required|string|max:100',
        ]);

        $careofperson = Tbl_jw_careof_persons::find($id);

        if (!$careofperson) {
            return response()->json(['error' => 'Careof Person not found'], 404);
        }

        try {
            $careofperson->careof_person = $validatedData['careof_person'];
            $careofperson->edited_by = Auth::user()->id;
            $careofperson->edited_date = Carbon::now();
            $careofperson->save();

            return response()->json([
                'success' => true,
                'message' => 'Careof Person updated successfully',
                'data' => $careofperson,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update Careof Person: ' . $e->getMessage(),
            ], 500);
        }
    }
    
    public function destroy($id)
    {
        try {

            $careofperson = Tbl_jw_careof_persons::find($id);
            
            if (!$careofperson) {
                return response()->json([
                    'error' => 'Careof Person not found!'
                ], 404);
            }
            
            $careofperson->delete();
            
            return response()->json([
                'success' => 'Careof Person deleted successfully!'
            ]);
        } catch (\Exception $e) {           
            return response()->json([
                'error' => 'Something went wrong! ' . $e->getMessage()
            ], 500);
        }
    }

}
