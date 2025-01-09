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
class FollowupController extends Controller
{
    public function index($lead_id)
    {
        $lead=Tbl_leads::find($lead_id);
        return view('admin.followups',['lead_id'=>$lead_id,'lead'=>$lead]);
    }
    public function list($lead_id)
    {
        $followups=Tbl_lead_followups::with('lead')->where('lead_id',$lead_id)->latest('id')->get();
        $html='';
        $i=1;
        foreach($followups as $follow)
        {
            $html.='<tr>';
            $html.='<td>'.$i.'</td>';
            $html.='<td>'.$follow->lead->name.'</td>';
            $html.='<td>'.$follow->call_description.'</td>';
            $html.='<td>'.$follow->next_followup_date.'</td>';
            $html.='<td>';
            if($follow->status==1)
            {
                $html.='Started';
            }
            elseif($follow->status==2)
            {
                $html.='In Progress';
            }
            elseif($follow->status==3)
            {
                $html.='Not Need';
            }
            elseif($follow->status==4)
            {
                $html.='Converted';
            }
            $html.='</td>';
            $html.='<td><i class="fa fa-edit edit_follow" data-id="'.$follow->id.'" data-bs-toggle="modal" data-bs-target="#EditModal"></i></td>';
            $html.='</tr>';
            $i++;
        }
        return Response::json($html);
    }
    public function store(Request $request)
    {
        $lead_id=$request->lead_id;
        $followup=new Tbl_lead_followups;
        $followup->lead_id=$lead_id;
        $followup->call_description=$request->call_description;
        $followup->next_followup_date=$request->next_followup_date;
        $followup->status=$request->status;
        if($followup->save())
        {
            $lead=Tbl_leads::find($lead_id);
            $lead->lead_status=$request->status;
            $lead->save();
        }
        return Response::json([ 'success' => true]);
    }
    public function show(Request $request)
    {
        $follow_id=$request->follow_id;
        $followup=Tbl_lead_followups::find($follow_id);
        return Response::json($followup);
    }
    public function update(Request $request)
    {
        $follow_id=$request->follow_id;
        $followup=Tbl_lead_followups::find($follow_id);
        $followup->call_description=$request->call_description;
        $followup->next_followup_date=$request->next_followup_date;
        $followup->status=$request->status;
        $followup->save();
        return Response::json([ 'success' => true,'data'=>$followup]);
    }
}
