<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserMessage;
use Session;
use Image;
use DB;
use Illuminate\Support\Facades\Response;

class UserMessageController extends Controller
{
    public function submitMessage(Request $request){

        if ($request->image) {
            $rand = rand(1000,9999);
            $postImage = $request->file('image');
            $fileType  = $postImage->getClientOriginalExtension();
            $imageName = $rand . '.' . $fileType;
            $directory = 'user-messages/';
            $img       = Image::make($postImage)->resize(800, 450)->save($directory . $imageName);

            $message = new UserMessage();
            $message->user_id = Session::get('client_id');
            $message->message = $request->message;
            $message->image   = $directory . $imageName;
        }

        else{
         $message = new UserMessage();
         $message->user_id = Session::get('client_id');
         $message->message = $request->message; 
     }

     $message->save();
     return redirect()->back()->with('message','Message sent successfully');

 }

 public function manageMessages(){

    $messages = DB::table('user_messages')
    ->join('clients','user_messages.user_id','=','clients.id')
    ->select('user_messages.*','clients.full_name')

    ->orderBy('user_messages.created_at','desc')

    ->groupBy('user_messages.user_id')
    ->get();

    foreach($messages as $message){
        if ($message->admin_seen  == 0) {
            // code...
            $id = UserMessage::find($message->id);
        }
    }

    //$messages = UserMessage::distinct()->get();

    return view('admin.user-messages.list',compact('messages'));
}

public function messageDetails($id){

    $messages = DB::table('user_messages')
    ->join('clients','user_messages.user_id','=','clients.id')
    ->select('user_messages.*','clients.full_name')

    ->orderBy('user_messages.id','desc')
    ->where('user_messages.user_id',$id)
    ->get();

    foreach ($messages as $message) {
            if ($message->admin_seen == 0) {
                $m = UserMessage::find($message->id);
                $m->admin_seen = 1;
                $m->save();

            }
        }

    //$messages = UserMessage::where('user_id',$id)->orderBy('id','desc')->get();
    return view('admin.user-messages.details',compact('messages'));
}

public function sendMessage(Request $request){
        $message = new UserMessage();
        $message->user_id = $request->user_id;
        $message->sender_id = 0;
        $message->receiver_id = $request->user_id;
        $message->message = $request->message;
        $message->save();
        return redirect()->back()->with('message','Message sent successfully');

    }

    public function imageDownload($id){
        $image = UserMessage::find($id);
        $file= public_path(). "/user-messages/".$image->image;

        $headers = array(
            'Content-Type: application/img',
        );

        return Response::download($file);
    }
}
