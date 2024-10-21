<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\workspace;
use App\Models\boarde;

class workspaceController extends Controller
{
    public function create(){
        return view('workspaces.newworkspace');
    }
    public function store(Request $request){

        $workspace=workspace::create([
            'name'=>$request->name]);
            return  redirect()->route('dashboard')->with('success','workspace is created');
        }
        public function detailsworkspace($id){
            $workspace=workspace::find($id);
            $boardes=boarde::where('workspace_id',$id)->get()->all();
            return view('boardes.showBoardes',compact('boardes' , 'workspace'));

        }
        public function ShowEdite($id){
            $workspace=workspace::find($id);
            return view('workspaces.editeworkspace',compact('workspace'));
        }
    public function edite( Request $request,$id){
        $workspace=workspace::find($id);
        $workspace->update(
            ['name'=>$request->name]);
            return  redirect()->route('dashboard')->with('success','workspace is updated');
    }
    public function delete( $id){
        $workspace=workspace::find($id);
        $workspace->delete();
            return  redirect()->route('dashboard')->with('success','workspace is deleted');
    }
}
