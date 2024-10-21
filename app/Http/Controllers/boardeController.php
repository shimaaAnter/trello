<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\boarde;
use App\Models\workspace;

class boardeController extends Controller
{
    public function create($id){
        $workspace=workspace::find($id);
        return view('boardes.newboarde',compact('workspace'));
    }
    public function store(Request $request,$id){
        $boarde=boarde::create([
            'name'=>$request->name,
        'workspace_id'=>$id]);
            return  redirect()->route('details.workspace',$id)->with('success','Board is created');
        }
        public function ShowEdite($id){
            $boarde=boarde::find($id);
            return view('boardes.editeboard',compact('boarde'));
        }
    public function edite( Request $request,$id){
        $boarde=boarde::find($id);
        $boarde->update(
            ['name'=>$request->name]);
          return  redirect()->route('details.workspace',$boarde->workspace_id)->with('success','board is updated');
           //return redirect()->back();
    }
    public function delete( $id){
        $boarde=boarde::find($id);
        $boarde->delete();
            return  redirect()->route('details.workspace',$boarde->workspace_id)->with('success','board is deleted');
    }
}
