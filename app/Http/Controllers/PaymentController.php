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
use Response;
use Redirect;
class PaymentController extends Controller
{
    public function index($policy_id)
    {
        $policy_holder=Tbl_policyholders::with('payments')->find($policy_id);
        $payment_modes=Tbl_payment_modes::all();
        $insurence_providers=Tbl_insurence_providers::all();
        $cards=Tbl_cards::all();
        return view('admin.payments',['policy_id'=>$policy_id,'policy_holder'=>$policy_holder,
        'payment_modes'=>$payment_modes,'cards'=>$cards,'insurence_providers'=>$insurence_providers]);
    }
    public function list(Request $request)
    {
        $policy_id=$request->policy_id;
        $payments=Tbl_payments::with('added_user','payment_mode','card','insurence_provider')->where('policy_id',$policy_id)->get();
        $html='';
        $i=1;
        foreach($payments as $payment)
        {
            $added_user=$payment->added_user->name??'';
            $holder_name=$payment->card->holder_name ?? '';
            $insurence_provider=$payment->insurence_provider->provider_name ??'';
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
            $html.='<td>'.$pay_type.'</td>';
            $html.='<td>'.$holder_name.'</td>';
            $html.='<td>'.$insurence_provider.'</td>';
            $html.='<td>'.$payment->paid_amount.'</td>';
            $html.='<td>'.$payment->payment_mode->payment_mode.'</td>';
            $html.='<td>'.$payment->added_date.'</td>';
            $html.='<td>'.$added_user.'</td>';
            $html.='<td>';
            $html.='<i class="fa fa-edit edit_payment" data-id="'.$payment->id.'" data-bs-toggle="modal"   data-bs-target="#EditModal"></i>';
            $html.='</td>';
            $html.='</tr>';
            $i++;
        }
        return Response::json($html);
    }
    public function store(Request $request)
    {
        $added_by=Auth::user()->id;
        $payment=new Tbl_payments;
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
}
