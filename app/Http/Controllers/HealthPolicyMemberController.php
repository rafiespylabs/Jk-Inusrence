<?php
namespace App\Http\Controllers;
use App\Models\Tbl_companies;
use App\Models\Tbl_healthpolicy;
use App\Models\Tbl_healthpolicymembers;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
class HealthPolicyMemberController extends Controller
{
    public function index($health_id)
    {
      $healthpolicy=Tbl_healthpolicy::find($health_id);
      $healthpolicymembers=Tbl_healthpolicymembers::with('added_user')->where('health_id',$health_id)->get();
      return view('admin.healthpolicymembers',['healthpolicymembers'=>$healthpolicymembers,
      'health_id'=>$health_id,'healthpolicy'=>$healthpolicy]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'health_id' => 'required|exists:tbl_healthpolicies,id',
            'age_group' => 'required|integer|in:1,2',
            'member_name' => 'required|string|max:255',
            'member_birthdate' => 'required|date',
            'member_age' => 'required|integer',
            'member_height' => 'required|integer|min:0',
            'member_weight' => 'required|integer|min:0',
            'member_note' => 'nullable|string',
        ]);
        try {
            if(Tbl_healthpolicymembers::where('member_name',$validatedData['member_name'])->exists())
            {
               return response()->json([
                   'success' => false,
                   'message' => 'Already Exist This Member',
               ]);
            }
           $current_user_id=Auth::user()->id;
           $healthpolicymember = new Tbl_healthpolicymembers();
           $healthpolicymember->health_id = $validatedData['health_id'];
           $healthpolicymember->age_group = $validatedData['age_group'];
           $healthpolicymember->member_name= $validatedData['member_name'];
           $healthpolicymember->member_birthdate = $validatedData['member_birthdate'];
           $healthpolicymember->member_age = $validatedData['member_age'];
           $healthpolicymember->member_height = $validatedData['member_height'];
           $healthpolicymember->member_weight = $validatedData['member_weight'];           
           $healthpolicymember->member_note= $validatedData['member_note'];  
           $healthpolicymember->added_by= $current_user_id ;     
           $healthpolicymember->added_date=date('Y-m-d') ;       
           $healthpolicymember->save();

           $healthpolicy = Tbl_healthpolicy::find($validatedData['health_id']);
           $healthpolicymember->healthpolicy_name = $healthpolicy->name;

           $user = User::find($current_user_id);
           $healthpolicymember->added_by = $user->name;
           return response()->json([
               'success' => true,
               'message' => 'Member Added Successfully',
               'data' => $healthpolicymember,
           ]);
       } catch (\Exception $e) {
           return response()->json([
               'success' => false,
               'message' => 'Failed to Add Member: ' . $e->getMessage(),
           ], 500);
       }
    }
    public function show(Request $request)
    {
        $healthpolicymember = Tbl_healthpolicymembers::find($request->id);
        if(!$healthpolicymember)
        {
            return response()->json(['success' => false, 'message' => 'Memebr not found'], 404);
        }
        return response()->json([
            'success' => true,
            'data' => $healthpolicymember]);          
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_healthpolicymembers,id',
            'age_group' => 'required|integer|in:1,2',
            'member_name' => 'required|string|max:255',
            'member_birthdate' => 'required|date',
            'member_age' => 'required|integer',
            'member_height' => 'required|integer|min:0',
            'member_weight' => 'required|integer|min:0',
            'member_note' => 'nullable|string',
        ]);
        try 
        {
           $healthpolicymember = Tbl_healthpolicymembers::with('added_user')->find($validatedData['id']);
           $healthpolicymember->age_group = $validatedData['age_group'];
           $healthpolicymember->member_name= $validatedData['member_name'];
           $healthpolicymember->member_birthdate = $validatedData['member_birthdate'];
           $healthpolicymember->member_age = $validatedData['member_age'];
           $healthpolicymember->member_height = $validatedData['member_height'];
           $healthpolicymember->member_weight = $validatedData['member_weight'];           
           $healthpolicymember->member_note= $validatedData['member_note'];  
           $healthpolicymember->save();

           $healthpolicymember->added_by = $healthpolicymember->added_user->name;     
           $healthpolicymember->added_date=$healthpolicymember->added_date;  
           return response()->json([
               'success' => true,
               'message' => 'Member Updated Successfully',
               'data' => $healthpolicymember,
           ]);
       } catch (\Exception $e) {
           return response()->json([
               'success' => false,
               'message' => 'Failed to Add Member: ' . $e->getMessage(),
           ], 500);
       }
    }
}
