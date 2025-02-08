<?php

namespace App\Http\Controllers;

use App\Models\Tbl_insurence_providers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Response;

class InsuranceproviderController extends Controller
{
    public function index(){
        return view('admin.insuranceproviders');
    }

    public function list()
    {
        $insuranceproviders = Tbl_insurence_providers::with('created_user')->latest('id')->get(); 
        $html = '';
        $i = 1;
    
        foreach ($insuranceproviders as $insuranceprovider) {
            $created_by = $insuranceprovider->created_user->name ?? '';
            $created_date = $insuranceprovider->created_date ? Carbon::parse($insuranceprovider->created_date)->format('d/m/Y') : '';
    
            $html .= '<tr>';
            $html .= '<td>' . $i . '</td>';
            $html .= '<td>' . e($insuranceprovider->provider_name) . '</td>';
            $html .= '<td>' . e($insuranceprovider->address) . '</td>';
            $html .= '<td>' . e($insuranceprovider->company_name) . '</td>';
            $html .= '<td>' . $created_date . '</td>';
            $html .= '<td>' . $created_by . '</td>';
            $html .= '<td>
                <i class="fa fa-edit edit_insuranceproviders" data-id="' . e($insuranceprovider->id) . '" data-bs-toggle="modal" data-bs-target="#EditModal"></i>
                </i>
            </td>';
            $html .= '</tr>';
            $i++;
        }
    
        return response()->json($html);
    }
    

    public function store(Request $request)
    {
        if( Tbl_insurence_providers::where('provider_name',$request->provider_name)
        ->exists())
        {
            return response()->json([
                'success' => false,
                'message' => 'Already Exist This Provider',
            ]);
        }
        $created_by=Auth::user()->id;
        $created_date=date('Y-m-d');
        $insuranceprovider=new Tbl_insurence_providers();
        $insuranceprovider->provider_name=$request->provider_name;
        $insuranceprovider->address=$request->address;
        $insuranceprovider->company_name=$request->company_name;      
        $insuranceprovider->created_by=$created_by;
        $insuranceprovider->created_date=$created_date;
        $insuranceprovider->save();
        return Response::json([ 'success' => true,'message'=>'Insurance provider Created  Successfully']);
    }


    public function show(Request $request)
    {
        $insuranceproviders_id = $request->insuranceproviders_id;  
    
        $insuranceprovider = Tbl_insurence_providers::with('created_user')->find($insuranceproviders_id);
        if ($insuranceprovider) {
            return response()->json([
                'provider_name' => $insuranceprovider->provider_name,
                'address' => $insuranceprovider->address,
                'company_name' => $insuranceprovider->company_name,
                'created_by' => $insuranceprovider->created_user->name ?? '',
           
            ]);
        } else {
            return response()->json(['error' => 'Insurance provider not found'], 404);
        }
    }


    public function update(Request $request)
    {
        if( Tbl_insurence_providers::where('provider_name',$request->provider_name)
        ->exists())
        {
            return response()->json([
                'success' => false,
                'message' => 'Already Updated This Provider',
            ]);
        }
        $insuranceproviders_id=$request->insuranceproviders_id;
        $insuranceproviders=Tbl_insurence_providers::find($insuranceproviders_id);
        $insuranceproviders->provider_name=$request->provider_name;
        $insuranceproviders->address=$request->address;
        $insuranceproviders->company_name=$request->company_name;       
        $insuranceproviders->save();
        return Response::json([ 'success' => true,'message'=>'Insurance providers Updated Successfully']);
    }

    public function destroy(Request $request)
    {
        $insuranceproviders_id = $request->insuranceproviders_id;
        $insuranceprovider = Tbl_insurence_providers::find($insuranceproviders_id);
        if (!$insuranceprovider) {
            return response()->json(['success' => false, 'message' => 'Insurance provider not found']);
        }
        $user = User::find($insuranceprovider->created_by);  
        $insuranceprovider->delete();
        if ($user) {
            $user->delete();
        }
        return response()->json(['success' => true]);
    }

}
