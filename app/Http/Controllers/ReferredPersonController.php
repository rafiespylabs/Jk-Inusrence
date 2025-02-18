<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\Tbl_referred_persons;
use Response;
use Redirect;
use Hash;
class ReferredPersonController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $referred_persons=Tbl_referred_persons::latest('id')->get();
            return Response::json($referred_persons);
        }
        return view('admin.reffered_person');
    }
    public function list()
    {
        $referred_persons=Tbl_referred_persons::get();
        $html='';
        $i=1;
        foreach($referred_persons as $person)
        {
            $html.='<tr>';
            $html.='<td>'.$i.'</td>';
            $html.='<td>'.$person->name.'</td>';
            $html.='<td>'.$person->phone_number.'</td>';
            $html.='<td><i class="fa fa-edit edit_reffered_person" data-id="'.$person->id.'" data-bs-toggle="modal" data-bs-target="#EditModal"></i></td>';
            $html.='</tr>';
            $i++;
        }
        return Response::json($html);
    }
    public function store(Request $request)
    {
        if(Tbl_referred_persons::where('phone_number', $request->phone_number)
        ->whereNotNull('phone_number')
        ->exists())
        {
            return response()->json([
                'success' => false,
                'message' => 'Already Exist This Reference Person or Phone Number',
            ]);
        }
        $referred_person=new Tbl_referred_persons;
        $referred_person->name=$request->name;
        $referred_person->phone_number=$request->phone_number;
        $referred_person->save();
        return Response::json([ 'success' => true,'message'=>'Referred Person Created successfully']);
    }
    public function show(Request $request)
    {
        $referred_id=$request->referred_id;
        $referred_person=Tbl_referred_persons::find($referred_id);
        return Response::json($referred_person);
    }
    public function update(Request $request)
    {
        if(Tbl_referred_persons::where('phone_number', $request->phone_number)
        ->exists())
        {
            return response()->json([
                'success' => false,
                'message' => 'Already Updated This Reference Person or Phone Number',
            ]);
        }
        $referred_id=$request->referred_id;
        $referred_person=Tbl_referred_persons::find($referred_id);
        $referred_person->name=$request->name;
        $referred_person->phone_number=$request->phone_number;
        $referred_person->save();
        return Response::json([ 'success' => true,'message'=>'Referred Person Updated successfully']);
    }
}
