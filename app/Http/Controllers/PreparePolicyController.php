<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\Tbl_preparepolicies;
use App\Models\Tbl_policyholders;
use App\Models\Tbl_policy_categories;
use App\Models\Tbl_other_policies;
use App\Models\Tbl_healthpolicy;
use Response;
use Redirect;
class PreparePolicyController extends Controller
{
    public function index()
    {
        $user_id=Auth::user()->id;
        $vehicle_policies=Tbl_policyholders::get();
        $policy_categories=Tbl_policy_categories::all();
        return view('admin.preparedpolicies',['vehicle_policies'=>$vehicle_policies,
        'policy_categories'=>$policy_categories]);
    }
    public function list(Request $request)
    {
        $policy_id=$request->policy_id;
        $policy_category_id=$request->policy_category_id;
        $preparepolicies=Tbl_preparepolicies::query()
        ->when($policy_id, function ($query) use ($policy_id) {
            $query->where('policy_id',$policy_id); 
        })
        ->when($policy_category_id, function ($query) use ($policy_category_id) {
            $query->where('policy_cat_id',$policy_category_id); 
        })
        ->with('created_user','policy')->get();
        $html='';
        $i=1;
        foreach($preparepolicies as $prepare)
        {
            $created_user=$prepare->created_user->name??'';
            $policy_category=$prepare->policy_category->policy_category ??"";
            $policy='';
            if($prepare->policy_cat_id==1)
            {
                $policy=Tbl_healthpolicy::find($prepare->policy_id);
            }
            elseif($prepare->policy_cat_id==9)
            {
                $policy=Tbl_policyholders::find($prepare->policy_id);
            }
            else
            {
                $policy=Tbl_other_policies::find($prepare->policy_id);
            }
            $prepared_policy_name=$policy->name??"";
            $html.='<tr>';
            $html.='<td>'.$i.'</td>';
            $html.='<td>'.$prepared_policy_name.'</td>';
            $html.='<td><a href="'.$prepare->link.'" target="blank">Click Here</a></td>';
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
        $preparepolicy->policy_cat_id=$request->policy_cat_id;
        $preparepolicy->policy_id=$request->policy_id;
        $preparepolicy->link=$request->link;
        $preparepolicy->note=$request->note;
        $preparepolicy->created_by=$created_by;
        $preparepolicy->created_date=date('Y-m-d');
        if($preparepolicy->save())
        {
            if($request->policy_cat_id==1)
            {
                $healthpolicy=Tbl_healthpolicy::find($request->policy_id);
                $healthpolicy->prepared_user_id=$created_by;
                $healthpolicy->prepared_date=date('Y-m-d');
                $healthpolicy->save();
            }
            elseif($request->policy_cat_id==9)
            {
                $vehcilepolicy=Tbl_policyholders::find($request->policy_id);
                $vehcilepolicy->prepared_user_id=$created_by;
                $vehcilepolicy->prepared_date=date('Y-m-d');
                $vehcilepolicy->save();
            }
            else
            {
                $otherpolicy=Tbl_other_policies::where('policy_category_id',$request->policy_cat_id)->find($request->policy_id);
                $otherpolicy->prepared_user_id=$created_by;
                $otherpolicy->prepared_date=date('Y-m-d');
                $otherpolicy->save();
            }
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
        $preparepolicy->link=$request->link;
        $preparepolicy->note=$request->note;
        $preparepolicy->save();
        return Response::json([ 'success' => true,'message'=>'Prepared Policy Updated Successfully']);
    }
}
