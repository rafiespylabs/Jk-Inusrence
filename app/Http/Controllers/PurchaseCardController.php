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
use App\Models\Tbl_healthpolicy;
use App\Models\Tbl_other_policies;
use App\Models\Tbl_policyholders;
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
        if($policy_cat_id==1)
        {
            $policy=Tbl_healthpolicy::find($policy_id);
        }
        elseif($policy_cat_id==9)
        {
            $policy=Tbl_policyholders::with('insurence_provider')->find($policy_id);
        }
        else
        {
            $policy=Tbl_other_policies::find($policy_id);
        }
        $total_taken_amount=0;
        $purchase_cards=Tbl_purchase_cards::where('policy_cat_id', $policy_cat_id)->where('policy_id', $policy_id)->get();
        foreach($purchase_cards as $pur_card)
        {
            $total_taken_amount+=$pur_card->taken_amount;
        }
        $due_premium=$policy->premium_amount-$total_taken_amount;
        $policy_name=$policy->name;
        $policy_phone_number=$policy->primary_number;
        $provider_name=$policy->insurence_provider->provider_name ?? '';
        return view('admin.purchase_cards',['payment_modes'=>$payment_modes,'cards'=>$cards,
        'insurence_providers'=>$insurence_providers,'policy_cat_id'=>$policy_cat_id,
        'policy_id'=>$policy_id,'policy'=>$policy,'due_premium'=>$due_premium,'policy_name'=>$policy_name,
        'policy_phone_number'=>$policy_phone_number,'provider_name'=>$provider_name]);
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
            $purchase_type='';
            if($pur_card->purchase_type==1)
            {
                $purchase_type='Card';
            }
            else if($pur_card->purchase_type==3)
            {
                $purchase_type='Client Direct';
            }
            $data[] = [
                'sl_no' => $slNo++,
                'card' =>$pur_card->card->holder_name ?? "N/A",
                'provider' =>$pur_card->insurence_provider->provider_name ?? "N/A",
                'purchase_type'=>$purchase_type,
                'taken_amount' => $pur_card->taken_amount,
                'card_balance_amount' => $pur_card->card_balance_amount,
                'provider_balance_amount' => $pur_card->provider_balance_amount,
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
            'purchase_type' => 'required|integer|in:1,2,3',
            'provider_id' => 'nullable|integer|exists:tbl_insurence_providers,id',
            'card_id' => 'nullable|integer|exists:tbl_cards,id',
            'taken_amount' => 'required|numeric|min:0',            
            'card_balance_amount' => 'nullable|numeric|min:0', 
            'provider_balance_amount' => 'nullable|numeric|min:0', 
        ]);
        $policy_cat_id=$request->policy_cat_id;
        $policy_id=$request->policy_id;
        $purchase_type=$validatedData['purchase_type'];
        $provider_id=$validatedData['provider_id'];
        // $card_id=$validatedData['card_id'];
        $taken_amount=$validatedData['taken_amount'];
        // $card_balance_amount=$validatedData['card_balance_amount'];
        $provider_balance_amount=$validatedData['provider_balance_amount'];
        $added_by=Auth::user()->id;
        $added_user=Auth::user()->name;
        $due_premium_amount=$request->due_premium_amount; 
            if($taken_amount >  $due_premium_amount && $due_premium_amount !=0 )
            {
                return Response::json([ 'success' => false,'message'=>'Taken Amount More Than Due Premium Amount']);
            }
            if($purchase_type==1 ||$purchase_type==2)   
            {
                if($provider_id)
                {
                    $provider=Tbl_insurence_providers::find($provider_id);
                    // $card=Tbl_cards::find($card_id);
                    if($provider->current_amount==0)
                    {
                        return Response::json([ 'success' => false,'message'=>'Your Insurence Card Balance is 0 Do Not Take This Amount']);
                    }
                    // else if($card->current_amount==0)
                    // {
                    //     return Response::json([ 'success' => false,'message'=>'Your Card Balance is 0 Do Not Take This Amount']);
                    // }
                    else
                    {
                        // if($card)
                        // {
                        //     $card->current_amount=($card->current_amount-$taken_amount);
                        //     $card->save();  
                        // }
                        if($provider)
                        {
                            $provider->current_amount=($provider->current_amount-$taken_amount);
                            $provider->save(); 
                        }
                        $purchase_card=new Tbl_purchase_cards;
                        $purchase_card->policy_cat_id=$policy_cat_id;
                        $purchase_card->policy_id=$policy_id;
                        $purchase_card->purchase_type=$purchase_type;
                        $purchase_card->provider_id=$provider_id;
                        // $purchase_card->card_id=$card_id;
                        $purchase_card->taken_amount=$taken_amount;
                        // $purchase_card->card_balance_amount=$card_balance_amount;
                        $purchase_card->provider_balance_amount=$provider_balance_amount;
                        $purchase_card->added_by=$added_by;
                        $purchase_card->added_date=date('Y-m-d H:i:s');
                        $purchase_card->save();  
            
                        $purchase_card->added_user=$added_user;
                        $purchase_card->provider=$provider->provider_name;
                    }
                    $purchase_card->sl_no=Tbl_purchase_cards::count();
                }
            } 
            else if($purchase_type==3)  
            {
                $purchase_card=new Tbl_purchase_cards;
                $purchase_card->policy_cat_id=$policy_cat_id;
                $purchase_card->policy_id=$policy_id;
                $purchase_card->purchase_type=$purchase_type;
                $purchase_card->taken_amount=$taken_amount;
                $purchase_card->added_by=$added_by;
                $purchase_card->added_date=date('Y-m-d H:i:s');
                $purchase_card->save();  
    
                $purchase_card->added_user=$added_user;
                $purchase_card->sl_no=Tbl_purchase_cards::count();
            }
        return Response::json([ 'success' => true,'data'=>$purchase_card]);
    }
    public function getCardBalance(Request $request)
    {
        $taken_amount=$request->taken_amount;
        $providercardBalance=Tbl_insurence_providers::find($request->provider_id)->current_amount;
        // $cardBalance=Tbl_cards::find($request->card_id)->current_amount;
        // if($cardBalance < $taken_amount)
        // {
        //     return Response::json([ 'success' => false,'message'=>'Taken Amount  is Greater Than Card Balance']);
        // }
        if($providercardBalance < $taken_amount )
        {
            return Response::json([ 'success' => false,'message'=>'Taken Amount is Greater Than Insurence Card Balance']);
        }
        // $totalcardbalance=$cardBalance-$taken_amount;
        $totalprovidercardbalance=$providercardBalance-$taken_amount;
        return Response::json([ 'success' =>true,'data'=>[
            // 'totalcardbalance'=>$totalcardbalance,
        'totalprovidercardbalance'=>$totalprovidercardbalance]]);
    }
}
