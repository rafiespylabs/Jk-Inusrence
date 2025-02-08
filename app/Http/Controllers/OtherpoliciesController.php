<?php
namespace App\Http\Controllers;
use App\Models\Tbl_insurence_providers;
use App\Models\Tbl_other_policies;
use App\Models\Tbl_policy_categories;
use App\Models\Tbl_referred_persons;
use App\Models\Tbl_other_policy_renews;
use App\Models\Tbl_staffs;
use App\Models\Tbl_payment_modes;
use Illuminate\Http\Request;
use Auth;
class OtherpoliciesController extends Controller
{
    public function index(){
        $otherpolicies = Tbl_other_policies::with(['policy_category','executive', 'referred', 'provider'])
        ->get();
        $policy_category = Tbl_policy_categories::
        whereNotIn('id', [1,9])->get();
        $executive = Tbl_staffs::all();
        $referred = Tbl_referred_persons::all();
        $provider = Tbl_insurence_providers::all();
        $payment_modes=Tbl_payment_modes::all();
        return view('admin.otherpolicies', [
            'otherpolicies' => $otherpolicies,
            'policy_category' => $policy_category,
            'executive' => $executive,
            'referred' => $referred,
            'provider' => $provider,
            'payment_modes'=>$payment_modes,
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'policy_category_id' => 'required|exists:tbl_policy_categories,id',
            'name' => 'required|string|max:255',
            'primary_number' => 'nullable|string|max:15',
            'secondary_number' => 'nullable|string|max:15',
            'start_date' => 'required|date',
            'expiry_date' => 'required|date',
            'premium_amount' => 'required|numeric|min:0',
            'sum_insured' => 'required|numeric|min:0',
            'term' => 'required|string|in:1year',
            'executive_id' => 'required|exists:tbl_staffs,user_id',
            'status' => 'required|boolean',
            'referred_id' => 'nullable|integer|exists:tbl_referred_persons,id',
            'provider_id' => 'required|integer|exists:tbl_insurence_providers,id',
            'note' => 'nullable|string',
            'payment_mode_id'=>'nullable|integer|exists:tbl_payment_modes,id'
        ]);
        try {
            if(Tbl_other_policies::where('name',$validatedData['name'])
            ->orWhere('primary_number', $validatedData['primary_number'])
            ->exists())
            {
                return response()->json([
                    'success' => false,
                    'message' => 'Already Exist This Policy Name Or Phone Number',
                ]);
            }
            $current_user_id=Auth::user()->id;
            $otherpolicies = new Tbl_other_policies();
            $otherpolicies->policy_category_id = $validatedData['policy_category_id'];
            $otherpolicies->name = $validatedData['name'];
            $otherpolicies->primary_number = $validatedData['primary_number'];           
            $otherpolicies->secondary_number = $validatedData['secondary_number'];           
            $otherpolicies->start_date = $validatedData['start_date']; 
            $otherpolicies->expiry_date = $validatedData['expiry_date'];           
            $otherpolicies->premium_amount = $validatedData['premium_amount'];           
            $otherpolicies->sum_insured = $validatedData['sum_insured'];           
            $otherpolicies->term = $validatedData['term'];           
            $otherpolicies->executive_id = $validatedData['executive_id'];           
            $otherpolicies->status = $validatedData['status'];           
            $otherpolicies->referred_id = $validatedData['referred_id'];           
            $otherpolicies->provider_id = $validatedData['provider_id'];           
            $otherpolicies->note = $validatedData['note'];  
            $otherpolicies->created_by= $current_user_id ;     
            $otherpolicies->created_date=date('Y-m-d H:i:s') ;            
            if($otherpolicies->save())
            {
                $otherpolicy_renew = new Tbl_other_policy_renews();
                $otherpolicy_renew->policy_cat_id = $validatedData['policy_category_id'];
                $otherpolicy_renew->other_policy_id = $otherpolicies->id;
                $otherpolicy_renew->premium_amount= $validatedData['premium_amount'];
                $otherpolicy_renew->renew_date = $validatedData['start_date'];
                $otherpolicy_renew->expiry_date = $validatedData['expiry_date']; 
                $otherpolicy_renew->payment_mode_id= $validatedData['payment_mode_id']; 
                $otherpolicy_renew->added_by= $current_user_id ;     
                $otherpolicy_renew->added_date=date('Y-m-d') ;       
                $otherpolicy_renew->save();
            }
            $policy_category = Tbl_policy_categories::find($validatedData['policy_category_id']);
            $otherpolicies->policy_category = $policy_category->policy_category;
            $executive = Tbl_staffs::where('user_id', $validatedData['executive_id'])->first();
            if (!$executive) {
                throw new \Exception('Staff user not found');
            }
            $otherpolicies->user_id = $executive->user->name;
            $referred = Tbl_referred_persons::find($validatedData['referred_id']);
            $otherpolicies->referred = $referred->name;
            $provider = Tbl_insurence_providers::find($validatedData['provider_id']);
            $otherpolicies->provider = $provider->provider_name;

            $otherpolicyNew = Tbl_other_policies::find($otherpolicies->id);
            $otherpolicies->paid_amount=$otherpolicyNew->paid_amount;
            $otherpolicies->due_amount=$otherpolicyNew->due_amount;
            return response()->json([
                'success' => true,
                'message' => 'Other policy created successfully',
                'data' => $otherpolicies,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create other policy: ' . $e->getMessage(),
            ], 500);
        }
    }
    public function edit(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:tbl_other_policies,id',
        ]);
        $otherpolicies = Tbl_other_policies::with('policy_category','executive', 'referred', 'provider')->find($request->id);
        if (!$otherpolicies) {
            return response()->json(['success' => false, 'message' => 'Other policy not found'], 404);
        }
        return response()->json([
            'success' => true,
            'data' => [
                'policy_category_id' => $otherpolicies->policy_category_id ,
                'name' => $otherpolicies->name,
                'primary_number' => $otherpolicies->primary_number,       
                'secondary_number' => $otherpolicies->secondary_number,          
                'start_date' => $otherpolicies->start_date,    
                'expiry_date' => $otherpolicies->expiry_date,         
                'premium_amount' => $otherpolicies->premium_amount,       
                'sum_insured' => $otherpolicies->sum_insured,       
                'term' => $otherpolicies->term,       
                'executive_id' => $otherpolicies->executive->user_id,    
                'status' => $otherpolicies->status,          
                'referred_id' => $otherpolicies->referred_id,          
                'provider_id' => $otherpolicies->provider_id,       
                'note' => $otherpolicies->note,       
            ]
        ]);
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_other_policies,id',
            'policy_category_id' => 'required|exists:tbl_policy_categories,id',
            'name' => 'required|string|max:255',
            'primary_number' => 'nullable|string|max:15',
            'secondary_number' => 'nullable|string|max:15',
            'start_date' => 'required|date',
            'expiry_date' => 'required|date',
            'premium_amount' => 'required|numeric|min:0',
            'sum_insured' => 'required|numeric|min:0',
            'term' => 'required|string|in:1year',
            'executive_id' => 'required|exists:tbl_staffs,user_id',
            'status' => 'required|boolean',
            'referred_id' => 'nullable|integer|exists:tbl_referred_persons,id',
            'provider_id' => 'required|integer|exists:tbl_insurence_providers,id',
            'note' => 'nullable|string',     
        ]);
            // if(Tbl_other_policies::where('name',$validatedData['name'])
            // ->orWhere('primary_number', $validatedData['primary_number'])
            // ->exists())
            // {
            //     return response()->json([
            //         'success' => false,
            //         'message' => 'Already Updated  Policy Name Or Phone Number',
            //     ]);
            // }
            $current_user_id=Auth::user()->id;
            $otherpolicies = Tbl_other_policies::find($validatedData['id']);
            $otherpolicies->policy_category_id = $validatedData['policy_category_id'];
            $otherpolicies->name = $validatedData['name'];
            $otherpolicies->primary_number = $validatedData['primary_number'];           
            $otherpolicies->secondary_number = $validatedData['secondary_number'];           
            $otherpolicies->start_date = $validatedData['start_date'];
            $otherpolicies->expiry_date = $validatedData['expiry_date'];           
            $otherpolicies->premium_amount = $validatedData['premium_amount'];           
            $otherpolicies->sum_insured = $validatedData['sum_insured'];           
            $otherpolicies->term = $validatedData['term'];           
            $otherpolicies->executive_id = $validatedData['executive_id'];           
            $otherpolicies->status = $validatedData['status'];           
            $otherpolicies->referred_id = $validatedData['referred_id'];           
            $otherpolicies->provider_id = $validatedData['provider_id'];           
            $otherpolicies->note = $validatedData['note']; 
            $otherpolicies->edited_by= $current_user_id ;     
            $otherpolicies->edited_date=date('Y-m-d H:i:s') ;          
            $otherpolicies->save();

            $policy_category = Tbl_policy_categories::find($validatedData['policy_category_id']);
            $otherpolicies->policy_category = $policy_category->policy_category;

            $executive = Tbl_staffs::where('user_id', $validatedData['executive_id'])->first();
            if (!$executive) {
                throw new \Exception('Staff user not found');
            }
            $otherpolicies->user_id = $executive->user_id;

            $referred = Tbl_referred_persons::find($validatedData['referred_id']);
            $otherpolicies->referred = $referred->name;

            $provider = Tbl_insurence_providers::find($validatedData['provider_id']);
            $otherpolicies->provider = $provider->provider_name;
        return response()->json([
            'success' => true,
            'message' => 'Other policy updated successfully',
            'data' => $otherpolicies,
        ]);
    }

    public function destroy(Request $request)
    {
        
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_other_policies,id', 
        ]);
        
        $otherpolicies = Tbl_other_policies::find($validatedData['id']);
        if (!$otherpolicies) {
            return response()->json([
                'success' => false,
                'message' => 'Other policy not found.',
            ], 404);
        }
       
        $otherpolicies->delete();

        return response()->json([
            'success' => true,
            'message' => 'Other policy deleted successfully.',
        ]);
    }
}
