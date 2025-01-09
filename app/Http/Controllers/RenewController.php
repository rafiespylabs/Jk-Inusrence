<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\Tbl_policyholders;
use App\Models\Tbl_renews;
use App\Models\Tbl_payment_modes;
use App\Models\Tbl_vehiclemodels;
use App\Models\Tbl_policy_categories;
use App\Models\Tbl_companies;
use App\Models\Tbl_other_policies;
use App\Models\Tbl_healthpolicy;
use Response;
use Redirect;
class RenewController extends Controller
{
    public function index()
    {
        $policy_holders=Tbl_policyholders::all();
        $payment_modes=Tbl_payment_modes::all();
        $vehiclemodels=Tbl_vehiclemodels::all();
        $policy_categories=Tbl_policy_categories::all();
        $companies=Tbl_companies::all();
       return view('admin.renews',['payment_modes'=>$payment_modes,
       'policy_holders'=>$policy_holders,'vehiclemodels'=>$vehiclemodels,
       'companies'=>$companies,'policy_categories'=>$policy_categories]);
    }
    public function list()
    {
        $renews=Tbl_renews::with('added_user','payment_mode','policy')->get();
        $html='';
        $i=1;
        foreach($renews as $renew)
        {
            $added_user=$renew->added_user->name??'';
            $html.='<tr>';
            $html.='<td>'.$i.'</td>';
            $html.='<td>'.$renew->policy->name.'</td>';
            $html.='<td>'.$renew->policy->vehicle_number.'</td>';
            $html.='<td>'.$renew->premium_amount.'</td>';
            $html.='<td>'.$renew->valuation_amount.'</td>';
            $html.='<td>'.$renew->total_cost.'</td>';
            $html.='<td>'.$renew->renew_date.'</td>';
            $html.='<td>'.$renew->expiry_date.'</td>';
            $html.='<td>'.$renew->payment_mode->payment_mode.'</td>';
            $html.='<td>'.$renew->created_date.'</td>';
            $html.='<td>'.$added_user.'</td>';
            $html.='<td>';
            // $html.='<i class="fa fa-edit edit_renewpolicy" data-id="'.$renew->id.'" data-bs-toggle="modal"   data-bs-target="#EditModal"></i>';
            $html.='</td>';
            $html.='</tr>';
            $i++;
        }
        return Response::json($html);
    }
    public function store(Request $request)
    {
        $created_by=Auth::user()->id;
        $policy_id=$request->policy_id;
        $policyholder=Tbl_policyholders::find($policy_id);
        $policyholder->name=$request->name;
        $policyholder->vehicle_number=$request->vehicle_number;
        $policyholder->primary_number=$request->primary_number;
        $policyholder->vehicle_model_id=$request->vehicle_model_id;
        $policyholder->company_id=$request->company_id;
        $policyholder->premium_amount=$request->premium_amount;
        $policyholder->valuation_amount=$request->valuation_amount;
        $policyholder->total_cost=$request->total_cost;
        $policyholder->payment_mode_id =$request->payment_mode_id;
        $policyholder->save();
        $renew=new Tbl_renews;
        $renew->policy_id=$request->policy_id;
        $renew->premium_amount=$request->premium_amount;
        $renew->valuation_amount=$request->valuation_amount;
        $renew->total_cost=$request->total_cost;
        $renew->renew_date=$request->renew_date;
        $renew->expiry_date=$request->expiry_date;
        $renew->payment_mode_id=$request->payment_mode_id;
        $renew->created_date=$request->created_date;
        $renew->created_by=$created_by;
        $renew->save();
        return Response::json([ 'success' => true]);
    }
    public function show(Request $request)
    {
       $renew_id=$request->renew_id;
       $renew=Tbl_renews::find($renew_id);
       return Response::json($renew);
    }
    public function update(Request $request)
    {
        $renew_id=$request->renew_id;
        $renew=Tbl_renews::find($renew_id);
        $renew->premium_amount=$request->premium_amount;
        $renew->renew_date=$request->renew_date;
        $renew->expiry_date=$request->expiry_date;
        $renew->payment_mode_id=$request->payment_mode_id;
        $renew->created_date=$request->created_date;
        $renew->save();
        return Response::json([ 'success' => true]);
    }
    public function getPolicies(Request $request)
    {
        $policy_cat_id=$request->policy_cat_id;
        $policies='';
       if($policy_cat_id==1) 
       {
            $policies =Tbl_healthpolicy::with(['executive', 'referred', 'provider', 'company','policy_category'])->get();
       }
       else
       {
            $policies =Tbl_other_policies::with(['policy_category','executive', 'referred', 'provider'])
            ->where('policy_category_id',$policy_cat_id)
            ->get();
       }
       return Response::json([ 'success' => true,'policies'=>$policies]);
    }
}
