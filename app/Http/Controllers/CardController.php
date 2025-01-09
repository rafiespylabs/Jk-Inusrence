<?php
namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tbl_cards;
use Response;
use Redirect;
class CardController extends Controller
{
    public function index()
    {
        return view('admin.cards');
    }
    public function list()
    {
        $cards=Tbl_cards::get();
        $html='';
        $i=1;
        foreach($cards as $card)
        {
            $added_by=$card->added_user->name??'';
            $html.='<tr>';
            $html.='<td>'.$i.'</td>';
            $html.='<td>'.$card->holder_name.'</td>';
            $html.='<td>'.$card->expiry_date.'</td>';
            $html.='<td>'.$card->bank.'</td>';
            $html.='<td>'.$added_by.'</td>';
            $html.='<td>'.$card->created_date.'</td>';
             $html.='<td>';
            $html.='<i class="fa fa-edit edit_card" data-id="'.$card->id.'" data-bs-toggle="modal" data-bs-target="#EditModal"></i>';
            // $html.='<i class="fa fa-trash delete_card" data-id="'.$card->id.'"></i>';
            $html.='</td>';
            $html.='</tr>';
            $i++;
        }
        return Response::json($html);
    }
    public function store(Request $request)
    {
       $created_by=Auth::user()->id;
       $card=new Tbl_cards;
       $card->holder_name=$request->holder_name;
       $card->expiry_date=$request->expiry_date;
       $card->bank=$request->bank;
       $card->created_by=$created_by;
       $card->created_date=date('Y-m-d');
       $card->save();
       return Response::json([ 'success' => true]);
    }
    public function show(Request $request)
    {
        $card_id=$request->card_id;
        $card=Tbl_cards::find($card_id);
        return Response::json($card);
    }
    public function update(Request $request)
    {
        $card_id=$request->card_id;
        $card=Tbl_cards::find($card_id);
        $card->holder_name=$request->holder_name;
        $card->expiry_date=$request->expiry_date;
        $card->bank=$request->bank;
        $card->save();
        return Response::json([ 'success' => true]);
    }
}
