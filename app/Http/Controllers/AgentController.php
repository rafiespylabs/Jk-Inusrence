<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tbl_agents;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Response;
use Redirect;
class AgentController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $agents=Tbl_agents::latest('id')->get();
            return Response::json($agents);
        }
        return view('admin.agents');
    }
    public function list()
    {
        $agents=Tbl_agents::with('added_user')->get();
        $html='';
        $i=1;
        foreach($agents as $agent)
        {
            $added_by=$agent->added_user->name??'';
            $html.='<tr>';
            $html.='<td>'.$i.'</td>';
            $html.='<td>'.$agent->agent_name.'</td>';
            $html.='<td>'.$agent->phone_number.'</td>';
            $html.='<td>'.$agent->company_name.'</td>';
            $html.='<td>'.$added_by.'</td>';
            $html.='<td>'.$agent->created_date.'</td>';
            $html.='<td><i class="fa fa-edit edit_agent" data-id="'.$agent->id.'" data-bs-toggle="modal" data-bs-target="#EditModal"></i>
            <i class="fa fa-trash delete_agent" data-id="'.$agent->id.'"></i></td>';
            $html.='</tr>';
            $i++;
        }
        return Response::json($html);
    }
    public function store(Request $request)
    {
        $created_by=Auth::user()->id;
        $agent=new Tbl_agents;
        $agent->agent_name=$request->agent_name;
        $agent->email=$request->email;
        $agent->phone_number=$request->phone_number;
        $agent->company_name=$request->company_name;
        $agent->created_by=$created_by;
        $agent->created_date=date('Y-m-d');
        $agent->save();
        return Response::json([ 'success' => true,'message'=>'Successfully Created Agent']);
    }
    public function show(Request $request)
    {
       $agent_id=$request->agent_id;
       $agent=Tbl_agents::find($agent_id);
       return Response::json($agent);
    }
    public function update(Request $request)
    {
        $agent_id=$request->agent_id;
        $agent=Tbl_agents::find($agent_id);
        $agent->agent_name=$request->agent_name;
        $agent->email=$request->email;
        $agent->phone_number=$request->phone_number;
        $agent->company_name=$request->company_name;
        $agent->save();
        return Response::json([ 'success' => true]);
    }
}
