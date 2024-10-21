<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\workspaaceResource;
use App\Models\workspace;

class workspaceController extends Controller
{
    public function create(Request $request){

        $workspace=workspace::create([
            'name'=>$request->name]);
            return response()->json([
                'success' => true,
                'message' => 'success store data',
                'result' => new workspaaceResource($workspace)
            ]);
        }
    public function Edite(Request $request,$id){

        $workspace=workspace::find($id);
        $workspace->update([
            'name'=>$request->name]);
            return response()->json([
                'success' => true,
                'message' => 'success store data',
                'result' => new workspaaceResource($workspace)
            ]);
        }
    public function delete($id){

        $result =  workspace::find($id);
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
public function showAll(){
    $workspaces =  workspace::get()->all();
    if(!$workspaces){
        return response()->json([
            'success' => true,
            'message' => 'not found any workspace',

        ]);
    }
    foreach ($workspaces as $workspace) {
        # code...
        $arr[]=new workspaaceResource($workspace);
    }
    return response()->json([
        'success' => true,
        'message' => 'success store data',
        'result' =>  $arr
    ]);
}

}
