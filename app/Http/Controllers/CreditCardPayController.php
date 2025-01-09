<?php
namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tbl_cards;
use App\Models\Tbl_creditcard_payments;
use Response;
use Redirect;
class CreditCardPayController extends Controller
{
    public function index()
    {
        $cards=Tbl_cards::all();
        return view('admin.creditcard_payment',['cards'=>$cards]);
    }
    public function list()
    {
        $creditcard_payments=Tbl_creditcard_payments::with('added_user','card')->get();
        $html='';
        $i=1;
        foreach($creditcard_payments as $credit)
        {
            $added_user=$credit->added_user->name??'';
            $html.='<tr>';
            $html.='<td>'.$i.'</td>';
            $html.='<td>'.$credit->name.'</td>';
            $html.='<td>'.$credit->limit.'</td>';
            $html.='<td>'.$credit->card->holder_name.'</td>';
            $html.='<td>'.$credit->credit.'</td>';
            $html.='<td>'.$credit->purpose.'</td>';
            $html.='<td>'.$credit->due_date.'</td>';
            if($credit->status==0)
            {
                $html.='<td><button class="btn btn-warning btn-xs change_status"  data-id="'.$credit->id.'" data-bs-toggle="modal"  data-bs-target="#StatusModal">Pending</button></td>';
            }
            elseif($credit->status==1)
            {
                $html.='<td><button class="btn btn-success btn-xs">Paid</button></td>';
            }
            else
            {
                $html.='<td></td>';
            }
            $html.='<td>'.$added_user.'</td>';
            $html.='<td>'.$credit->created_date.'</td>';
            $html.='<td>';
            $html.='<i class="fa fa-edit edit_creditcard_pay" data-id="'.$credit->id.'" data-bs-toggle="modal"   data-bs-target="#EditModal"></i>';
            $html.='</td>';
            $html.='</tr>';
            $i++;
        }
        return Response::json($html);
    }
    public function store(Request $request)
    {
        $created_by=Auth::user()->id;
        $creditcard_pay=new Tbl_creditcard_payments;
        $creditcard_pay->name=$request->name;
        $creditcard_pay->limit=$request->limit;
        $creditcard_pay->card_id=$request->card_id;
        $creditcard_pay->credit=$request->credit;
        $creditcard_pay->purpose=$request->purpose;
        $creditcard_pay->due_date=$request->due_date;
        $creditcard_pay->created_by=$created_by;
        $creditcard_pay->created_date=date('Y-m-d');
        $creditcard_pay->save();
        return Response::json([ 'success' => true,'message'=>'Credit Card Pay Added successfully']);
    }
    public function show(Request $request)
    {
        $creditcard_payid=$request->creditcard_payid;
        $creditcard_pay=Tbl_creditcard_payments::find($creditcard_payid);
        return Response::json($creditcard_pay);
    }
    public function update(Request $request)
    {
        $creditcard_payid=$request->creditcard_payid;
        $creditcard_pay=Tbl_creditcard_payments::find($creditcard_payid);
        $creditcard_pay->name=$request->name;
        $creditcard_pay->limit=$request->limit;
        $creditcard_pay->card_id=$request->card_id;
        $creditcard_pay->credit=$request->credit;
        $creditcard_pay->purpose=$request->purpose;
        $creditcard_pay->due_date=$request->due_date;
        $creditcard_pay->save();
        return Response::json([ 'success' => true,'message'=>'Credit Card Pay Updated successfully']);
    }
    public function statusupdate(Request $request)
    {
        $creditcard_statusid=$request->creditcard_statusid;
        $creditcard_pay=Tbl_creditcard_payments::find($creditcard_statusid);  
        $creditcard_pay->status=$request->status;
        $creditcard_pay->changed_date=date('Y-m-d');
        $creditcard_pay->save();
        return Response::json([ 'success' => true,'message'=>'Credit Card Pay Staus Changed successfully']);
    }
}
