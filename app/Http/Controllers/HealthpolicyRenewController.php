<?php
namespace App\Http\Controllers;
use App\Models\Tbl_companies;
use App\Models\Tbl_healthpolicy;
use App\Models\Tbl_healthpolicy_renews;
use App\Models\Tbl_payment_modes;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
class HealthpolicyRenewController extends Controller
{
    public function index($health_policy_id)
    {
        $healthpolicy=Tbl_healthpolicy::find($health_policy_id);
        $payment_modes=Tbl_payment_modes::all();
        $healthpolicy_renews=Tbl_healthpolicy_renews::where('healthpolicy_id',$health_policy_id)->get();
        return view('admin.health_policy_renews',['healthpolicy'=>$healthpolicy,
        'healthpolicy_renews'=>$healthpolicy_renews,'payment_modes'=>$payment_modes]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'policy_cat_id' => 'required|exists:tbl_policy_categories,id',
            'healthpolicy_id' => 'required|exists:tbl_healthpolicies,id',
            'premium_amount' => 'required|numeric',
            'customer_premium'=>'required|numeric',
            'renew_date' => 'required|date',
            'expiry_date' => 'required|date',
            'payment_mode_id' => 'required|exists:tbl_payment_modes,id'
        ]);
        try {
           $current_user_id=Auth::user()->id;
           $healthpolicy_renew = new Tbl_healthpolicy_renews();
           $healthpolicy_renew->healthpolicy_id = $validatedData['healthpolicy_id'];
           $healthpolicy_renew->policy_cat_id = $validatedData['policy_cat_id'];
           $healthpolicy_renew->premium_amount= $validatedData['premium_amount'];
           $healthpolicy_renew->customer_premium= $validatedData['customer_premium'];
           $healthpolicy_renew->renew_date = $validatedData['renew_date'];
           $healthpolicy_renew->expiry_date = $validatedData['expiry_date']; 
           $healthpolicy_renew->payment_mode_id= $validatedData['payment_mode_id']; 
           $healthpolicy_renew->added_by= $current_user_id ;     
           $healthpolicy_renew->added_date=date('Y-m-d') ;       
           $healthpolicy_renew->save();

           $healthpolicy = Tbl_healthpolicy::find($validatedData['healthpolicy_id']);
           $healthpolicy->premium_amount = $validatedData['premium_amount'];
           $healthpolicy->customer_premium_amount = $validatedData['customer_premium'];
           $healthpolicy->start_date = $validatedData['renew_date'];
           $healthpolicy->expiry_date = $validatedData['expiry_date'];
           $healthpolicy->save();

           $payment_mode=Tbl_payment_modes::find($validatedData['payment_mode_id']);

           $user = User::find($current_user_id);
           $healthpolicy_renew->added_by = $user->name;
           $healthpolicy_renew->payment_mode = $payment_mode->payment_mode;
           return response()->json([
               'success' => true,
               'message' => 'Renewed Successfully',
               'data' => $healthpolicy_renew,
           ]);
       } catch (\Exception $e) {
           return response()->json([
               'success' => false,
               'message' => 'Failed to Add Member: ' . $e->getMessage(),
           ], 500);
       }
    }
}
