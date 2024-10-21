<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\the_list;
use App\Http\Resources\listResource;

class listController extends Controller
{
    public function create(Request $request,$id){

        $the_list=the_list::create([

            'title'=>$request->title,
            'boarde_id'=>$id
        ]);
            return response()->json([
                'success' => true,
                'message' => 'success store data',
                'result' => new listResource($the_list)
            ]);
        }
    public function Edite(Request $request,$id){
        $the_list=the_list::find($id);
        if($request->photo){
            $file = $request->file('photo');
                 $ext = $file->getClientOriginalName();
                 $filename = "board-" . uniqid() . ".$ext";
                 $file->move(public_path('images/board_image'), $filename);
             }
             else {
                 $filename=$the_list->photo;
             }
        $the_list->update([
            'title'=>($request->title)?$request->title:$the_list->title,
        ]);
            return response()->json([
                'success' => true,
                'message' => 'success store data',
                'result' => new listResource($the_list)
            ]);
        }
    public function delete($id){

        $result =  the_list::find($id);
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
    $the_lists =  the_list::where('boarde_id',$id)->get()->all();
    if(!$the_lists){
        return response()->json([
            'success' => true,
            'message' => 'not found any list',

        ]);
    }
    foreach ($the_lists as $the_list) {
        $arr[]=new listResource($the_list);
    }
    return response()->json([
        'success' => true,
        'message' => 'success store data',
        'result' =>  $arr
    ]);
}
}
