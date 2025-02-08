<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tbl_companies;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Response;
use Redirect;
class CompanyController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $companies=Tbl_companies::latest('id')->get();
            return Response::json($companies);
        }
        return view('admin.companies');
    }
    public function list()
    {
        $companies=Tbl_companies::with('added_user')->get();
        $html='';
        $i=1;
        foreach($companies as $company)
        {
            $added_by=$company->added_user->name??'';
            $html.='<tr>';
            $html.='<td>'.$i.'</td>';
            $html.='<td>'.$company->company.'</td>';
            $html.='<td>'.$company->phone.'</td>';
            $html.='<td>'.$added_by.'</td>';
            $html.='<td>'.$company->created_date.'</td>';
            $html.='<td><i class="fa fa-edit edit_company" data-id="'.$company->id.'" data-bs-toggle="modal" data-bs-target="#EditModal"></i>';
            // $html.='<i class="fa fa-trash delete_company" data-id="'.$company->id.'"></i>';
            $html.='</td>';
            $html.='</tr>';
            $i++;
        }
        return Response::json($html);
    }
    public function store(Request $request)
    {
        if(Tbl_companies::where('company',$request->company)
        ->orWhere('phone', $request->phone)
        ->exists())
        {
            return response()->json([
                'success' => false,
                'message' => 'Already exist This Company or Phone',
            ]);
        }
        $created_by=Auth::user()->id;
        $company=new Tbl_companies;
        $company->company=$request->company;
        $company->phone=$request->phone;
        $company->created_by=$created_by;
        $company->created_date=date('Y-m-d');
        $company->save();
        return Response::json([ 'success' => true,'message'=>'Successfully Created Company']);
    }
    public function show(Request $request)
    {
       $company_id=$request->company_id;
       $company=Tbl_companies::find($company_id);
       return Response::json($company);
    }
    public function update(Request $request)
    {
        if(Tbl_companies::where('company',$request->company)
        ->orWhere('phone', $request->phone)
        ->exists())
        {
            return response()->json([
                'success' => false,
                'message' => 'Already Updated This Company or Phone',
            ]);
        }
       $company_id=$request->company_id;
       $company=Tbl_companies::find($company_id);
       $company->company=$request->company;
       $company->phone=$request->phone;
       $company->save();
       return Response::json([ 'success' => true]);
    }
}