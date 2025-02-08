<?php
namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Tbl_countries;
use App\Models\Tbl_states;
use App\Models\Tbl_districts;
use Response;
use Redirect;
use Illuminate\Http\Request;
class DistrictController extends Controller
{
    public function index()
    {
        $countries=Tbl_countries::all();
        $states=Tbl_states::all();
        $districts=Tbl_districts::with('country','state')->get();
        return view('admin.districts',['states'=>$states,'countries'=>$countries,'districts'=>$districts]);
    }
    public function store(Request $request)
    {
        if(Tbl_districts::where('district',$request->district)
        ->exists())
        {
            return response()->json([
                'success' => false,
                'message' => 'Already Exist This District',
            ]);
        }
        $district=new Tbl_districts;
        $district->country_id=$request->country_id;
        $district->state_id=$request->state_id;
        $district->district=$request->district;
        $district->save();
        return Response::json([ 'success' => true,'data'=>$district]);
    }
    public function show(Request $request)
    {
        $district_id=$request->district_id;
        $district=Tbl_districts::find($district_id);
        return Response::json($district);
    }
    public function update(Request $request)
    {
        if(Tbl_districts::where('district',$request->district)
        ->exists())
        {
            return response()->json([
                'success' => false,
                'message' => 'Already Updated This District',
            ]);
        }
        $district_id=$request->district_id;
        $district=Tbl_districts::find($district_id);
        $district->country_id=$request->country_id;
        $district->state_id=$request->state_id;
        $district->district=$request->district;
        $district->save();
        return Response::json([ 'success' => true,'data'=>$district]);
    }
}
