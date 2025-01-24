<?php
namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tbl_leads;
use App\Models\Tbl_leadsources;
use App\Models\Tbl_lead_followups;
use Response;
use Redirect;
class LeadController extends Controller
{
    public function index()
    {
        $leadsources=Tbl_leadsources::all();
       return view('admin.leads',['leadsources'=>$leadsources]);
    }
    public function list()
    {
        $leads=Tbl_leads::with('added_user','lead_source','edited_user')->latest('id')->get();
        $html='';
        $i=1;
        foreach($leads as $lead)
        {
            $added_by=$lead->added_user->name ?? "";
            $edited_by=$lead->edited_user->name ?? "";
            $html.='<tr>';
            $html.='<td>'.$i.'</td>';
            $html.='<td>'.$lead->customer_name.'</td>';
            $html.='<td><a href="/followups/'.$lead->id.'"><i class="fa fa-arrow-up" aria-hidden="true"></i></a></td>';
            $html.='<td>'.$lead->mobile_number.'</td>';
            $html.='<td>'.$lead->vehicle_number.'</td>';
            $html.='<td>'.$lead->vechile_model.'</td>';
            $html.='<td>'.$lead->IDV_value.'</td>';
            $html.='<td>'.$lead->ncb.'</td>';
            $html.='<td>'.$lead->year.'</td>';
            $html.='<td>';
            if($lead->lead_status==1)
            {
                $html.='Started';
            }
            elseif($lead->lead_status==2)
            {
                $html.='In Progress';
            }
            elseif($lead->lead_status==3)
            {
                $html.='Not Need';
            }
            elseif($lead->lead_status==4)
            {
                $html.='Converted';
            }
            $html.='</td>';
            $html.='<td>'.$added_by.'</td>';
            $html.='<td>'.$lead->created_date.'</td>';
            $html.='<td>'.$edited_by.'</td>';
            $html.='<td>'.$lead->edited_date.'</td>';
            $html.='<td><i class="fa fa-edit edit_lead" data-id="'.$lead->id.'" data-bs-toggle="modal" data-bs-target="#EditModal"></i>
            <i class="fa fa-trash delete_lead" data-id="'.$lead->id.'"></i></td>';
            $html.='</tr>';
            $i++;
        }
        return Response::json($html);
    }
    public function store(Request $request)
    {
        $added_by=Auth::user()->id;
        $lead=new Tbl_leads;
        $lead->customer_name=$request->customer_name;
        $lead->mobile_number=$request->mobile_number;
        $lead->vehicle_number=$request->vehicle_number;
        $lead->vehicle_model=$request->vehicle_model;
        $lead->IDV_value=$request->IDV_value;
        $lead->ncb=$request->ncb;
        $lead->year=$request->year;
        $lead->lead_status=$request->lead_status;
        $lead->added_by=$added_by;
        $lead->created_date=date('Y-m-d');
        if($lead->save())
        {
            $followup=new Tbl_lead_followups;
            $followup->lead_id=$lead->id;
            $followup->call_description=$request->call_description;
            $followup->next_followup_date=$request->next_followup_date;
            $followup->status=$request->lead_status;
            $followup->save();
        }
        return Response::json([ 'success' => true]);
    }
    public function show(Request $request)
    {
       $lead_id=$request->lead_id;
       $lead=Tbl_leads::find($lead_id);
       return Response::json($lead);
    }
    public function update(Request $request)
    {
        $lead_id=$request->lead_id;
        $edited_by=Auth::user()->id;
        $lead=Tbl_leads::find($lead_id);
        $lead->customer_name=$request->customer_name;
        $lead->mobile_number=$request->mobile_number;
        $lead->vehicle_number=$request->vehicle_number;
        $lead->vehicle_model=$request->vehicle_model;
        $lead->IDV_value=$request->IDV_value;
        $lead->ncb=$request->ncb;
        $lead->year=$request->year;
        $lead->edited_by=$edited_by;
        $lead->edited_date=date('Y-m-d');
        $lead->save();
        return Response::json(['success' => true,'data'=>$lead]);
    }
    public function destroy(Request $request)
    {
        $lead_id=$request->lead_id;
        $lead=Tbl_leads::find($lead_id);
        $lead->delete();
        return Response::json([ 'success' => true]);
    }
}
