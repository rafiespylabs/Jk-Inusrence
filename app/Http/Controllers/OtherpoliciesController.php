<?php
namespace App\Http\Controllers;
use App\Models\Tbl_insurence_providers;
use App\Models\Tbl_other_policies;
use App\Models\Tbl_policy_categories;
use App\Models\Tbl_referred_persons;
use App\Models\Tbl_staffs;
use Illuminate\Http\Request;

class OtherpoliciesController extends Controller
{
    public function index(){
        $otherpolicies = Tbl_other_policies::with(['policy_category','executive', 'referred', 'provider'])->get();
        $policy_category = Tbl_policy_categories::all();
        $executive = Tbl_staffs::all();
        $referred = Tbl_referred_persons::all();
        $provider = Tbl_insurence_providers::all();

        return view('admin.otherpolicies', [
            'otherpolicies' => $otherpolicies,
            'policy_category' => $policy_category,
            'executive' => $executive,
            'referred' => $referred,
            'provider' => $provider,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'policy_category_id' => 'required|exists:tbl_policy_categories,id',
            'name' => 'required|string|max:255',
            'primary_number' => 'required|string|max:15',
            'secondary_number' => 'nullable|string|max:15',
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
    
        try {
    
            $otherpolicies = new Tbl_other_policies();
            $otherpolicies->policy_category_id = $validatedData['policy_category_id'];
            $otherpolicies->name = $validatedData['name'];
            $otherpolicies->primary_number = $validatedData['primary_number'];           
            $otherpolicies->secondary_number = $validatedData['secondary_number'];           
            $otherpolicies->expiry_date = $validatedData['expiry_date'];           
            $otherpolicies->premium_amount = $validatedData['premium_amount'];           
            $otherpolicies->sum_insured = $validatedData['sum_insured'];           
            $otherpolicies->term = $validatedData['term'];           
            $otherpolicies->executive_id = $validatedData['executive_id'];           
            $otherpolicies->status = $validatedData['status'];           
            $otherpolicies->referred_id = $validatedData['referred_id'];           
            $otherpolicies->provider_id = $validatedData['provider_id'];           
            $otherpolicies->note = $validatedData['note'];           
            $otherpolicies->save();
    
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
            'primary_number' => 'required|string|max:15',
            'secondary_number' => 'nullable|string|max:15',
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

        $otherpolicies = Tbl_other_policies::find($validatedData['id']);

            $otherpolicies->policy_category_id = $validatedData['policy_category_id'];
            $otherpolicies->name = $validatedData['name'];
            $otherpolicies->primary_number = $validatedData['primary_number'];           
            $otherpolicies->secondary_number = $validatedData['secondary_number'];           
            $otherpolicies->expiry_date = $validatedData['expiry_date'];           
            $otherpolicies->premium_amount = $validatedData['premium_amount'];           
            $otherpolicies->sum_insured = $validatedData['sum_insured'];           
            $otherpolicies->term = $validatedData['term'];           
            $otherpolicies->executive_id = $validatedData['executive_id'];           
            $otherpolicies->status = $validatedData['status'];           
            $otherpolicies->referred_id = $validatedData['referred_id'];           
            $otherpolicies->provider_id = $validatedData['provider_id'];           
            $otherpolicies->note = $validatedData['note'];           
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
