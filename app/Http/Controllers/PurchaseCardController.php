<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\Tbl_payments;
use App\Models\Tbl_payment_modes;
use App\Models\Tbl_insurence_providers;
use App\Models\Tbl_purchase_cards;
use App\Models\Tbl_cards;
use Response;
use Redirect;
use Carbon\Carbon;
class PurchaseCardController extends Controller
{
    public function index($policy_cat_id,$policy_id)
    {
        $payment_modes=Tbl_payment_modes::all();
        $insurence_providers=Tbl_insurence_providers::all();
        $cards=Tbl_cards::all();
        return view('admin.purchase_cards',['payment_modes'=>$payment_modes,'cards'=>$cards,
        'insurence_providers'=>$insurence_providers,'policy_cat_id'=>$policy_cat_id,
        'policy_id'=>$policy_id]);
    }
    public function list(Request $request)
    {
        $limit = $request->input('length', 10); 
        $start = $request->input('start', 0);   
        $searchValue = $request->input('search.value');
        $policy_cat_id = $request->input('policy_cat_id');
        $policy_id = $request->input('policy_id');
        $query =Tbl_purchase_cards::query();
        if (!empty($searchValue)) {
            $query->where('purchase_type', 'like', '%' . $searchValue . '%')
                ->orWhereHas('card', function ($q) use ($searchValue) {
                    $q->where('holder_name', 'like', '%' . $searchValue . '%');
                });
        }
        $query->where('policy_cat_id', $policy_cat_id);
        $query->where('policy_id', $policy_id);
        $totalRecords = $query->count();
        $purchase_cards= $query->skip($start)
                    ->take($limit)
                    ->with(['added_user','card','insurence_provider'])
                    ->latest('id') 
                    ->get();
        $data = [];
        $slNo = $start + 1;
        foreach ($purchase_cards as $pur_card) {
            $added_user =$pur_card->added_user->name ?? '';
            $added_date = $pur_card->added_date
                ? Carbon::parse($pur_card->added_date)->format('d/m/Y') : '';
            $data[] = [
                'sl_no' => $slNo++,
                'card' =>$pur_card->card->holder_name ?? "N/A",
                'provider' =>$pur_card->insurence_provider->provider_name ?? "N/A",
                'taken_amount' => $pur_card->taken_amount,
                'balance_amount' => $pur_card->balance_amount,
                'added_by' =>  $added_user,
                'added_date' => $added_date,
                'action'=>'',
                // 'action' => '<i class="fa fa-edit edit_purchase_card" data-id="' . $pur_card->id . '" data-rowid="'. $pur_card->id . '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>',
                'id' => $pur_card->id
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
        $currentUserId = Auth::id();
        $validatedData = $request->validate([
            'purchase_type' => 'required|array',
            'provider_id' => 'required|array',
            'card_id' => 'required|array',
            'taken_amount' => 'required|array',            
            'balance_amount' => 'required|array', 
        ]);
        $policy_cat_id=$request->policy_cat_id;
        $policy_id=$request->policy_id;
        $purchase_type=$validatedData['purchase_type'];
        $provider_id=$validatedData['provider_id'];
        $card_id=$validatedData['card_id'];
        $taken_amount=$validatedData['taken_amount'];
        $balance_amount=$validatedData['balance_amount'];
        $added_by=Auth::user()->id;
        $added_user=Auth::user()->name;
        foreach($purchase_type as $key=>$type)
        {
            $purchase_card=new Tbl_purchase_cards;
            $purchase_card->policy_cat_id=$policy_cat_id;
            $purchase_card->policy_id=$policy_id;
            $purchase_card->purchase_type=$type;
            $purchase_card->provider_id=$provider_id[$key];
            $purchase_card->card_id=$card_id[$key];
            $purchase_card->taken_amount=$taken_amount[$key];
            $purchase_card->balance_amount=$balance_amount[$key];
            $purchase_card->added_by=$added_by;
            $purchase_card->added_date=date('Y-m-d H:i:s');
            $purchase_card->save();  
            

            $purchase_card->added_user=$added_user;
            if($provider_id[$key])
            {
                $provider=Tbl_insurence_providers::find($provider_id[$key]);
                $purchase_card->provider=$provider->provider_name;
            }
            if($card_id[$key])
            {
                $card=Tbl_cards::find($card_id[$key]);
                if($card->current_amount==0)
                {
                    return Response::json([ 'success' => false,'message'=>'Your Card Balance is 0 Do Not Take This Amount']);
                }
                $card->current_amount=($card->current_amount-$taken_amount[$key]);
                $card->save();
            
                $purchase_card->card=$card->holder_name;
            }
            $purchase_card->sl_no=Tbl_purchase_cards::count();
        }
        return Response::json([ 'success' => true,'data'=>$purchase_card]);
    }
}
