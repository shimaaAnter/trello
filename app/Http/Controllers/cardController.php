<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\boarde;
use  App\Models\the_list;
use App\Models\card;
use Illuminate\Support\Facades\Auth;

class cardController extends Controller
{
    public function create($id){
        $list=the_list::find($id);
        return view('cards.newcard',compact('list'));
    }
    public function store(Request $request,$id){

        $card=card::create([
    'text'=>$request->text,
    'description'=>$request->description,
    'description_photo'=>$request->description_photo,
    'photo'=>$request->photo,
    'color'=>$request->color,
    'position'=>$request->position,
    'start_time'=>$request->start_time,
    'end_time'=>$request->end_time,
    'completed'=>($request->completed)?true:false,
    'user_id'=> Auth::user()->id,
    'lest_id'=>$id, ]);
            return  redirect()->route('details.card',$id)->with('success','card is created');
        }
        public function ShowEdite($id){
            $card=card::find($id);
            return view('cards.editecard',compact('card'));
        }
    public function edite( Request $request,$id){
        $card=card::find($id);
        $card->update(
            [
                    'text'=>$request->text,
                    'description'=>$request->description,
                    'description_photo'=>$request->description_photo,
                    'photo'=>$request->photo,
                    'color'=>$request->color,
                    'position'=>$request->position,
                    'start_time'=>$request->start_time,
                    'end_time'=>$request->end_time,
                    'completed'=>($request->completed)?true:false,
                    
            ]);
          return  redirect()->route('details.card',$card->lest_id)->with('success','card is updated');
           //return redirect()->back();
    }
    public function delete( $id){
        $card=card::find($id);
        $card->delete();
            return  redirect()->route('details.card',$card->lest_id)->with('success','card is deleted');
}
public function detailslists($id){
    $list=the_list::find($id);
    $cards=card::where('lest_id',$id)->get()->all();
    return view('cards.showcards',compact('cards' , 'list'));
}

}

