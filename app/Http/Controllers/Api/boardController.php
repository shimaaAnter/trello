<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\boarde;
use App\Models\boarde_member;
use App\Models\workspace_member;
use App\Http\Resources\boardResource;

class boardController extends Controller
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
// dd($filename);
        $boarde=boarde::create([
            'name'=>$request->name,
            'photo'=>$filename,
            'workspace_id'=>$id]);
            return response()->json([
                'success' => true,
                'message' => 'success store data',
                'result' => new boardResource($boarde)
            ]);
        }
    public function Edite(Request $request,$id){
        $boarde=boarde::find($id);
        if($request->photo){
            $file = $request->file('photo');
                 $ext = $file->getClientOriginalName();
                 $filename = "board-" . uniqid() . ".$ext";
                 $file->move(public_path('images/board_image'), $filename);
             }
             else {
                 $filename=$boarde->photo;
             }
        $boarde->update([
            'name'=>($request->name)?$request->name:$boarde->name,
            'photo'=>$filename,
        ]);
            return response()->json([
                'success' => true,
                'message' => 'success store data',
                'result' => new boardResource($boarde)
            ]);
        }
    public function delete($id){

        $result =  boarde::find($id);
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
    $boardes =  boarde::where('workspace_id',$id)->get()->all();
    if(!$boardes){
        return response()->json([
            'success' => true,
            'message' => 'not found any boarde',

        ]);
    }
    foreach ($boardes as $boarde) {
        # code...
        $arr[]=new boardResource($boarde);
    }
    return response()->json([
        'success' => true,
        'message' => 'success store data',
        'result' =>  $arr
    ]);
}
public function AddUser($user_id , $board_id){
    // dd($board_id);
    $board=boarde::find($board_id);
    $userBorde=boarde_member::create(
        [
        'user_id'=>$user_id,
        'boarde_id'=>$board_id
        ]);
    $userWorkspace=workspace_member::create(
        [
        'user_id'=>$user_id,
        'workspace_id'=>$board->workspace_id,
        ]
        );
        return response()->json([
            'success' => true,
            'message' => 'success Add user',

        ]);
}
}
