<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\NewsPaper;

use App\Http\Controllers\Controller;

class NewsPaperController extends Controller
{
    public function addNewsPaper(){
        return view('admin.newspaper.add-paper');
    }

    public function newNewsPaper(Request $request){
        $paper = new NewsPaper();
        $paper->name        = $request->name;
        $paper->link        = $request->link;
        $paper->status   = $request->status;
        $paper->save();
        return back()->with('message','NewsPaper created successfully!!');
    }


    public function manageNewsPaper(){

        return view('admin.newspaper.manage-paper',[
            'newspapers' => NewsPaper::all()
        ]);

    }

    public function editNewsPaper($id){

        return view('admin.newspaper.edit-paper',[
            'paper' => NewsPaper::find($id)
        ]);
    }

    public function updateNewsPaper(Request $request){

        $paper = NewsPaper::find($request->id);
        $paper->name  = $request->name;
        $paper->link  = $request->link;
        $paper->status = $request->status;
        $paper->save();

        return redirect('/admin/newspaper/manage')->with('message','NewsPaper updated successfully!!');

    }

    public function deleteNewsPaper(Request $request){


        $paper = NewsPaper::find($request->id);
        $paper->delete();
        return redirect('/admin/newspaper/manage')->with('message','NewsPaper deleted successfully!!');


    }
}
