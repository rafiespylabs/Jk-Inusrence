<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\Tbl_other_policies;
use App\Models\Tbl_otherpolicy_documents;
use Response;
use Redirect;
class OtherPolicyDocumentController extends Controller
{
    public function index($policy_id)
    {
        $other_policy=Tbl_other_policies::find($policy_id);
        $otherpolicy_documents=Tbl_otherpolicy_documents::where('policy_id',$policy_id)->get();
        return view('admin.other_policydocuments',['other_policy'=>$other_policy,
        'otherpolicy_documents'=>$otherpolicy_documents,'policy_id'=>$policy_id]);
    }
    public function store(Request $request)
    {
        $currentUserId = Auth::id();
        $added_date=date('Y-m-d');
        $validatedData = $request->validate([
            'policy_id'=>'required|exists:tbl_other_policies,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'link' => 'required|string|max:255',
        ]);
        $validatedData['added_by'] = $currentUserId;
        $validatedData['added_date'] = $added_date;
        try {
            $otherpolicy_doc = new Tbl_otherpolicy_documents();
            $otherpolicy_doc->fill($validatedData);
            $otherpolicy_doc->save();
            $otherpolicy_docNew = Tbl_otherpolicy_documents::with('added_user')->find($otherpolicy_doc['id']);
            return response()->json([
                'success' => true,
                'message' => 'Document Added successfully',
                'data' => $otherpolicy_docNew,
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
            $otherpolicydocument = Tbl_otherpolicy_documents::with('added_user')->find($id);
            $added_user = $otherpolicydocument->added_user->name ?? []; 
            return response()->json([
                'success' => true,
                'data' => [
                    'otherpolicydocument' => $otherpolicydocument,
                    'added_user' => $added_user,
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error Fetching Other Policy details: ' . $e->getMessage()
            ], 500);
        }
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id'=>'required|exists:Tbl_otherpolicy_documents,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'link' => 'required|string|max:255',
        ]);
        $otherpolicydocument = Tbl_otherpolicy_documents::with(['added_user'])->find($validatedData['id']);
        if (!$otherpolicydocument) {
            return response()->json(['message' => 'Other Policy Document not found'], 404);
        }
        try 
        {
            $otherpolicydocument->fill($validatedData);
            $otherpolicydocument->save();
            $otherpolicydocumentNew =Tbl_otherpolicy_documents::with(['added_user'])->find($validatedData['id']);
            return response()->json([
                'success' => true,
                'message' => 'Other Policy Document updated successfully',
                'data' => $otherpolicydocumentNew,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update Other Policy Document: ' . $e->getMessage(),
            ], 500);
        }
    }
}
