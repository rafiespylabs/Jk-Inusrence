<?php
namespace App\Http\Controllers;
use App\Models\Tbl_companies;
use App\Models\Tbl_healthpolicy;
use App\Models\tbl_insurence_providers;
use App\Models\Tbl_policy_categories;
use App\Models\Tbl_staffs;
use App\Models\Tbl_referred_persons;
use Carbon\Carbon;
use Illuminate\Http\Request;
class HealthpoliciesController extends Controller
{
    public function index(){
        $healthpolicies = Tbl_healthpolicy::with(['executive', 'referred', 'provider', 'company','policy_category'])->get();
        $executive = Tbl_staffs::all();
        $referred = Tbl_referred_persons::all();
        $provider = Tbl_insurence_providers::all();
        $company = Tbl_companies::all();
        $policy_category = Tbl_policy_categories::all();

        return view('admin.healthpolicies', [
            'healthpolicies' => $healthpolicies,
            'executive' => $executive,
            'referred' => $referred,
            'provider' => $provider,
            'company' => $company,
            'policy_category' => $policy_category,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'policy_category_id' => 'required|exists:tbl_policy_categories,id',
            'type' => 'required|integer|in:1,2,3,4',
            'company_id' => 'required|exists:tbl_companies,id',
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'height' => 'required|integer|min:0',
            'weight' => 'required|integer|min:0',
            'primary_number' => 'required|string|max:15',
            'secondary_number' => 'nullable|string|max:15',
            'expiry_date' => 'required|date',
            'premium_amount' => 'required|numeric|min:0',
            'sum_insured' => 'required|numeric|min:0',
            'term' => 'required|string|in:1year',
            'nominee_name' => 'nullable|string|max:255',
            'nominee_relation' => 'nullable|string|max:255',
            'executive_id' => 'required|exists:tbl_staffs,user_id',
            'status' => 'required|boolean',
            'referred_id' => 'nullable|integer|exists:tbl_referred_persons,id',
            'provider_id' => 'required|integer|exists:tbl_insurence_providers,id',
            'note' => 'nullable|string',
        ]);

        $birthDate = Carbon::parse($request->birth_date);
        $age = $birthDate->age;
    
        try {
    
            $healthpolicies = new Tbl_healthpolicy();
            $healthpolicies->policy_category_id = $validatedData['policy_category_id'];
            $healthpolicies->type = $validatedData['type'];
            $healthpolicies->company_id = $validatedData['company_id'];
            $healthpolicies->name = $validatedData['name'];
            $healthpolicies->birth_date = $validatedData['birth_date'];
            $healthpolicies->age = $age;
            $healthpolicies->height = $validatedData['height'];           
            $healthpolicies->weight = $validatedData['weight'];           
            $healthpolicies->primary_number = $validatedData['primary_number'];           
            $healthpolicies->secondary_number = $validatedData['secondary_number'];           
            $healthpolicies->expiry_date = $validatedData['expiry_date'];           
            $healthpolicies->premium_amount = $validatedData['premium_amount'];           
            $healthpolicies->sum_insured = $validatedData['sum_insured'];           
            $healthpolicies->term = $validatedData['term'];           
            $healthpolicies->nominee_name = $validatedData['nominee_name'];           
            $healthpolicies->nominee_relation = $validatedData['nominee_relation'];           
            $healthpolicies->executive_id = $validatedData['executive_id'];           
            $healthpolicies->status = $validatedData['status'];           
            $healthpolicies->referred_id = $validatedData['referred_id'];           
            $healthpolicies->provider_id = $validatedData['provider_id'];           
            $healthpolicies->note = $validatedData['note'];           
            $healthpolicies->save();

            $policy_category = Tbl_policy_categories::find($validatedData['policy_category_id']);
            $healthpolicies->policy_category = $policy_category->policy_category;
    
            $company = Tbl_companies::find($validatedData['company_id']);
            $healthpolicies->company = $company->company;

            $executive = Tbl_staffs::where('user_id', $validatedData['executive_id'])->first();
            if (!$executive) {
                throw new \Exception('Staff user not found');
            }

            $healthpolicies->user_id = $executive->user->name;

            $referred = Tbl_referred_persons::find($validatedData['referred_id']);
            $healthpolicies->referred = $referred->name;

            $provider = Tbl_insurence_providers::find($validatedData['provider_id']);
            $healthpolicies->provider = $provider->provider_name;


    
            return response()->json([
                'success' => true,
                'message' => 'Health policy created successfully',
                'data' => $healthpolicies,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create Health policy: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:tbl_healthpolicies,id',
        ]);
        $healthpolicies = Tbl_healthpolicy::with('policy_category','executive', 'referred', 'provider', 'company')->find($request->id);
        if (!$healthpolicies) {
            return response()->json(['success' => false, 'message' => 'Health policy not found'], 404);
        }
        return response()->json([
            'success' => true,
            'data' => [
                'policy_category_id' => $healthpolicies->policy_category_id ,
                'type' => $healthpolicies->type ,
                'company_id' => $healthpolicies->company_id ,
                'name' => $healthpolicies->name,
                'birth_date' => $healthpolicies->birth_date,
                'height' => $healthpolicies->height,
                'weight' => $healthpolicies->weight,
                'primary_number' => $healthpolicies->primary_number,       
                'secondary_number' => $healthpolicies->secondary_number,          
                'expiry_date' => $healthpolicies->expiry_date,         
                'premium_amount' => $healthpolicies->premium_amount,       
                'sum_insured' => $healthpolicies->sum_insured,       
                'term' => $healthpolicies->term,       
                'nominee_name' => $healthpolicies->nominee_name,       
                'nominee_relation' => $healthpolicies->nominee_relation,       
                'executive_id' => $healthpolicies->executive->user_id,    
                'status' => $healthpolicies->status,          
                'referred_id' => $healthpolicies->referred_id,          
                'provider_id' => $healthpolicies->provider_id,       
                'note' => $healthpolicies->note,       
            ]
        ]);
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_healthpolicies,id',
            'policy_category_id' => 'required|exists:tbl_policy_categories,id',
            'type' => 'required|integer|in:1,2,3,4',
            'company_id' => 'required|exists:tbl_companies,id',
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'height' => 'required|integer|min:0',
            'weight' => 'required|integer|min:0',
            'primary_number' => 'required|string|max:15',
            'secondary_number' => 'nullable|string|max:15',
            'expiry_date' => 'required|date',
            'premium_amount' => 'required|numeric|min:0',
            'sum_insured' => 'required|numeric|min:0',
            'term' => 'required|string|in:1year',
            'nominee_name' => 'required|string|max:255',
            'nominee_relation' => 'required|string|max:255',
            'executive_id' => 'required|exists:tbl_staffs,user_id',
            'status' => 'required|boolean',
            'referred_id' => 'nullable|integer|exists:tbl_referred_persons,id',
            'provider_id' => 'required|integer|exists:tbl_insurence_providers,id',
            'note' => 'nullable|string',     
        ]);

        $healthpolicies = Tbl_healthpolicy::find($validatedData['id']);
        if ($healthpolicies->birth_date !== $request->birth_date) {
            $birthDate = Carbon::parse($request->birth_date);
            $age = $birthDate->age;
            $healthpolicies->age = $age;
        }
            $healthpolicies->policy_category_id = $validatedData['policy_category_id'];
            $healthpolicies->type = $validatedData['type'];
            $healthpolicies->company_id = $validatedData['company_id'];
            $healthpolicies->name = $validatedData['name'];
            $healthpolicies->birth_date = $validatedData['birth_date'];
            $healthpolicies->height = $validatedData['height'];
            $healthpolicies->weight = $validatedData['weight'];
            $healthpolicies->primary_number = $validatedData['primary_number'];           
            $healthpolicies->secondary_number = $validatedData['secondary_number'];           
            $healthpolicies->expiry_date = $validatedData['expiry_date'];           
            $healthpolicies->premium_amount = $validatedData['premium_amount'];           
            $healthpolicies->sum_insured = $validatedData['sum_insured'];           
            $healthpolicies->term = $validatedData['term'];           
            $healthpolicies->nominee_name = $validatedData['nominee_name'];           
            $healthpolicies->nominee_relation = $validatedData['nominee_relation'];           
            $healthpolicies->executive_id = $validatedData['executive_id'];           
            $healthpolicies->status = $validatedData['status'];           
            $healthpolicies->referred_id = $validatedData['referred_id'];           
            $healthpolicies->provider_id = $validatedData['provider_id'];           
            $healthpolicies->note = $validatedData['note'];           
            $healthpolicies->save();

            $policy_category = Tbl_policy_categories::find($validatedData['policy_category_id']);
            $healthpolicies->policy_category = $policy_category->policy_category;

            $company = Tbl_companies::find($validatedData['company_id']);
            $healthpolicies->company = $company->company;

            $executive = Tbl_staffs::where('user_id', $validatedData['executive_id'])->first();
            if (!$executive) {
                throw new \Exception('Staff user not found');
            }
            $healthpolicies->user_id = $executive->user_id;
            $referred = Tbl_referred_persons::find($validatedData['referred_id']);
            $healthpolicies->referred = $referred->name;
            $provider = Tbl_insurence_providers::find($validatedData['provider_id']);
            $healthpolicies->provider = $provider->provider_name;                
        return response()->json([
            'success' => true,
            'message' => 'Health policy updated successfully',
            'data' => $healthpolicies,
        ]);
    }

    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_healthpolicies,id', 
        ]);
        $healthpolicies = Tbl_healthpolicy::find($validatedData['id']);
        if (!$healthpolicies) {
            return response()->json([
                'success' => false,
                'message' => 'Health policy not found.',
            ], 404);
        }
        $healthpolicies->delete();
        return response()->json([
            'success' => true,
            'message' => 'Health policy deleted successfully.',
        ]);
    }
}
