<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\boarde;
use  App\Models\the_list;

class listController extends Controller
{
    public function create($id){
        $boarde=boarde::find($id);
        return view('the_lists.newthe_list',compact('boarde'));
    }
    public function store(Request $request,$id){
        $the_list=the_list::create([
            'title'=>$request->title,
        'boarde_id'=>$id]);
            return  redirect()->route('details.list',$id)->with('success','list is created');
        }
        public function ShowEdite($id){
            $the_list=the_list::find($id);
            return view('the_lists.editelist',compact('the_list'));
        }
    public function edite( Request $request,$id){
        $the_list=the_list::find($id);
        $the_list->update(
            ['title'=>$request->title]);
          return  redirect()->route('details.list',$the_list->boarde_id)->with('success','list is updated');
           //return redirect()->back();
    }
    public function delete( $id){
        $the_list=the_list::find($id);
        $the_list->delete();
            return  redirect()->route('details.list',$the_list->boarde_id)->with('success','list is deleted');
}
public function detailslists($id){
    $boarde=boarde::find($id);
    $lists=the_list::where('boarde_id',$id)->get()->all();
    return view('the_lists.showLists',compact('boarde' , 'lists'));
}

}
