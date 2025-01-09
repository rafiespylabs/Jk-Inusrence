<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tbl_dealers;
use Response;
use Redirect;
class DealerController extends Controller
{
    public function index()
    {
        return view('admin.dealers');
    }
    public function list()
    {
        $dealers=Tbl_dealers::with('added_user')->get();
        $html='';
        $i=1;
        foreach($dealers as $dealer)
        {
            $added_by=$dealer->added_user->name??'';
            $html.='<tr>';
            $html.='<td>'.$i.'</td>';
            $html.='<td>'.$dealer->dealer_name.'</td>';
            $html.='<td>'.$dealer->phone_number.'</td>';
            $html.='<td>'.$dealer->company_name.'</td>';
            $html.='<td>'.$added_by.'</td>';
            $html.='<td>'.$dealer->created_date.'</td>';
             $html.='<td>';
            $html.='<i class="fa fa-edit edit_dealer" data-id="'.$dealer->id.'" data-bs-toggle="modal" data-bs-target="#EditModal"></i>';
            // $html.='<i class="fa fa-trash delete_agent" data-id="'.$dealer->id.'"></i>';
            $html.='</td>';
            $html.='</tr>';
            $i++;
        }
        return Response::json($html);
    }
    public function store(Request $request)
    {
       $created_by=Auth::user()->id;
       $dealer=new Tbl_dealers;
       $dealer->dealer_name=$request->dealer_name;
       $dealer->email=$request->email;
       $dealer->phone_number=$request->phone_number;
       $dealer->company_name=$request->company_name;
       $dealer->created_by=$created_by;
       $dealer->created_date=date('Y-m-d');
       $dealer->save();
       return Response::json([ 'success' => true]);
    }
    public function show(Request $request)
    {
         $dealer_id=$request->dealer_id;
         $dealer=Tbl_dealers::find($dealer_id);
         return Response::json($dealer);
    }
    public function update(Request $request)
    {
        $dealer_id=$request->dealer_id;
        $dealer=Tbl_dealers::find($dealer_id);
        $dealer->dealer_name=$request->dealer_name;
        $dealer->email=$request->email;
        $dealer->phone_number=$request->phone_number;
        $dealer->company_name=$request->company_name;
        $dealer->save();
       return Response::json([ 'success' => true]);
    }
}
