<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tbl_policyholders;
use App\Models\Tbl_vehicle_models;
use App\Models\Tbl_companies;
use App\Models\Tbl_payment_modes;
use App\Models\Tbl_agents;
use App\Models\Tbl_dealers;
use App\Models\Tbl_staffs;
use App\Models\Tbl_referred_persons;
use App\Models\Tbl_insurence_providers;
use App\Models\Tbl_policy_categories;
use App\Models\Tbl_vehiclepolicy_renews;
use App\Models\Tbl_payments;
use App\Models\Tbl_coverage_types;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Response;
use Redirect;
class PolicyholderController extends Controller
{
    public function index()
    {
        $vehiclemodels=Tbl_vehicle_models::all();
        $companies=Tbl_companies::all();
        $payment_modes=Tbl_payment_modes::all();
        $agents=Tbl_agents::all();
        $dealers=Tbl_dealers::all();
        $staffs=Tbl_staffs::with('user')->get();
        $referred_persons=Tbl_referred_persons::all();
        $providers=Tbl_insurence_providers::all();
        $coverage_types=Tbl_coverage_types::all();
        return view('admin.policyholders',['vehiclemodels'=>$vehiclemodels,
        'companies'=>$companies,'payment_modes'=>$payment_modes,'agents'=>$agents,
        'dealers'=>$dealers,'staffs'=>$staffs,'referred_persons'=>$referred_persons,'providers'=>$providers,
         'coverage_types'=>$coverage_types]);
    }
    public function list()
    {
        $policyholders=Tbl_policyholders::with('added_executive','vehicle_model','company','agent',
        'prepared_user','dealer','payment_mode','reffered','insurence_provider')->latest('id')->get();
        $html='';
        $i=1;
        foreach($policyholders as $holder)
        {
            $renew_created_by=Tbl_vehiclepolicy_renews::with('added_user')->where('policy_id',$holder->id)->first();
            $added_executive=$holder->added_executive->name??'';
            $vehicle_model=$holder->vehicle_model->model??'';
            $company=$holder->company->company??'';
            $agent=$holder->agent->agent_name??'';
            $dealer=$holder->dealer->dealer_name??'';
            $prepared_by=$holder->prepared_user->name??'';
            $payment_mode=$holder->payment_mode->payment_mode??"";
            $referred_person=$holder->reffered->name??"";
            $created_by=$renew_created_by->added_user->name ?? "";
            $insurence_provider=$holder->insurence_provider->provider_name??"";
            $premium=$holder->premium_amount ?? 0;
            $total_paid_amount=0;
            $payments=Tbl_payments::where('policy_id',$holder->id)->where('policy_cat_id',9)
            ->get();
            foreach($payments as $pay)
            {
                $total_paid_amount+=$pay->paid_amount;
            }
            $balance_amount= $premium-$total_paid_amount ?? 0;
            $pay_status='';
            $html.='<tr>';
            $html.='<td>'.$i.'</td>';
            $html.='<td>'.$agent.'</td>';
            $html.='<td>'.$dealer.'</td>';
            $html.='<td>'.$holder->name.'</td>';
            $html.='<td>'.$holder->vehicle_number.'</td>';
            $html.='<td>'.$holder->primary_number.'</td>';
            $html.='<td>'.$holder->premium_amount.'</td>';
            $html.='<td>'.$holder->customer_premium_amount.'</td>';
            $html.='<td>'.$holder->paid_amount.'</td>';
            $html.='<td>'.$holder->due_amount.'</td>';
            $html.='<td>'.$payment_mode.'</td>';
            $html.='<td>';
            if($total_paid_amount==0)
            {
                $html.='<span class="badge badge-warning mb-2">Not Paid</span>';
            }
            elseif($total_paid_amount!=0 && $premium != $total_paid_amount)
            {
                $html.='<span class="badge badge-danger mb-2">Partial Paid</span>';
            }
            elseif($premium == $total_paid_amount)
            {
                $html.='<span class="badge badge-success">Full Paid</span>';
            }
            $html.='</td>';
            $html.='<td>';
                $html.='<a href="/policypayments/9/'.$holder->id.'"><button class="btn btn-danger btn-xs" data-id="'.$holder->id.'"><i class="fas fa-wallet"></i> Pay Now</button></a>';
            $html.='</td>';
            $html.='<td>';
                $html.='<a href="/purchase_cards/9/'.$holder->id.'"><button class="btn btn-black btn-xs" data-id="'.$holder->id.'"><i class="fa fa-archive"></i>Purchase Card</button></a>';
            $html.='</td>';
            $html.='<td>';
            $html.='<a href="/vehicle_policydocuments/'.$holder->id.'"><button class="btn btn-primary btn-xs" data-id="'.$holder->id.'"><i class="fa fa-file"></i> Documents</button></a>';
            $html.='</td>';
            $html.='<td>';
            $html.='<a href="/vechicle_policyrenews/'.$holder->id.'"><button class="btn btn-primary btn-xs" data-id="'.$holder->id.'"><i class="fa fa-sync"></i> Renew</button></a>';
            $html.='</td>';
            $html.='<td>'.$insurence_provider.'</td>';
            $html.='<td>';
            $html.='<i class="fa fa-user-plus assign_staff" data-id="'.$holder->id.'" data-bs-toggle="modal"   data-bs-target="#AssignModal"></i>';
            $html.='</td>';
            $html.='<td>';
            $html.='<i class="fa fa-edit edit_policyholder" data-id="'.$holder->id.'" data-bs-toggle="modal"   data-bs-target="#EditModal"></i>';
            $html.='</td>';
            $html.='<td>';
            if($holder->policy_mode==1)
            {
                $html.='<span class="badge badge-success">New</span>';
            }
            elseif($holder->policy_mode==2)
            {
                $html.='<span class="badge badge-secondary">Renewal</span>';
            }
            $html.='</td>';
            $html.='<td>'.$holder->secondary_number.'</td>';
            $html.='<td>'.$holder->start_date.'</td>';
            $html.='<td>'.$holder->expiry_date.'</td>';
            $html.='<td>'.$vehicle_model.'</td>';
            $html.='<td>'.$company.'</td>';
            $html.='<td>'.$holder->valuation_amount.'</td>';
            $html.='<td>'.$holder->total_cost.'</td>';
            $html.='<td>'.$added_executive.'</td>';
            $html.='<td>'.$prepared_by.'</td>';
            $html.='<td>'.$referred_person.'</td>';
            $html.='<td>'.$created_by.'</td>';
            $html.='<td>'.$holder->created_date.'</td>';
            $html.='<td>'.$holder->assigned_date.'</td>';
            $html.='</tr>';
            $i++;
        }
        return Response::json($html);
    }
    public function store(Request $request)
    {
        $created_by=Auth::user()->id;
        $existingRecord =Tbl_policyholders::where('name',$request->name )->exists();
        $existVehicleNumber =Tbl_policyholders::where('vehicle_number',$request->vehicle_number )->exists();
        if($existingRecord)
        {
            return Response::json(['success' => false,'message'=>'Policy Already Exist']);
        }
        if($existVehicleNumber)
        {
            return Response::json(['success' => false,'message'=>'Vehicle Number Already Exist']);
        }
        $policyholder=new Tbl_policyholders;
        $policyholder->policy_type=$request->policy_type;
        $policyholder->agent_id=$request->agent_id;
        $policyholder->dealer_id=$request->dealer_id;
        $policyholder->name=$request->name;
        $policyholder->vehicle_number=$request->vehicle_number;
        $policyholder->primary_number=$request->primary_number;
        $policyholder->secondary_number=$request->secondary_number;
        $policyholder->start_date=$request->start_date;
        $policyholder->expiry_date=$request->expiry_date;
        $policyholder->vehicle_model_id=$request->vehicle_model_id;
        $policyholder->company_id=$request->company_id;
        $policyholder->premium_amount=$request->premium_amount;
        $policyholder->customer_premium_amount=$request->customer_premium_amount;
        $policyholder->valuation_amount=$request->valuation_amount;
        $policyholder->sum_insured=$request->sum_insured;
        $policyholder->executive_id =$request->assigned_userid;
        $policyholder->status =$request->status;
        $policyholder->payment_mode_id =$request->payment_mode_id;
        $policyholder->referred_id =$request->referred_id;
        $policyholder->buying_type =$request->buying_type;
        $policyholder->broker_name =$request->broker_name;
        $policyholder->total_cost =$request->total_cost;
        $policyholder->provider_id =$request->provider_id;
        $policyholder->created_date=date('Y-m-d H:i:s');
        $policyholder->created_by=$created_by;
        $policyholder->note=$request->note;
        $policyholder->policy_mode=$request->policy_mode;
        $policyholder->assigned_userid=$request->assigned_userid;
        $policyholder->assigned_date=date('Y-m-d');
        $policyholder->prepared_user_id=$request->prepared_user_id;
        $policyholder->prepared_date=date('Y-m-d');
        $policyholder->coverage_type_id=$request->coverage_type_id;
        if($policyholder->save())
        {
            $renew=new Tbl_vehiclepolicy_renews;
            $renew->policy_category_id=9;
            $renew->policy_id=$policyholder->id;
            $renew->premium_amount=$request->premium_amount;
            $renew->customer_premium=$request->customer_premium_amount;
            $renew->valuation_amount=$request->valuation_amount;
            $renew->total_cost=$request->total_cost;
            $renew->renew_date=$request->start_date;
            $renew->expiry_date=$request->expiry_date;
            $renew->payment_mode_id=$request->payment_mode_id;
            $renew->created_date=date('Y-m-d');
            $renew->created_by=$created_by;
            $renew->save();
        }
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
        $edited_by=Auth::user()->id;
        $policyholder_id=$request->policyholder_id;
        $existingRecord =Tbl_policyholders::where('name',$request->name )->where('id','!=',$policyholder_id)->exists();
        $existVehicleNumber =Tbl_policyholders::where('vehicle_number',$request->vehicle_number )->where('id','!=',$policyholder_id)->exists();
        if($existingRecord)
        {
            return Response::json(['success' => false,'message'=>'Policy Name Already Updated']);
        }
        if($existVehicleNumber)
        {
            return Response::json(['success' => false,'message'=>'Vehicle Number Already Updated']);
        }
        $policyholder=Tbl_policyholders::find($policyholder_id);
        $policyholder->name=$request->name;
        $policyholder->vehicle_number=$request->vehicle_number;
        $policyholder->primary_number=$request->primary_number;
        $policyholder->secondary_number=$request->secondary_number;
        $policyholder->start_date=$request->start_date;
        $policyholder->expiry_date=$request->expiry_date;
        $policyholder->vehicle_model_id=$request->vehicle_model_id;
        $policyholder->company_id=$request->company_id;
        $policyholder->premium_amount=$request->premium_amount;
        $policyholder->customer_premium_amount=$request->customer_premium_amount;
        $policyholder->valuation_amount=$request->valuation_amount;
        $policyholder->sum_insured=$request->sum_insured;
        $policyholder->payment_mode_id =$request->payment_mode_id;
        $policyholder->referred_id =$request->referred_id;
        $policyholder->buying_type =$request->buying_type;
        $policyholder->broker_name =$request->broker_name;
        $policyholder->total_cost =$request->total_cost;
        $policyholder->provider_id =$request->provider_id;
        $policyholder->coverage_type_id=$request->coverage_type_id;
        $policyholder->policy_mode=$request->policy_mode;
        $policyholder->edited_by=$edited_by;
        $policyholder->edited_date=date('Y-m-d H:i:s');
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
