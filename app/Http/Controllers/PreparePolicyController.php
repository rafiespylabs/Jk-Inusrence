<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\Tbl_preparepolicies;
use App\Models\Tbl_policyholders;
use Response;
use Redirect;
class PreparePolicyController extends Controller
{
    public function index()
    {
        $user_id=Auth::user()->id;
        $assigned_policies=Tbl_policyholders::where('assigned_userid',$user_id)->get();
        return view('admin.preparedpolicies',['assigned_policies'=>$assigned_policies]);
    }
    public function list()
    {
        $preparepolicies=Tbl_preparepolicies::with('created_user','policy')->get();
        $html='';
        $i=1;
        foreach($preparepolicies as $prepare)
        {
            $created_user=$prepare->created_user->name??'';
            $html.='<tr>';
            $html.='<td>'.$i.'</td>';
            $html.='<td>'.$prepare->policy->vehicle_number.'</td>';
            $html.='<td>'.$prepare->policy->primary_number.'</td>';
            $html.='<td>'.$prepare->link.'</td>';
            $html.='<td>'.$prepare->note.'</td>';
            $html.='<td>'.$created_user.'</td>';
            $html.='<td>'.$prepare->created_date.'</td>';
            $html.='<td>';
            $html.='<i class="fa fa-edit edit_preparepolicy" data-id="'.$prepare->id.'" data-bs-toggle="modal"   data-bs-target="#EditModal"></i>';
            $html.='</td>';
            $html.='</tr>';
            $i++;
        }
        return Response::json($html);
    }
    public function store(Request $request)
    {
        $created_by=Auth::user()->id;
        $preparepolicy=new Tbl_preparepolicies;
        $preparepolicy->policy_id=$request->policy_id;
        $preparepolicy->link=$request->link;
        $preparepolicy->note=$request->note;
        $preparepolicy->created_by=$created_by;
        $preparepolicy->created_date=date('Y-m-d');
        if($preparepolicy->save())
        {
            $policy=Tbl_policyholders::find($request->policy_id);
            $policy->prepared_user_id=$created_by;
            $policy->prepared_date=date('Y-m-d');
            $policy->save();
        }
        return Response::json([ 'success' => true,'message'=>'Policy Prepared Successfully']);
    }
    public function show(Request $request)
    {
       $prepare_policyid=$request->prepare_policyid;
       $preparepolicy=Tbl_preparepolicies::find($prepare_policyid);
       return Response::json($preparepolicy);
    }
    public function update(Request $request)
    {
        $created_by=Auth::user()->id;
        $prepare_policyid=$request->prepare_policyid;
        $preparepolicy=Tbl_preparepolicies::find($prepare_policyid);
        $preparepolicy->policy_id=$request->policy_id;
        $preparepolicy->link=$request->link;
        $preparepolicy->note=$request->note;
        if($preparepolicy->save())
        {
            $policy=Tbl_policyholders::find($request->policy_id);
            $policy->prepared_user_id=$created_by;
            $policy->prepared_date=date('Y-m-d');
            $policy->save();
        }
        return Response::json([ 'success' => true,'message'=>'Prepared Policy Updated Successfully']);
    }
}
