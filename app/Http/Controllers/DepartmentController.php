<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Tbl_departments;
use Response;
use Redirect;
class DepartmentController extends Controller
{
    public function index()
    {
        $departments=Tbl_departments::all();
        return view('admin.departments',['departments'=>$departments]);
    }
    public function store(Request $request)
    {
        if(Tbl_departments::where('department',$request->department)
        ->exists())
        {
            return response()->json([
                'success' => false,
                'message' => 'Already Exist This department',
            ]);
        }
        $department=new Tbl_departments;
        $department->department=$request->department;
        $department->save();
        return Response::json([ 'success' => true,'data'=>$department]);
    }
    public function show(Request $request)
    {
        $department_id=$request->department_id;
        $department=Tbl_departments::find($department_id);
        return Response::json($department);
    }
    public function update(Request $request)
    {
        if(Tbl_departments::where('department',$request->department)
        ->exists())
        {
            return response()->json([
                'success' => false,
                'message' => 'Already Added This department',
            ]);
        }
        $department_id=$request->department_id;
        $department=Tbl_departments::find($department_id);
        $department->department=$request->department;
        $department->save();
        return Response::json([ 'success' => true,'data'=>$department]);
    }
    public function destroy()
    {

    }
}
