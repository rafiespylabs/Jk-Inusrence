<?php
namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tbl_cards;
use App\Models\Tbl_creditcard_payments;
use App\Models\Tbl_insurence_providers;
use App\Models\User;
use Carbon\Carbon;
use Response;
use Redirect;
class CreditCardPayController extends Controller
{
    public function index()
    {
        $cards=Tbl_cards::all();
        $provider_cards=Tbl_insurence_providers::all();
        return view('admin.creditcard_payment',['cards'=>$cards,'provider_cards'=>$provider_cards]);
    }
    public function list(Request $request)
    {
        $limit = $request->input('length', 10); 
        $start = $request->input('start', 0);   
        $searchValue = $request->input('search.value');
        $query =Tbl_creditcard_payments::query();
        if (!empty($searchValue)) {
            $query->where('credit', 'like', '%' . $searchValue . '%')
                ->orWhere('due_date', 'like', '%' . $searchValue . '%')
                ->orWhere('credited_date', 'like', '%' . $searchValue . '%')
                ->orWhereHas('card', function ($q) use ($searchValue) {
                    $q->where('holder_name', 'like', '%' . $searchValue . '%');
                });
        }
        $totalRecords = $query->count();
        $creditcard_payments= $query->skip($start)
                    ->take($limit)
                    ->with(['added_user','card'])
                    ->latest('id') 
                    ->get();
        $data = [];
        $slNo = $start + 1;
        foreach ($creditcard_payments as $credit) {
            $created_user =$credit->added_user->name ?? '';
            $created_date = $credit->created_date
                ? Carbon::parse($credit->created_date)->format('d/m/Y') : '';
            $credited_date = $credit->credited_date
                ? Carbon::parse($credit->credited_date)->format('d/m/Y') : '';
            $due_date = $credit->due_date
                ? Carbon::parse($credit->due_date)->format('d/m/Y') : '';
            $data[] = [
                'sl_no' => $slNo++,
                'card_name' =>  $credit->card->holder_name??"N/A",
                'credit' =>$credit->credit,
                'credited_date' =>$credited_date ,
                'provider_card'=>$credit->provider->card_name ??"N/A",
                'purpose' =>$credit->purpose ,
                'due_date' =>$due_date ,
                'created_by' =>  $created_user,
                'created_date' => $created_date,
                'action' => '<i class="fa fa-edit edit_creditcard_pay" data-id="' . $credit->id . '" data-rowid="'. $credit->id . '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>
                 &nbsp; &nbsp;<a href="/credit_repayment/'.$credit->id .'" class="btn btn-secondary btn-border btn-xs">Repayment</a>',
                'id' => $credit->id
            ];
        }
        return response()->json([
            'draw' => intval($request->input('draw')), 
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $searchValue ? $query->count() : $totalRecords,
            'data' => $data,
        ]);
    }
    public function store(Request $request)
    {
        $created_by=Auth::user()->id;
        $card_id=$request->card_id;
        $creditcard_pay=new Tbl_creditcard_payments;
        $creditcard_pay->card_id=$card_id;
        $creditcard_pay->credit=$request->credit;
        $creditcard_pay->credited_date=$request->credited_date;
        $creditcard_pay->provider_id=$request->provider_id;
        $creditcard_pay->purpose=$request->purpose;
        $creditcard_pay->due_date=$request->due_date;
        $creditcard_pay->created_by=$created_by;
        $creditcard_pay->created_date=date('Y-m-d');
        if($creditcard_pay->save())
        {
            $card=Tbl_cards::find($card_id);
            $card->current_amount=($card->current_amount+$request->credit);
            $card->save();

            $provider_card=Tbl_insurence_providers::find($request->provider_id);
            $provider_card->current_amount=($provider_card->current_amount+$request->credit);
            $provider_card->save();
        }
        $creditcard_pay->card_name=$card->holder_name;
        $created_user=User::find($created_by);
        $creditcard_pay->created_user=$created_user->name ?? "N/A";
        return Response::json([ 'success' => true,
        'message'=>'Credit Card Pay Added successfully',
        'data' => [
                    'sl_no' => Tbl_creditcard_payments::count(),
                    'card_name' => $creditcard_pay->card_name,
                    'credit' => $creditcard_pay->credit,
                    'credited_date'=> $creditcard_pay->credited_date,
                    'purpose'=> $creditcard_pay->purpose,
                    'due_date'=> $creditcard_pay->due_date,
                    'created_by'=> $creditcard_pay->created_user,
                    'created_date'=> $creditcard_pay->created_date,
                    'id' => $creditcard_pay->id,
                ],]);
    }
    public function show(Request $request)
    {
        $creditcard_payid=$request->creditcard_payid;
        $creditcard_pay=Tbl_creditcard_payments::find($creditcard_payid);
        return Response::json($creditcard_pay);
    }
    public function update(Request $request)
    {
        $edited_by=Auth::user()->id;
        $creditcard_payid=$request->creditcard_payid;
        $creditcard_pay=Tbl_creditcard_payments::find($creditcard_payid);
        $creditcard_pay->card_id=$request->card_id;
        $creditcard_pay->credit=$request->credit;
        $creditcard_pay->credited_date=$request->credited_date;
        $creditcard_pay->purpose=$request->purpose;
        $creditcard_pay->due_date=$request->due_date;
        $creditcard_pay->edited_by=$edited_by;
        $creditcard_pay->edited_date=date('Y-m-d H:i:s');
        $creditcard_pay->save();

        $card=Tbl_cards::find($request->card_id);
        $creditcard_pay->card_name=$card->holder_name;
        $created_user=User::find($creditcard_pay->created_by);
        $creditcard_pay->created_user=$created_user->name ?? "N/A";

        return Response::json([ 'success' => true,
        'message'=>'Credit Card Pay Added successfully',
        'data' => [
                    'card_name' => $creditcard_pay->card_name,
                    'credit' => $creditcard_pay->credit,
                    'credited_date'=> $creditcard_pay->credited_date,
                    'purpose'=> $creditcard_pay->purpose,
                    'due_date'=> $creditcard_pay->due_date,
                    'created_by'=> $creditcard_pay->created_user,
                    'created_date'=> $creditcard_pay->created_date,
                    'id' => $creditcard_pay->id,
                ],]);
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
