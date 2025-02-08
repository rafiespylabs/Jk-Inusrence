<?php
namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Tbl_countries;
use App\Models\Tbl_states;
use Response;
use Redirect;
use Illuminate\Http\Request;
class StateController extends Controller
{
    public function index()
    {
      $countries=Tbl_countries::all();
      $states=Tbl_states::with('getcountry')->get();
      return view('admin.states',['states'=>$states,'countries'=>$countries]);
    }
    public function store(Request $request)
    {
        if(Tbl_states::where('state',$request->state)
        ->exists())
        {
            return response()->json([
                'success' => false,
                'message' => 'Already Exist This state',
            ]);
        }
        $state=new Tbl_states;
        $state->country_id=$request->country_id;
        $state->state=$request->state;
        $state->save();
        return Response::json([ 'success' => true,'data'=>$state]);
    }
    public function show(Request $request)
    {
        $state_id=$request->state_id;
        $state=Tbl_states::find($state_id);
        return Response::json($state);
    }
    public function update(Request $request)
    {
        if(Tbl_states::where('state',$request->state)
        ->exists())
        {
            return response()->json([
                'success' => false,
                'message' => 'Already Updated This state',
            ]);
        }
        $state_id=$request->state_id;
        $state=Tbl_states::find($state_id);
        $state->country_id=$request->country_id;
        $state->state=$request->state;
        $state->save();
        return Response::json([ 'success' => true,'data'=>$state]);
    }
    public function destroy()
    {

    }
}
