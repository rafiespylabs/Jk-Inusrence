<?php
namespace App\Http\Controllers;
use App\Models\Tbl_jw_careof_persons;
use App\Models\Tbl_payment_modes;
use App\Models\Tbl_staffs;
use App\Models\Tbl_jw_dayworks;
use App\Models\Tbl_jw_daywork_trans;
use App\Models\Tbl_jw_daypayments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class DayworkController extends Controller
{
    public function index()
    {      
        $careof_persons=Tbl_jw_careof_persons::all();
        $payment_modes=Tbl_payment_modes::all();
        $executives=Tbl_staffs::with('user')->get();
        return view('admin.dayworks',['careof_persons'=>$careof_persons,
        'payment_modes'=>$payment_modes,'executives'=>$executives]);
    }
    public function list(Request $request)
    {
        $limit = $request->input('length', 10);
        $start = $request->input('start', 0);
        $searchValue = $request->input('search.value');
        $query = Tbl_jw_dayworks::query();
        if (!empty($searchValue)) {
            $query->where('name', 'like', '%' . $searchValue . '%');
        }
        $totalRecords =$query->count(); 
        $dayworks = $query->skip($start)
            ->take($limit)
            ->with(['addedByUser', 'editedByUser'])
            ->latest('id')
            ->get();
        $data = [];
        $slNo = $start + 1;
        foreach ($dayworks as $daywork) {
            $createdUser = $daywork->addedByUser->name ?? '';
            $editedUser = $daywork->editedByUser->name ?? ''; 
            $createdDate = $daywork->created_date ? Carbon::parse($daywork->created_date)->format('d/m/Y h:i A') : '';
            $editedDate = $daywork->edited_date ? Carbon::parse($daywork->edited_date)->format('d/m/Y h:i A') : '';
            $editButton = '<button class="btn btn-sm btn-primary edit_careofpersons" onclick="editcareofpersons('.$daywork->id.')" title="Edit">
                            <i class="fa fa-edit"></i>
                          </button>';
            $deleteButton = '<button class="btn btn-sm btn-danger delete_careofperson" onclick="deletecareofpersons('.$daywork->id.')" title="Delete">
                                <i class="fa fa-trash"></i>
                             </button>';
            $add_more_items='<a href="/daywork_trans/'.$daywork->id.'">Add More</a>';
            $data[] = [
                'sl_no' => $slNo++,
                'date' => $daywork->date,
                'name' => $daywork->name,
                'phone_number' => $daywork->phone_number,
                'vehicle_number' => $daywork->vehicle_number,
                'vehicle_name' => $daywork->vehicle_name,
                'add_more_items'=>$add_more_items,
                'added_by' => $createdUser,
                'added_date' => $createdDate,
                'edited_by' => $editedUser,
                'edited_date' => $editedDate,
                'action' => $editButton.' '.$deleteButton,
                'id' => $daywork->id,
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
            'date' => 'required|date|date_format:Y-m-d',
            'name' => 'nullable|string|max:100',
            'phone_number' => 'nullable|string|min:10',
            'vehicle_name' => 'nullable|string|max:100',
            'vehicle_number' => 'nullable|string|max:100',
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
       $daywork=new Tbl_jw_dayworks;
       $daywork->date=$validatedData['date'];
       $daywork->name=$validatedData['name'];
       $daywork->phone_number=$validatedData['phone_number'];
       $daywork->vehicle_name=$validatedData['vehicle_name'];
       $daywork->vehicle_number=$validatedData['vehicle_number'];
       $daywork->created_by=Auth::user()->id;
       $daywork->created_date=Carbon::now();
       $daywork->save();
       $daywork->created_user=Auth::user()->name;
       $daywork->edited_user='';
       $daywork->edited_date='';

        $daywork_trans=new  Tbl_jw_daywork_trans;
        $daywork_trans->day_work_id=$daywork->id;
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

        $daypayment=new  Tbl_jw_daypayments;
        $daypayment->daywork_trans_id=$daywork_trans->id;
        $daypayment->paid_amount=$validatedData['paid_amount'];
        $daypayment->balance_amount=$validatedData['balance_pay'];
        $daypayment->payment_mode_id=$validatedData['payment_mode_id'];
        $daypayment->added_by=Auth::user()->id;
        $daypayment->added_date=Carbon::now();
        $daypayment->save();
        
       return response()->json([
            'success' => true,
            'message' => 'Day Work Added successfully',
            'data' => $daywork,
        ]);
    }
}
