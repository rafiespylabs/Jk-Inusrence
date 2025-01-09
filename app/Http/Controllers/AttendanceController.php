<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tbl_attendances;
use Yajra\DataTables\Facades\DataTables;
use Response;
use Redirect;
class AttendanceController extends Controller
{
    public function index()
    {
        return view('admin.attendances');
    }
    public function list()
    {
        $attendances=Tbl_attendances::with('staff','added_user')->get();
        $html='';
        $i=1;
        foreach($attendances as $attend)
        {
            $added_by=$attend->added_user->name??'';
            $punch_in_time=date("h:i A", strtotime($attend->punch_in_time));
            $punch_out_time=date("h:i A", strtotime($attend->punch_out_time));
            $html.='<tr>';
            $html.='<td>'.$i.'</td>';
            $html.='<td>'.$attend->staff->name.'</td>';
            $html.='<td>'.$punch_in_time.'</td>';
            $html.='<td><a href="https://www.google.com/maps/search/?api=1&amp;query='.$attend->longitude_punchin.','.$attend->lattitude_punchin.'" target="_blank">Map</a></td>';
            $html.='<td><img src="uploads/'.$attend->punchinimage.'" style="width:200px;"></td>';
            $html.='<td>'.$punch_out_time.'</td>';
            $html.='<td><a href="https://www.google.com/maps/search/?api=1&amp;query='.$attend->punchout_long.','.$attend->punchout_lat.'" target="_blank">Map</a></td>';
            $html.='<td><img src="uploads/'.$attend->punchoutimage.'" style="width:200px;"></td>';
            $html.='<td>'.$attend->date.'</td>';
            $html.='<td>'.$added_by.'</td>';
            $html.='</tr>';
            $i++;
        }
        return Response::json($html);
    }
}
