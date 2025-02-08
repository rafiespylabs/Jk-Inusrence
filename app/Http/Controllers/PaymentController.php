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
use App\Models\Tbl_policy_categories;
use App\Models\Tbl_healthpolicy;
use App\Models\Tbl_other_policies;
use Response;
use Redirect;
class PaymentController extends Controller
{
    public function index()
    {
        $payment_modes=Tbl_payment_modes::all();
        $insurence_providers=Tbl_insurence_providers::all();
        $cards=Tbl_cards::all();
        $policy_categories=Tbl_policy_categories::all();
        return view('admin.payments',['payment_modes'=>$payment_modes,'cards'=>$cards,'insurence_providers'=>$insurence_providers,
        'policy_categories'=>$policy_categories]);
    }
    public function list(Request $request)
    {
        $policy_id=$request->policy_id;
        $policy_cat_id=$request->policy_cat_id;
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
        $balance_amount=0;
        $total_premium=0;
        foreach($payments as $payment)
        {
            $added_user=$payment->added_user->name??'';
            $holder_name=$payment->card->holder_name ?? '';
            $insurence_provider=$payment->insurence_provider->provider_name ??'';
            $policy_category=$payment->policy_category->policy_category ??"";
            $policy='';
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
            $policy_name=$policy->name??"";
            $premium_amount=$policy->premium_amount ?? 0;
            $pay_type='';
            if($payment->payment_type==1)
            {
                $pay_type='Card';
            }
            elseif($payment->payment_type==2)
            {
                $pay_type='Company Direct';
            }
            $html.='<tr>';
            $html.='<td>'.$i.'</td>';
            $html.='<td>'.$policy_category.'</td>';
            $html.='<td>'.$policy_name.'</td>';
            $html.='<td>'.$pay_type.'</td>';
            $html.='<td>'.$holder_name.'</td>';
            $html.='<td>'.$insurence_provider.'</td>';
            $html.='<td>'.$payment->paid_amount.'</td>';
            $total_premium+=$premium_amount;
            $total_paid_amount+=$payment->paid_amount;
            $html.='<td>'.$payment->payment_mode->payment_mode.'</td>';
            $html.='<td>'.$payment->added_date.'</td>';
            $html.='<td>'.$added_user.'</td>';
            $html.='<td>';
            $html.='<i class="fa fa-edit edit_payment" data-id="'.$payment->id.'" data-bs-toggle="modal"   data-bs-target="#EditModal"></i>';
            $html.='</td>';
            $html.='</tr>';
            $i++;
        }
        $balance_amount=$total_premium-$total_paid_amount;
        return Response::json(['data'=>$html,'total_paid_amount'=> $total_paid_amount,'balance_amount'=>$balance_amount,'total_premium'=>$total_premium]);
    }
    public function store(Request $request)
    {
        $added_by=Auth::user()->id;
        $payment=new Tbl_payments;
        $payment->policy_cat_id=$request->policy_category_id;
        $payment->policy_id=$request->policy_id;
        $payment->payment_type=$request->payment_type;
        $payment->card_id=$request->card_id;
        $payment->provide_id=$request->provide_id;
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
        $payment_id=$request->payment_id;
        $payment=Tbl_payments::find($payment_id);
        return Response::json($payment);
    }
    public function update(Request $request)
    {
        $payment_id=$request->payment_id;
        $payment=Tbl_payments::find($payment_id);
        $payment->payment_type=$request->payment_type;
        $payment->provide_id=$request->provide_id;
        $payment->card_id=$request->card_id;
        $payment->payment_mode_id=$request->payment_mode_id;
        $payment->paid_amount=$request->paid_amount;
        $payment->remarks=$request->remarks;
        $payment->save();
        return Response::json([ 'success' => true]);
    }
    public function getPolicyByCategory(Request $request)
    {
        $policy_category_id=$request->policy_category_id;
        $policyData='';
        if($policy_category_id==1) 
        {
            $policyData = Tbl_healthpolicy::latest()->get(); 
        }
        elseif($policy_category_id==9)
        {
            $policyData = Tbl_policyholders::get(); 
        }
        else
        {
            $policyData = Tbl_other_policies::where('policy_category_id',$policy_category_id)->latest()->get(); 
        }
        return Response::json([ 'success' => true,'policies'=>$policyData]);
    }
    public function getPolicyDetails(Request $request)
    {
        $policy_cat_id=$request->policy_cat_id;
        $policy_id=$request->policy_id;
        $PolicyPaidamount=Tbl_payments::where('policy_cat_id',$policy_cat_id)
            ->where('policy_id',$policy_id)->sum('paid_amount');
        if($policy_cat_id==1) 
        {
            $policyData = Tbl_healthpolicy::find($policy_id); 
            $due_amount=($policyData->premium_amount-$PolicyPaidamount);
        }
        elseif($policy_cat_id==9)
        {
            $policyData = Tbl_policyholders::find($policy_id); 
            $due_amount=($policyData->premium_amount-$PolicyPaidamount);
        }
        else
        {
            $policyData = Tbl_other_policies::where('policy_category_id',$policy_cat_id)->find($policy_id); 
            $due_amount=($policyData->premium_amount-$PolicyPaidamount);
        }
        return Response::json([ 'success' => true,'policies'=>$policyData,'due_amount'=>$due_amount]);
    }
}
