<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\Tbl_policydocuments;
use Response;
use Redirect;
class PolicyDocumentController extends Controller
{
    public function index($policy_id)
    {
        $policydocuments=Tbl_policydocuments::with('added_user')->where('policy_id',$policy_id)->get();
        return view('admin.policydocuments',['policydocuments'=>$policydocuments,'policy_id'=>$policy_id]);
    }
    public function store(Request $request)
    {
        $currentUserId = Auth::id();
        $added_date=date('Y-m-d');
        $validatedData = $request->validate([
            'policy_id'=>'required|exists:tbl_policyholders,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'link' => 'required|string|max:255',
        ]);
        $validatedData['added_by'] = $currentUserId;
        $validatedData['added_date'] = $added_date;
        try {
            $policy_doc = new Tbl_policydocuments();
            $policy_doc->fill($validatedData);
            $policy_doc->save();
            $policy_docNew = Tbl_policydocuments::with('added_user')->find($policy_doc['id']);
            return response()->json([
                'success' => true,
                'message' => 'Document Added successfully',
                'data' => $policy_docNew,
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
        try 
        {
            $policydocument = Tbl_policydocuments::with('added_user')->find($request->policydoc_id);
            $added_user = $policydocument->added_user->name ?? []; 
            return response()->json([
                'success' => true,
                'data' => [
                    'policydocument' => $policydocument,
                    'added_user' => $added_user,
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error Fetching Policy details: ' . $e->getMessage()
            ], 500);
        }
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id'=>'required|exists:tbl_policydocuments,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'link' => 'required|string|max:255',
        ]);
        $policydocument = Tbl_policydocuments::with(['added_user'])->find($validatedData['id']);
        if (!$policydocument) {
            return response()->json(['message' => 'Policy Document not found'], 404);
        }
        try 
        {
            $policydocument->fill($validatedData);
            $policydocument->save();
            $policydocumentNew = Tbl_policydocuments::with(['added_user'])->find($validatedData['id']);
            return response()->json([
                'success' => true,
                'message' => 'Policy Document updated successfully',
                'data' => $policydocumentNew,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update Policy Document: ' . $e->getMessage(),
            ], 500);
        }
    }
    public function destroy(Request $request)
    {
        $policydocument =Tbl_policydocuments::find($request->id);
        if (!$policydocument) {
            return response()->json(['message' => 'PolicyDocument not found'], 404);
        }
        try 
        {
            $policydocument->delete();
            return response()->json(['message' => 'PolicyDocument deleted successfully']);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to Delete PolicyDocument: ' . $e->getMessage(),
            ], 500);
        }
    }
}
