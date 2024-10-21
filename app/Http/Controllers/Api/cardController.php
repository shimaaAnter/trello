<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\card;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\cardResource;

class cardController extends Controller
{
    public function create(Request $request,$id){
        if($request->photo){
            $file = $request->file('photo');
                 $ext = $file->getClientOriginalName();
                 $filename = "board-" . uniqid() . ".$ext";
                 $file->move(public_path('images/board_image'), $filename);
             }
             else {
                 $filename=null;
             }
        $card=card::create([

            'text'=>($request->text)?$request->text:null,
            'description'=>($request->description)?$request->description:null,
            'description_photo'=>($request->description_photo)?$request->description_photo:null,
            'colcoloror'=>($request->color)?$request->color:null,
            'position'=>($request->position)?$request->position:null,
            'start_time'=>($request->start_time)?$request->start_time:null,
            'end_time'=>($request->end_time)?$request->end_time:null,
            'completed'=>($request->completed)?$request->completed:null,
            'photo'=>$filename,
            'user_id'=>Auth::guard('api')->user()->id,
            'lest_id'=>$id]);
            return response()->json([
                'success' => true,
                'message' => 'success store data',
                'result' => new cardResource($card)
            ]);
        }
    public function Edite(Request $request,$id){
        $card=card::find($id);
        if($request->photo){
            $file = $request->file('photo');
                 $ext = $file->getClientOriginalName();
                 $filename = "board-" . uniqid() . ".$ext";
                 $file->move(public_path('images/card_image'), $filename);
             }
             else {
                 $filename=$card->photo;
             }
        $card->update([

            'text'=>($request->text)?$request->text:$card->text,
            'description'=>($request->description)?$request->description:$card->description,
            'description_photo'=>($request->description_photo)?$request->description_photo:$card->description_photo,
            'colcoloror'=>($request->color)?$request->color:$card->color,
            'position'=>($request->position)?$request->position:$card->position,
            'start_time'=>($request->start_time)?$request->start_time:$card->start_time,
            'end_time'=>($request->end_time)?$request->end_time:$card->end_time,
            'completed'=>($request->completed)?$request->completed:$card->completed,
            'photo'=>$filename,
        ]);
            return response()->json([
                'success' => true,
                'message' => 'success store data',
                'result' => new cardResource($card)
            ]);
        }
    public function delete($id){

        $result =  card::find($id);
        if(!$result){
            return response()->json([
                'success' => false,
                'message' => 'data not found',
            ]);
        }
        $result->delete();
        return response()->json([
            'success' => true,
            'message' => 'success deleted data',
            'result' => $result
        ]);
        }
public function showAll($id){
    $cards =  card::where('lest_id',$id)->get()->all();
    if(!$cards){
        return response()->json([
            'success' => true,
            'message' => 'not found any card',

        ]);
    }
    foreach ($cards as $card) {
        # code...
        $arr[]=new cardResource($card);
    }
    return response()->json([
        'success' => true,
        'message' => 'success store data',
        'result' =>  $arr
    ]);
}
public function move($id,$new_list){
    $card =  card::find($id);
    $card->update([
        'lest_id'=>$new_list
    ]);
    return response()->json([
        'success' => true,
        'message' => 'success store data',
        'result' => new cardResource($card)
    ]);
}
}
