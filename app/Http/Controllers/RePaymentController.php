<?php
namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tbl_cards;
use App\Models\Tbl_creditcard_payments;
use App\Models\Tbl_credit_repayments;
use App\Models\User;
use Carbon\Carbon;
use Response;
use Redirect;
class RePaymentController extends Controller
{
    public function index($credit_pay_id)
    {
        $credit_cardayment=Tbl_creditcard_payments::with(['card'])->find($credit_pay_id);
        return view('admin.credit_repayments',['credit_cardayment'=>$credit_cardayment,
        'credit_pay_id'=>$credit_pay_id]);
    }
    public function list(Request $request)
    {
        $limit = $request->input('length', 10); 
        $start = $request->input('start', 0);   
        $searchValue = $request->input('search.value');
        $credit_pay_id = $request->input('credit_pay_id');
        $query =Tbl_credit_repayments::query();
        if (!empty($searchValue)) {
            $query->where('repay_date', 'like', '%' . $searchValue . '%');
        }
        $query->where('credit_pay_id', $credit_pay_id);
        $totalRecords = $query->count();
        $credit_repayments= $query->skip($start)
                    ->take($limit)
                    ->with(['added_user','credit_pay'])
                    ->latest('id') 
                    ->get();
        $data = [];
        $slNo = $start + 1;
        foreach ($credit_repayments as $repay) {
            $added_user =$repay->added_user->name ?? '';
            $added_date = $repay->added_date
                ? Carbon::parse($repay->added_date)->format('d/m/Y') : '';
            $repay_date =$repay->repay_date
                ? Carbon::parse($repay->repay_date)->format('d/m/Y') : '';
            $data[] = [
                'sl_no' => $slNo++,
                'repay_amount' =>$repay->repay_amount,
                'repay_date' =>$repay_date ,
                'added_by' =>  $added_user,
                'added_date' => $added_date,
                'action' => '<i class="fa fa-edit edit_credit_repay" data-id="' . $repay->id . '" data-rowid="'. $repay->id . '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>',
                'id' => $repay->id
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
            'credit_pay_id' => 'required|exists:tbl_creditcard_payments,id',
            'repay_amount' => 'required|numeric',
            'repay_date' => 'required|date',            
        ]);
        try 
        {
            $validatedData['added_by'] = $currentUserId;
            $validatedData['added_date'] = date('Y-m-d H:i:s');
            $credit_repay=new Tbl_credit_repayments;
            $credit_repay->credit_pay_id=$validatedData['credit_pay_id'];
            $credit_repay->repay_amount=$validatedData['repay_amount'];
            $credit_repay->repay_date=$validatedData['repay_date'];
            $credit_repay->added_by= $validatedData['added_by'];
            $credit_repay->added_date= $validatedData['added_date'];
            $credit_repay->save();

            $credit_repayNew = Tbl_credit_repayments::with(['added_user','credit_pay'])
            ->find($credit_repay->id);

            return response()->json([
                'success' => true,
                'message' => 'Repayment Added Successfully',
                'data' => [
                    'sl_no' => Tbl_credit_repayments::where('credit_pay_id',$validatedData['credit_pay_id'])->count(),
                    'repay_amount' => $credit_repayNew->repay_amount,
                    'repay_date' => $credit_repayNew->repay_date,
                    'added_by' =>  $credit_repayNew->added_user ? $credit_repayNew->added_user->name : null,
                    'added_date' =>$credit_repayNew->added_date,
                    'id' => $credit_repayNew->id,
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to Add Repayment: ' . $e->getMessage(),
            ], 500);
        }
    }
    public function show(Request $request)
    {
       $id=$request->credit_repay_id;
        try {
            $credit_repayment=Tbl_credit_repayments::find($id);
            return Response::json(['success'=>true,'data'=>$credit_repayment]);
        }
        catch (\Exception $e) 
        {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching Repay Details: ' . $e->getMessage()
            ], 500);
        }
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_credit_repayments,id',
            'repay_amount' => 'required|numeric',
            'repay_date' => 'required|date',
        ]);
        $currentUserId = Auth::id();
        $validatedData['edited_by'] = $currentUserId;
        $validatedData['edited_date'] = date('Y-m-d H:i:s');
        $credit_repay=Tbl_credit_repayments::find($validatedData['id']);
        $credit_repay->repay_amount=$validatedData['repay_amount'];
        $credit_repay->repay_date=$validatedData['repay_date'];
        $credit_repay->edited_by=  $validatedData['edited_by'];
        $credit_repay->edited_date= $validatedData['edited_date'];
        $credit_repay->save();

        $added_user=User::find( $credit_repay->added_by);
        $credit_repay->added_by=$added_user->name;
        return response()->json([
            'success' => true,
            'message' => 'Repayment Updated Successfully',
            'data' => $credit_repay ,
        ]);
    }
    public function status_update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:tbl_creditcard_payments,id',
            'status' => 'required|integer|in:0,1',
        ]);
        $validatedData['status_changed_date']=date('Y-m-d');
        $creditcard_pay =Tbl_creditcard_payments::find( $validatedData['id']);
        $creditcard_pay->status=$validatedData['status'];
        $creditcard_pay->save();
        return response()->json([
            'success' => true,
            'message' => 'Payment Status Updated Successfully',
            'data' => $creditcard_pay ,
        ]);
    }
}
