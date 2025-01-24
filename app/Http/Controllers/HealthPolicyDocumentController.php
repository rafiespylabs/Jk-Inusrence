<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\Tbl_healthpolicy;
use App\Models\Tbl_healthpolicy_docucments;
use Response;
use Redirect;
class HealthPolicyDocumentController extends Controller
{
    public function index($policy_id)
    {
        $healthpolicy=Tbl_healthpolicy::find($policy_id);
        $healthpolicy_docs=Tbl_healthpolicy_docucments::where('policy_id',$policy_id)->get();
        return view('admin.health_policydocuments',['healthpolicy_docs'=>$healthpolicy_docs,'healthpolicy'=>$healthpolicy,'policy_id'=>$policy_id]);
    }
    public function store(Request $request)
    {
        $currentUserId = Auth::id();
        $added_date=date('Y-m-d');
        $validatedData = $request->validate([
            'policy_id'=>'required|exists:tbl_healthpolicies,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'link' => 'required|string|max:255',
        ]);
        $validatedData['added_by'] = $currentUserId;
        $validatedData['added_date'] = $added_date;
        try {
            $healthpolicy_doc = new Tbl_healthpolicy_docucments();
            $healthpolicy_doc->fill($validatedData);
            $healthpolicy_doc->save();
            $healthpolicy_docNew = Tbl_healthpolicy_docucments::with('added_user')->find($healthpolicy_doc['id']);
            return response()->json([
                'success' => true,
                'message' => 'Document Added successfully',
                'data' => $healthpolicy_docNew,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to Add Document: ' . $e->getMessage(),
            ], 500);
        }
    }
    public function show(Request $request)
    {
        $id=$request->id;
        try 
        {
            $healthpolicydocument = Tbl_healthpolicy_docucments::with('added_user')->find($id);
            $added_user = $healthpolicydocument->added_user->name ?? []; 
            return response()->json([
                'success' => true,
                'data' => [
                    'healthpolicydocument' => $healthpolicydocument,
                    'added_user' => $added_user,
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error Fetching Health Policy details: ' . $e->getMessage()
            ], 500);
        }
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id'=>'required|exists:Tbl_healthpolicy_docucments,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'link' => 'required|string|max:255',
        ]);
        $health_policydocument = Tbl_healthpolicy_docucments::with(['added_user'])->find($validatedData['id']);
        if (!$health_policydocument) {
            return response()->json(['message' => 'Health Policy Document not found'], 404);
        }
        try 
        {
            $health_policydocument->fill($validatedData);
            $health_policydocument->save();
            $health_policydocumentNew =Tbl_healthpolicy_docucments::with(['added_user'])->find($validatedData['id']);
            return response()->json([
                'success' => true,
                'message' => 'Health Policy Document updated successfully',
                'data' => $health_policydocumentNew,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update Health Policy Document: ' . $e->getMessage(),
            ], 500);
        }
    }
}
