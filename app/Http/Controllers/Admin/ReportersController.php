<?php

namespace App\Http\Controllers\Admin;

use App\Model\Reporter\Reporter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ReportersController extends Controller
{
    public function manageReporters(){
        $reporters = DB::table('reporters')
            ->join('categories','reporters.reporter_section','=','categories.id')
            ->select('reporters.*','categories.category_name')
            ->orderBy('id','desc')
            ->get();

        return view('admin.reporters.manage-reporters',compact('reporters'));
    }

    public function changeReporterStatus($id){
        $reporter = Reporter::find($id);
        if ($reporter->status=="0"){
            $reporter->status = "1";
        }
        elseif ($reporter->status =="1"){
            $reporter->status = "2";
        }
        else{
            $reporter->status = "1";
        }

        $reporter->save();

        return redirect()->back()->with('message','Reporter status changed successfully');
    }
}
