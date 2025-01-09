<?php
namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tbl_leads;
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
        return view('admin.dashboard',['due_payments'=>$due_payments]);
    }
}
