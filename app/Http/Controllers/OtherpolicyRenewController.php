<?php
namespace App\Http\Controllers;
use App\Models\Tbl_companies;
use App\Models\Tbl_other_policies;
use App\Models\Tbl_other_policy_renews;
use App\Models\Tbl_payment_modes;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
class OtherpolicyRenewController extends Controller
{
   public function index($other_policy_id)
   {
        $payment_modes=Tbl_payment_modes::all();
        $other_policy=Tbl_other_policies::find($other_policy_id);
        $other_policy_renews=Tbl_other_policy_renews::where('other_policy_id',$other_policy_id)->get();
        return view('admin.other_policy_renews',['other_policy_renews'=>$other_policy_renews,
        'other_policy'=>$other_policy,'payment_modes'=>$payment_modes]);
   }
   public function store(Request $request)
   {
        $validatedData = $request->validate([
            'other_policy_id' => 'required|exists:tbl_other_policies,id',
            'policy_cat_id' => 'required|exists:tbl_policy_categories,id',
            'premium_amount' => 'required|numeric',
            'renew_date' => 'required|date',
            'expiry_date' => 'required|date',
            'payment_mode_id' => 'required|exists:tbl_payment_modes,id'
        ]);
        try {
            $current_user_id=Auth::user()->id;
            $otherpolicy_renew = new Tbl_other_policy_renews();
            $otherpolicy_renew->other_policy_id = $validatedData['other_policy_id'];
            $otherpolicy_renew->policy_cat_id = $validatedData['policy_cat_id'];
            $otherpolicy_renew->premium_amount= $validatedData['premium_amount'];
            $otherpolicy_renew->renew_date = $validatedData['renew_date'];
            $otherpolicy_renew->expiry_date = $validatedData['expiry_date']; 
            $otherpolicy_renew->payment_mode_id= $validatedData['payment_mode_id']; 
            $otherpolicy_renew->added_by= $current_user_id ;     
            $otherpolicy_renew->added_date=date('Y-m-d') ;       
            $otherpolicy_renew->save();
 
            $otherpolicy = Tbl_other_policies::find($validatedData['other_policy_id']);
            $otherpolicy->premium_amount = $validatedData['premium_amount'];
            $otherpolicy->start_date = $validatedData['renew_date'];
            $otherpolicy->expiry_date = $validatedData['expiry_date'];
            $otherpolicy->save();
 
            $payment_mode=Tbl_payment_modes::find($validatedData['payment_mode_id']);
 
            $user = User::find($current_user_id);
            $otherpolicy_renew->added_by = $user->name;
            $otherpolicy_renew->payment_mode = $payment_mode->payment_mode;
            return response()->json([
                'success' => true,
                'message' => 'Renewed Successfully',
                'data' => $otherpolicy_renew,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to Renew Other Policy: ' . $e->getMessage(),
            ], 500);
        }
   }
}
