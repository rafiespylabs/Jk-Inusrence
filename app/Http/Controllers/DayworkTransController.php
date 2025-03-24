<?php
namespace App\Http\Controllers;
use App\Models\Tbl_jw_careof_persons;
use App\Models\Tbl_jw_daywork_trans;
use App\Models\Tbl_jw_daypayments;
use App\Models\Tbl_payment_modes;
use App\Models\Tbl_staffs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class DayworkTransController extends Controller
{
    public function index($daywork_id)
    {
        $payment_modes=Tbl_payment_modes::all();
        $executives=Tbl_staffs::with('user')->get();
        $careof_persons=Tbl_jw_careof_persons::all();
      return view('admin.daywork_trans',['daywork_id'=>$daywork_id,
      'careof_persons'=>$careof_persons,'payment_modes'=>$payment_modes,'executives'=>$executives]);
    }
    public function list(Request $request)
    {
        $limit = $request->input('length', 10);
        $start = $request->input('start', 0);
        $searchValue = $request->input('search.value');
        $daywork_id = $request->input('daywork_id',null);
        $query =Tbl_jw_daywork_trans::query();
        if (!empty($searchValue)) {
            $query->where('particular', 'like', '%' . $searchValue . '%');
        }
        if (!empty($daywork_id)) {
            $query->where('day_work_id', $daywork_id);
        }
        $totalRecords =$query->count(); 
        $daywork_trans = $query->skip($start)
            ->take($limit)
            ->with(['addedByUser','editedByUser','payment_mode','care_of_person','excutive'])
            ->latest('id')
            ->get();
        $data = [];
        $slNo = $start + 1;
        foreach ($daywork_trans as $trans) {
            $createdUser = $trans->addedByUser->name ?? '';
            $editedUser = $trans->editedByUser->name ?? ''; 
            $createdDate = $trans->added_date ? Carbon::parse($trans->added_date)->format('d/m/Y h:i A') : '';
            $editedDate = $trans->edited_date ? Carbon::parse($trans->edited_date)->format('d/m/Y h:i A') : '';
            $editButton = '<button class="btn btn-sm btn-primary edit_careofpersons" onclick="editcareofpersons('.$trans->id.')" title="Edit">
                            <i class="fa fa-edit"></i>
                          </button>';
            $deleteButton = '<button class="btn btn-sm btn-danger delete_careofperson" onclick="deletecareofpersons('.$trans->id.')" title="Delete">
                                <i class="fa fa-trash"></i>
                             </button>';
            $type='';
            if($trans->type==1)
            {
                $type='Service';
            }
            else if($trans->type==2)
            {
                $type='Accessories';
            }
            $status='';
            if($trans->payment_status==0)
            {
                $status='Not Paid';
            }
            else if($trans->payment_status==1)
            {
                $status='Partial Paid';
            }
            else if($trans->payment_status==2)
            {
                $status='Full Paid';
            }
            $payment='<a href="/daywork_payments/'.$trans->id.'" class="btn btn-secondary btn-xs">Pay <i class="fa fa-arrow-right"></i></a>';
            $data[] = [
                'sl_no' => $slNo++,
                'type' => $type,
                'particular' =>  $trans->particular,
                'quantity' =>  $trans->quantity,
                'price' =>$trans->price,
                'total_amount' =>$trans->total_amount,
                'paid_amount' =>$trans->paid_amount,
                'balance_pay' =>$trans->balance_pay,
                'payment_mode' =>$trans->payment_mode->payment_mode ?? '',
                'payment_status'=>$status,
                'care_of_person' =>$trans->care_of_person->careof_person ?? '',
                'excutive' =>$trans->excutive->name ?? '',
                'payment'=>$payment,
                'added_by' => $createdUser,
                'added_date' => $createdDate,
                'edited_by' => $editedUser,
                'edited_date' => $editedDate,
                'action' => $editButton.' '.$deleteButton,
                'id' => $trans->id,
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
            'daywork_id'=>'required|exists:tbl_jw_dayworks,id',
            'type' => 'required|integer|in:1,2',
            'particular' => 'required|string|max:1000',
            'quantity' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'paid_amount' => 'required|numeric|min:0',
            'balance_pay' => 'required|numeric|min:0',
            'payment_mode_id' => 'required|exists:tbl_payment_modes,id',
            'careof_person_id' => 'required|exists:tbl_jw_careof_persons,id',
            'executive_id' => 'required|exists:users,id',
            'payment_status' => 'required|integer|in:0,1,2',
        ]);
        $daywork_trans=new  Tbl_jw_daywork_trans;
        $daywork_trans->day_work_id=$validatedData['daywork_id'];
        $daywork_trans->type=$validatedData['type'];
        $daywork_trans->particular=$validatedData['particular'];
        $daywork_trans->quantity=$validatedData['quantity'];
        $daywork_trans->price=$validatedData['price'];
        $daywork_trans->total_amount=($validatedData['quantity']*$validatedData['price']);
        $daywork_trans->paid_amount=$validatedData['paid_amount'];
        $daywork_trans->balance_pay=$validatedData['balance_pay'];
        $daywork_trans->payment_mode_id=$validatedData['payment_mode_id'];
        $daywork_trans->care_of_person_id=$validatedData['careof_person_id'];
        $daywork_trans->executive_id=$validatedData['executive_id'];
        $daywork_trans->added_by=Auth::user()->id;
        $daywork_trans->added_date=Carbon::now();
        $daywork_trans->save();

        $daypayment=new Tbl_jw_daypayments;
        $daypayment->daywork_trans_id= $daywork_trans->id;
        $daypayment->paid_amount=$validatedData['paid_amount'];
        $daypayment->balance_amount=$validatedData['balance_pay'];
        $daypayment->payment_mode_id=$validatedData['payment_mode_id'];
        $daypayment->added_by=Auth::user()->id;
        $daypayment->added_date=Carbon::now();
        $daypayment->save();
        
       return response()->json([
            'success' => true,
            'message' => 'Item Added successfully',
            'data' => $daywork_trans,
        ]);
    }
}
