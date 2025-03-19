<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tbl_policyholders;
use App\Models\Tbl_payments;  
use App\Models\Tbl_vehiclepolicy_renews;  
use Redirect;
use DB;
use Auth;
use Hash;
use DataTables;
class MotorVehicleReportController extends Controller
{
    public function index(){
        return view('admin.reports.motorvehicle_report');
    }
    public function report(Request $request)
    {
        $query = Tbl_policyholders::with([
            'added_executive', 'vehicle_model', 'company', 'agent', 
            'prepared_user', 'dealer', 'payment_mode', 'reffered', 'insurence_provider'
        ])->latest('id');

        $startDate = $request->get('start_date', date('Y-m-01')); 
        $endDate = $request->get('end_date', date('Y-m-d')); 
    
        if ($startDate && $endDate) {
            $query->whereBetween('created_date', [$startDate, $endDate]);
        }
        
        $start = $request->get('start', 0); 
        $length = $request->get('length', 10); 
        
        $totalRecords = Tbl_policyholders::whereBetween('created_date', [$startDate, $endDate])->count(); 

        $totalPremiumAmount = $query->sum('premium_amount');
        
        $policyholders = $query->skip($start)->take($length)->get();
    
        return response()->json([
            'draw' => $request->get('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'totalPremiumAmount' => $totalPremiumAmount,
            'data' => $policyholders->map(function($holder) {
                $renew_created_by=Tbl_vehiclepolicy_renews::with('added_user')->where('policy_id',$holder->id)->first();
                $created_by=$renew_created_by->added_user->name ?? "";
                return [
                    'DT_RowIndex' => '',
                    'name' => $holder->name ?? '',
                    'vehicle_number' => $holder->vehicle_number??'',
                    'primary_number' => $holder->primary_number??'',
                    'added_executive' => $holder->added_executive->name ?? '',
                    'paid_amount' => $holder->paid_amount ?? '',
                    'due_amount' => $holder->due_amount ?? '',
                    'secondary_number' => $holder->secondary_number ?? '',
                    'vehicle_model' => $holder->vehicle_model->model ?? '',
                    'company' => $holder->company->company ?? '',
                    'agent' => $holder->agent->agent_name ?? '',
                    'dealer' => $holder->dealer->dealer_name ?? '',
                    'prepared_by' => $holder->prepared_user->name ?? '',
                    'payment_mode' => $holder->payment_mode->payment_mode ?? '',
                    'referred_person' => $holder->reffered->name ?? '',
                    'start_date' => $holder->start_date ?? '',
                    'expiry_date' => $holder->expiry_date ?? '',
                    'valuation_amount' => $holder->valuation_amount ?? '',
                    'total_cost' => $holder->total_cost ?? '',  
                    'created_date' => $holder->created_date ?? '',
                    'assigned_date' => $holder->assigned_date ?? '',
                    'created_by' => $created_by ?? '',
                    'insurance_provider' => $holder->insurence_provider->provider_name ?? '',
                    'premium' => $holder->premium_amount ?? 0,
                    'customer_premium' => $holder->customer_premium_amount ?? 0,
                    'total_paid_amount' => Tbl_payments::where('policy_id', $holder->id)->where('policy_cat_id', 9)->sum('paid_amount'),
                    'balance_amount' => $holder->premium_amount - Tbl_payments::where('policy_id', $holder->id)->where('policy_cat_id', 9)->sum('paid_amount'),
                    'payment_status' => $this->getPaymentStatus($holder),
                    'policy_mode' => $holder->policy_mode == 1 ? '<span class="badge badge-success">New</span>' : '<span class="badge badge-secondary">Renewal</span>',
                    'assign_staff' => '<i class="fa fa-user-plus assign_staff" data-id="'.$holder->id.'" data-bs-toggle="modal" data-bs-target="#AssignModal"></i>',
                    'actions' => '
                        <a href="/policypayments/9/'.$holder->id.'" class="btn btn-danger btn-xs"><i class="fas fa-wallet"></i> Pay Now</a>
                        <a href="/purchase_cards/9/'.$holder->id.'" class="btn btn-black btn-xs"><i class="fa fa-archive"></i> Purchase Card</a>
                        <a href="/vehicle_policydocuments/'.$holder->id.'" class="btn btn-primary btn-xs"><i class="fa fa-file"></i> Documents</a>
                        <a href="/vechicle_policyrenews/'.$holder->id.'" class="btn btn-primary btn-xs"><i class="fa fa-sync"></i> Renew</a>
                    ',
                ];
            })
        ]);
    }
    
    private function getPaymentStatus($holder)
    {
        $premium = $holder->premium_amount ?? 0;
        $total_paid_amount = Tbl_payments::where('policy_id', $holder->id)->where('policy_cat_id', 9)->sum('paid_amount');
    
        if ($total_paid_amount == 0) {
            return '<span class="badge badge-warning">Not Paid</span>';
        } elseif ($total_paid_amount != 0 && $premium != $total_paid_amount) {
            return '<span class="badge badge-danger">Partial Paid</span>';
        } else {
            return '<span class="badge badge-success">Full Paid</span>';
        }
    }
}