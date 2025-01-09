<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tbl_policyholders;
use App\Models\Tbl_vehiclemodels;
use App\Models\Tbl_companies;
use App\Models\Tbl_payment_modes;
use App\Models\Tbl_agents;
use App\Models\Tbl_dealers;
use App\Models\Tbl_staffs;
use App\Models\Tbl_referred_persons;
use App\Models\Tbl_insurence_providers;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Response;
use Redirect;
class PolicyholderController extends Controller
{
    public function index()
    {
        $vehiclemodels=Tbl_vehiclemodels::all();
        $companies=Tbl_companies::all();
        $payment_modes=Tbl_payment_modes::all();
        $agents=Tbl_agents::all();
        $dealers=Tbl_dealers::all();
        $staffs=Tbl_staffs::with('user')->get();
        $referred_persons=Tbl_referred_persons::all();
        $providers=Tbl_insurence_providers::all();
        return view('admin.policyholders',['vehiclemodels'=>$vehiclemodels,
        'companies'=>$companies,'payment_modes'=>$payment_modes,'agents'=>$agents,
        'dealers'=>$dealers,'staffs'=>$staffs,'referred_persons'=>$referred_persons,'providers'=>$providers]);
    }
    public function list()
    {
        $policyholders=Tbl_policyholders::with('added_executive','vehicle_model','company','agent',
        'prepared_user','dealer','payment_mode','reffered')->get();
        $html='';
        $i=1;
        foreach($policyholders as $holder)
        {
            $added_executive=$holder->added_executive->name??'';
            $vehicle_model=$holder->vehicle_model->vehicle_model??'';
            $company=$holder->company->company??'';
            $agent=$holder->agent->agent_name??'';
            $dealer=$holder->dealer->dealer_name??'';
            $prepared_by=$holder->prepared_user->name??'';
            $payment_mode=$holder->payment_mode->payment_mode??"";
            $referred_person=$holder->reffered->name??"";
            $html.='<tr>';
            $html.='<td>'.$i.'</td>';
            $html.='<td>'.$agent.'</td>';
            $html.='<td>'.$dealer.'</td>';
            $html.='<td>'.$holder->name.'</td>';
            $html.='<td>'.$holder->vehicle_number.'</td>';
            $html.='<td>'.$holder->primary_number.'</td>';
            $html.='<td>'.$holder->secondary_number.'</td>';
            $html.='<td>'.$holder->expiry_date.'</td>';
            $html.='<td>'.$vehicle_model.'</td>';
            $html.='<td>'.$company.'</td>';
            $html.='<td>'.$holder->premium_amount.'</td>';
            $html.='<td>'.$holder->valuation_amount.'</td>';
            $html.='<td>'.$holder->total_cost.'</td>';
            $html.='<td>'.$payment_mode.'</td>';
            $html.='<td>'.$added_executive.'</td>';
            $html.='<td>'.$prepared_by.'</td>';
            $html.='<td>'.$referred_person.'</td>';
            $html.='<td>'.$holder->created_date.'</td>';
            $html.='<td>';
            $html.='<a href="/payments/'.$holder->id.'"><button class="btn btn-secondary btn-xs" data-id="'.$holder->id.'">Payment</button></a>';
            $html.='</td>';
            $html.='<td>';
            $html.='<a href="/policydocuments/'.$holder->id.'"><button class="btn btn-primary btn-xs" data-id="'.$holder->id.'"><i class="fa fa-file"></i> Documents</button></a>';
            $html.='</td>';
            $html.='<td>';
            $html.='<i class="fa fa-user-plus assign_staff" data-id="'.$holder->id.'" data-bs-toggle="modal"   data-bs-target="#AssignModal"></i>';
            $html.='</td>';
            $html.='<td>'.$holder->assigned_date.'</td>';
            $html.='<td>';
            $html.='<i class="fa fa-edit edit_policyholder" data-id="'.$holder->id.'" data-bs-toggle="modal"   data-bs-target="#EditModal"></i>';
            $html.='</td>';
            $html.='</tr>';
            $i++;
        }
        return Response::json($html);
    }
    public function store(Request $request)
    {
        $executive_id=Auth::user()->id;
        $existingRecord =Tbl_policyholders::where('name',$request->name )->exists();
        if($existingRecord)
        {
            return Response::json([ 'success' => false,'message'=>'Policy Already Exist']);
        }
        $policyholder=new Tbl_policyholders;
        $policyholder->policy_type=$request->policy_type;
        $policyholder->agent_id=$request->agent_id;
        $policyholder->dealer_id=$request->dealer_id;
        $policyholder->name=$request->name;
        $policyholder->vehicle_number=$request->vehicle_number;
        $policyholder->primary_number=$request->primary_number;
        $policyholder->secondary_number=$request->secondary_number;
        $policyholder->expiry_date=$request->expiry_date;
        $policyholder->vehicle_model_id=$request->vehicle_model_id;
        $policyholder->company_id=$request->company_id;
        $policyholder->premium_amount=$request->premium_amount;
        $policyholder->valuation_amount=$request->valuation_amount;
        $policyholder->executive_id =$executive_id;
        $policyholder->status =0;
        $policyholder->payment_mode_id =$request->payment_mode_id;
        $policyholder->referred_id =$request->referred_id;
        $policyholder->buying_type =$request->buying_type;
        $policyholder->broker_name =$request->broker_name;
        $policyholder->total_cost =$request->total_cost;
        $policyholder->provider_id =$request->provider_id;
        $policyholder->created_date=date('Y-m-d');
        $policyholder->note=$request->note;
        $policyholder->assigned_userid=$request->assigned_userid;
        $policyholder->assigned_date=date('Y-m-d');
        $policyholder->save();
        return Response::json([ 'success' => true,'message'=>'Policy Created successfully']);
    }
    public function show(Request $request)
    {
        $policyholder_id=$request->policyholder_id;
        $policyholder=Tbl_policyholders::find($policyholder_id);
        return Response::json($policyholder);
    }
    public function update(Request $request)
    {
        $policyholder_id=$request->policyholder_id;
        $policyholder=Tbl_policyholders::find($policyholder_id);
        $policyholder->name=$request->name;
        $policyholder->vehicle_number=$request->vehicle_number;
        $policyholder->primary_number=$request->primary_number;
        $policyholder->secondary_number=$request->secondary_number;
        $policyholder->expiry_date=$request->expiry_date;
        $policyholder->vehicle_model_id=$request->vehicle_model_id;
        $policyholder->company_id=$request->company_id;
        $policyholder->premium_amount=$request->premium_amount;
        $policyholder->valuation_amount=$request->valuation_amount;
        $policyholder->payment_mode_id =$request->payment_mode_id;
        $policyholder->referred_id =$request->referred_id;
        $policyholder->buying_type =$request->buying_type;
        $policyholder->broker_name =$request->broker_name;
        $policyholder->total_cost =$request->total_cost;
        $policyholder->provider_id =$request->provider_id;
        $policyholder->save();
        return Response::json([ 'success' => true,'message'=>'Policy Updated successfully']);
    }
    public function assign(Request $request)
    {
        $policyholder_id=$request->policyholder_id;
        $policyholder=Tbl_policyholders::find($policyholder_id);
        $policyholder->assigned_userid=$request->assigned_userid;
        $policyholder->assigned_date=date('Y-m-d');
        $policyholder->save();
        return Response::json([ 'success' => true,'message'=>'Policy Assigned successfully']);
    }
}
