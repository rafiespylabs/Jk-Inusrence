<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\Tbl_policyholders;
use App\Models\Tbl_payments;
use App\Models\Tbl_payment_modes;
use App\Models\Tbl_insurence_providers;
use App\Models\Tbl_cards;
use App\Models\Tbl_healthpolicy;
use App\Models\Tbl_purchase_cards;
use App\Models\Tbl_other_policies;
use Response;
use Redirect;
class PolicyPaymentController extends Controller
{
    public function index($policy_cat_id,$policy_id)
    {
        $payment_modes=Tbl_payment_modes::all();
        $insurence_providers=Tbl_insurence_providers::all();
        $cards=Tbl_cards::all();
        $purchase_cards=Tbl_purchase_cards::with(['added_user','card','insurence_provider'])
        ->where('policy_cat_id',$policy_cat_id)->where('policy_id',$policy_id)->get();
        $policy_payments=Tbl_payments::where('policy_cat_id',$policy_cat_id)->where('policy_id',$policy_id)->get();
        return view('admin.policypayments',['payment_modes'=>$payment_modes,'cards'=>$cards,
        'insurence_providers'=>$insurence_providers,'policy_payments'=>$policy_payments,
        'policy_id'=>$policy_id,'policy_cat_id'=>$policy_cat_id,'purchase_cards'=>$purchase_cards]);
    }
    public function list(Request $request)
    {
        $policy_id=$request->policy_id;
        $policy_cat_id=$request->policy_cat_id;
        if($policy_cat_id==1)
        {
            $policy=Tbl_healthpolicy::find($policy_id);
        }
        elseif($policy_cat_id==9)
        {
            $policy=Tbl_policyholders::find($policy_id);
        }
        else
        {
            $policy=Tbl_other_policies::find($policy_id);
        }
        $payments=Tbl_payments::query()
        ->when($policy_id, function ($query) use ($policy_id) {
            $query->where('policy_id',$policy_id); 
        })
        ->when($policy_cat_id, function ($query) use ($policy_cat_id) {
            $query->where('policy_cat_id',$policy_cat_id); 
        })
        ->with('added_user','payment_mode','card','insurence_provider')->get();
        $html='';
        $i=1;
        $total_paid_amount=0;
        foreach($payments as $payment)
        {
            $added_user=$payment->added_user->name??'';
            $policy_category=$payment->policy_category->policy_category ??"";
            $policy_name=$policy->name??"";
            $premium_amount=$policy->premium_amount ?? 0;
            $html.='<tr>';
            $html.='<td>'.$i.'</td>';
            $html.='<td>'.$payment->payment_mode->payment_mode.'</td>';
            $html.='<td>'.$payment->paid_amount.'</td>';
            $total_paid_amount+=$payment->paid_amount;
            $html.='<td>'.$payment->added_date.'</td>';
            $html.='<td>'.$added_user.'</td>';
            $html.='<td>';
            $html.='<i class="fa fa-edit edit_policypayment" data-id="'.$payment->id.'" data-bs-toggle="modal"   data-bs-target="#EditModal"></i>';
            $html.='</td>';
            $html.='</tr>';
            $i++;
        }
        $balance_amount=$policy->due_amount;
        $policy_name=$policy->name;
        $policy_phone_number=$policy->primary_number;
        $provider_name=$policy->insurence_provider->provider_name ?? '';
        $valuation_amount=$policy->valuation_amount ?? '';
        $total_cost=$policy->total_cost ?? '';
        return Response::json(['data'=>$html,'total_paid_amount'=> $total_paid_amount,'balance_amount'=>$balance_amount,
        'total_cust_premium'=>$policy->customer_premium_amount,'total_premium'=>$policy->premium_amount,
        'policy_name'=>$policy_name,'policy_phone_number'=>$policy_phone_number,
        'provider_name'=>$provider_name,'valuation_amount'=>$valuation_amount,'total_cost'=>$total_cost,
        'policy_cat_id'=>$policy_cat_id]);
    }
    public function store(Request $request)
    {
        $added_by=Auth::user()->id;
        $policy_cat_id=$request->policy_cat_id;
        $policy_id=$request->policy_id;
        $total_paid=0;
        if($policy_cat_id==1)
        {
            $policy=Tbl_healthpolicy::find($policy_id);
        }
        elseif($policy_cat_id==9)
        {
            $policy=Tbl_policyholders::find($policy_id);
        }
        else
        {
            $policy=Tbl_other_policies::find($policy_id);
        }
        $total_paid_amount=0;
        $balance_amount=0;
        $premium_amount=$policy->premium_amount ?? 0;

        $payments=Tbl_payments::where('policy_id',$policy_id)->where('policy_cat_id',$policy_cat_id)
        ->get();
        foreach($payments as $pay)
        {
            $total_paid_amount+=$pay->paid_amount;
        }
        $total_paid=$total_paid_amount+floatval($request->paid_amount);
        if($policy_cat_id==9)
        {
            $total_cost=$policy->total_cost ?? 0;
            $balance_amount= $total_cost-$total_paid;
            $policy->paid_amount=$total_paid;
            $policy->due_amount=$balance_amount;
            if($total_paid > $total_cost  )
            {
                return Response::json([ 'success' => false,'message'=>'Total Paid Is Exceeds The Total Cost']);
            }
        }
        else
        {
            $balance_amount=$premium_amount-$total_paid;
            $policy->paid_amount=$total_paid;
            $policy->due_amount=$balance_amount;
            if($total_paid > $premium_amount  )
            {
                return Response::json([ 'success' => false,'message'=>'Total Paid Is Exceeds The Premium']);
            }
        }
        $policy->save();
        $payment=new Tbl_payments;
        $payment->policy_cat_id=$policy_cat_id;
        $payment->policy_id=$request->policy_id;
        $payment->payment_mode_id=$request->payment_mode_id;
        $payment->paid_amount=$request->paid_amount;
        $payment->added_date=date('Y-m-d');
        $payment->added_by=$added_by;
        $payment->remarks=$request->remarks;
        $payment->save();
        return Response::json([ 'success' => true]);
    }
    public function show(Request $request)
    {
        $policy_pay_id=$request->policy_pay_id;
        $policypayment=Tbl_payments::find($policy_pay_id);
        return Response::json($policypayment);
    }
    public function update(Request $request)
    {
        $policy_pay_id=$request->policy_pay_id;
        $payment=Tbl_payments::find($policy_pay_id);
        $payment->payment_mode_id=$request->payment_mode_id;
        $payment->paid_amount=$request->paid_amount;
        $payment->remarks=$request->remarks;
        if($payment->save())
        {
            if($payment->policy_cat_id==1)
            {
                $policy=Tbl_healthpolicy::find($payment->policy_id);
            }
            elseif($payment->policy_cat_id==9)
            {
                $policy=Tbl_policyholders::find($payment->policy_id);
            }
            else
            {
                $policy=Tbl_other_policies::find($payment->policy_id);
            }
            $total_paid_amount=0;
            $balance_amount=0;
            $premium_amount=$policy->premium_amount ?? 0;
            $payments=Tbl_payments::where('policy_id',$payment->policy_id)->where('policy_cat_id',$payment->policy_cat_id)
            ->get();
            foreach($payments as $pay)
            {
                $total_paid_amount+=$pay->paid_amount;
            }
            $balance_amount=$premium_amount-$total_paid_amount;
            $policy->paid_amount=$total_paid_amount;
            $policy->due_amount=$balance_amount;
            $policy->save();
        }
        return Response::json([ 'success' => true]);
    }
}
