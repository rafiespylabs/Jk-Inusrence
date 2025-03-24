<?php
namespace App\Http\Controllers;
use App\Models\Tbl_jw_daywork_trans;
use App\Models\Tbl_jw_daypayments;
use App\Models\Tbl_payment_modes;
use App\Models\Tbl_staffs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class DayworkPaymentsController extends Controller
{
   public function index($daywork_trans_id)
   {
    $payment_modes= Tbl_payment_modes::all();
     return view('admin.daywork_payments',['daywork_trans_id'=>$daywork_trans_id,
     'payment_modes'=>$payment_modes]);
   }
   public function list(Request $request)
   {
    $limit = $request->input('length', 10);
    $start = $request->input('start', 0);
    $searchValue = $request->input('search.value');
    $daywork_trans_id = $request->input('daywork_trans_id',null);
    $query =Tbl_jw_daypayments::query();
    if (!empty($searchValue)) {
        $query->where('paid_amount', 'like', '%' . $searchValue . '%');
    }
    if (!empty($daywork_trans_id)) {
        $query->where('daywork_trans_id', $daywork_trans_id);
    }
    $totalRecords =$query->count(); 
    $daywork_payments = $query->skip($start)
        ->take($limit)
        ->with(['addedByUser','editedByUser','payment_mode'])
        ->latest('id')
        ->get();
    $data = [];
    $slNo = $start + 1;
    foreach ($daywork_payments as $pay) {
        $createdUser = $pay->addedByUser->name ?? '';
        $editedUser = $pay->editedByUser->name ?? ''; 
        $createdDate = $pay->added_date ? Carbon::parse($pay->added_date)->format('d/m/Y h:i A') : '';
        $editedDate = $pay->edited_date ? Carbon::parse($pay->edited_date)->format('d/m/Y h:i A') : '';
        $editButton = '<button class="btn btn-sm btn-primary edit_careofpersons" onclick="editcareofpersons('.$pay->id.')" title="Edit">
                        <i class="fa fa-edit"></i>
                      </button>';
        $deleteButton = '<button class="btn btn-sm btn-danger delete_careofperson" onclick="deletecareofpersons('.$pay->id.')" title="Delete">
                            <i class="fa fa-trash"></i>
                         </button>';
       
        $data[] = [
            'sl_no' => $slNo++,
            'paid_amount' =>  $pay->paid_amount,
            'balance_amount' =>  $pay->balance_amount,
            'payment_mode' =>$pay->payment_mode->payment_mode ?? '',
            'added_by' => $createdUser,
            'added_date' => $createdDate,
            'edited_by' => $editedUser,
            'edited_date' => $editedDate,
            'action' => $editButton.' '.$deleteButton,
            'id' => $pay->id,
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
        $validatedData = $request->validate([
            'daywork_trans_id'=>'required|exists:tbl_jw_daywork_trans,id',
            'paid_amount' => 'required|numeric|min:0',
            'balance_amount' => 'required|numeric|min:0',
            'payment_mode_id' => 'required|exists:tbl_payment_modes,id',
        ]);
        $all_daypayments=Tbl_jw_daypayments::where('daywork_trans_id',$validatedData['daywork_trans_id'])->get();
        $total_paid_value=0;
        foreach($all_daypayments as $all_pay)
        {
            $total_paid_value+=$all_pay->paid_amount;
        }
        $total_paid_amount=$total_paid_value+floatval($validatedData['paid_amount']);
        
        $daywork_trans=Tbl_jw_daywork_trans::find($validatedData['daywork_trans_id']);
        $daywork_trans->paid_amount=$total_paid_amount;
        $daywork_trans->balance_pay= ($daywork_trans->total_amount-$total_paid_amount);
        $daywork_trans->save();

        $daypayment=new  Tbl_jw_daypayments;
        $daypayment->daywork_trans_id=$validatedData['daywork_trans_id'];
        $daypayment->paid_amount=$validatedData['paid_amount'];
        $daypayment->balance_amount=$validatedData['balance_amount'];
        $daypayment->payment_mode_id=$validatedData['payment_mode_id'];
        $daypayment->added_by=Auth::user()->id;
        $daypayment->added_date=Carbon::now();
        $daypayment->save();

        $payment_mode=Tbl_payment_modes::find($validatedData['payment_mode_id']);
        $daypayment->payment_mode=$payment_mode->payment_mode;
        $daypayment->added_user=Auth::user()->name;

       return response()->json([
            'success' => true,
            'message' => 'Payment Added successfully',
            'data' => $daypayment,
        ]);
   }
}
