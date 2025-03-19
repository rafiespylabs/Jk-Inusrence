<?php
namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tbl_leads;
use App\Models\Tbl_attendances;
use App\Models\Tbl_policyholders;
use App\Models\Tbl_healthpolicy;
use App\Models\Tbl_other_policies;
use App\Models\Tbl_creditcard_payments;
use Carbon\Carbon;
use Response;
use Redirect;
use Hash;
class AdminController extends Controller
{
    public function index()
    {
        $user_id=Auth::user()->id;
        $oneWeekLater = Carbon::now()->addWeek();
        $due_payments=Tbl_creditcard_payments::with('added_user','card')
        ->where('due_date', '<=', $oneWeekLater)
        ->where(function ($query) {
            $query->whereNull('status')
                  ->orWhere('status', 0);
        })->get();
        $todayAttendanceCount = Tbl_attendances::whereDate('date', Carbon::now()->toDateString())->count();
        $todayMotorpolicyCount = Tbl_policyholders::whereDate('created_date', Carbon::now()->toDateString())->count();
        $todayHealthpolicyCount = Tbl_healthpolicy::whereDate('created_date', Carbon::today())->count();
        $todayOtherpolicyCount = Tbl_other_policies::whereDate('created_date', Carbon::today())->count();
        $dueMotorpolicyCount = Tbl_policyholders::where('status', 0)->count();
        $dueHealthpolicyCount = Tbl_healthpolicy::where('status',0)->count();
        $dueOtherpolicyCount = Tbl_other_policies::where('status', 0)->count();
        $paidMotorpolicyCount = Tbl_policyholders::where('status', 1)->count();
        $paidHealthpolicyCount = Tbl_healthpolicy::where('status',1)->count();
        $paidOtherpolicyCount = Tbl_other_policies::where('status', 1)->count();
        return view('admin.dashboard',
        ['due_payments'=>$due_payments,
        'todayAttendanceCount'=>$todayAttendanceCount,
        'todayMotorpolicyCount'=>$todayMotorpolicyCount,
        'todayHealthpolicyCount'=>$todayHealthpolicyCount,
        'todayOtherpolicyCount'=>$todayOtherpolicyCount,
        'dueMotorpolicyCount'=>$dueMotorpolicyCount,
        'dueHealthpolicyCount'=>$dueHealthpolicyCount,
        'dueOtherpolicyCount'=>$dueOtherpolicyCount,
        'paidMotorpolicyCount'=>$paidMotorpolicyCount,
        'paidHealthpolicyCount'=>$paidHealthpolicyCount,
        'paidOtherpolicyCount'=>$paidOtherpolicyCount
]);
    }
}
