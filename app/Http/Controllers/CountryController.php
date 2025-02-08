<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Tbl_countries;
use Response;
use Redirect;
class CountryController extends Controller
{
    public function index()
    {
        $countries=Tbl_countries::all();
        return view('admin.countries',['countries'=>$countries]);
    }
    public function store(Request $request)
    {
        if(Tbl_countries::where('country',$request->country)
        ->exists())
        {
            return response()->json([
                'success' => false,
                'message' => 'Already Exist This country',
            ]);
        }
        $country=new Tbl_countries;
        $country->country=$request->country;
        $country->save();
        return Response::json([ 'success' => true,'data'=>$country]);
    }
    public function show(Request $request)
    {
        $country_id=$request->country_id;
        $country=Tbl_countries::find($country_id);
        return Response::json($country);
    }
    public function update(Request $request)
    {
        if(Tbl_countries::where('country',$request->country)
        ->exists())
        {
            return response()->json([
                'success' => false,
                'message' => 'Already Added This country',
            ]);
        }
        $country_id=$request->country_id;
        $country=Tbl_countries::find($country_id);
        $country->country=$request->country;
        $country->save();
        return Response::json([ 'success' => true,'data'=>$country]);
    }
    public function destroy()
    {

    }
}
