<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Tbl_roles;
use Response;
use Redirect;
class RoleController extends Controller
{
    public function index()
    {
        $roles=Tbl_roles::all();
        return view('admin.roles',['roles'=>$roles]);
    }
    public function store(Request $request)
    {
        if(Tbl_roles::where('role',$request->role)
        ->exists())
        {
            return response()->json([
                'success' => false,
                'message' => 'Already Exist This Role',
            ]);
        }
       $role=new Tbl_roles;
       $role->role=$request->role;
       $role->save();
       return Response::json([ 'success' => true,'data'=>$role]);
    }
    public function show(Request $request)
    {
       $role_id=$request->role_id;
       $role=Tbl_roles::find($role_id);
       return Response::json($role);
    }
    public function update(Request $request)
    {
        if(Tbl_roles::where('role',$request->role)
        ->exists())
        {
            return response()->json([
                'success' => false,
                'message' => 'Already Exist This Role',
            ]);
        }
        $role_id=$request->role_id;
        $role=Tbl_roles::find($role_id);
        $role->role=$request->role;
        $role->save();
        return Response::json([ 'success' => true,'data'=>$role]);
    }
    public function destroy()
    {

    }
}
