<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\Tbl_prooftypes;
use Response;
use Redirect;
use Hash;
class ProoftypeController extends Controller
{
    public function index()
    {
       return view('admin.prooftypes');
    }
    public function list()
    {
        $prooftypes=Tbl_prooftypes::get();
        $html='';
        $i=1;
        foreach($prooftypes as $type)
        {
            $html.='<tr>';
            $html.='<td>'.$i.'</td>';
            $html.='<td>'.$type->type.'</td>';
            $html.='<td><i class="fa fa-edit edit_prooftype" data-id="'.$type->id.'" data-bs-toggle="modal" data-bs-target="#EditModal"></i></td>';
            $html.='</tr>';
            $i++;
        }
        return Response::json($html);

    }
    public function store(Request $request)
    {
        $prooftype=new Tbl_prooftypes;
        $prooftype->type=$request->type;
        $prooftype->save();
        return Response::json([ 'success' => true,'data'=>$prooftype]);
    }
    public function show(Request $request)
    {
        $prooftype_id=$request->prooftype_id;
        $prooftype=Tbl_prooftypes::find($prooftype_id);
        return Response::json($prooftype);
    }
    public function update(Request $request)
    {
        $prooftype_id=$request->prooftype_id;
        $prooftype=Tbl_prooftypes::find($prooftype_id);
        $prooftype->type=$request->type;
        $prooftype->save();
        return Response::json([ 'success' => true,'data'=>$prooftype]);
    }
}
