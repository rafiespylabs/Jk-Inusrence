<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tbl_leadsources;
use Response;
use Redirect;
use Hash;
class LeadsourceController extends Controller
{
    public function index()
    {
      return view('admin.leadsources');
    }
    public function list()
    {
        $leadsources=Tbl_leadsources::get();
        $html='';
        $i=1;
        foreach($leadsources as $source)
        {
            $html.='<tr>';
            $html.='<td>'.$i.'</td>';
            $html.='<td>'.$source->leadsource.'</td>';
            $html.='<td><i class="fa fa-edit edit_leadsource" data-id="'.$source->id.'" data-bs-toggle="modal" data-bs-target="#EditModal"></i></td>';
            $html.='</tr>';
            $i++;
        }
        return Response::json($html);
    }
    public function store(Request $request)
    {
        if(Tbl_leadsources::where('leadsource',$request->leadsource)
        ->exists())
        {
            return response()->json([
                'success' => false,
                'message' => 'Already Exist This LeadSource',
            ]);
        }
        $leadsource=new Tbl_leadsources;
        $leadsource->leadsource=$request->leadsource;
        $leadsource->save();
        return Response::json([ 'success' => true,'data'=>$leadsource]);
    }
    public function show(Request $request)
    {
        $source_id=$request->leadsource_id;
        $leadsource=Tbl_leadsources::find($source_id);
        return Response::json($leadsource);
    }
    public function update(Request $request)
    {
        if(Tbl_leadsources::where('leadsource',$request->leadsource)
        ->exists())
        {
            return response()->json([
                'success' => false,
                'message' => 'Already Updated This LeadSource',
            ]);
        }
        $source_id=$request->leadsource_id;
        $leadsource=Tbl_leadsources::find($source_id);
        $leadsource->leadsource=$request->leadsource;
        $leadsource->save();
        return Response::json([ 'success' => true,'data'=>$leadsource]);
    }
}
