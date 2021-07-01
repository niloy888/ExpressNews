<?php

namespace App\Http\Controllers\Front;

use App\Model\Front\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserMessage;
use Session;
use DB;

class ClientController extends Controller
{
    public function index(){



        return view('user.dashboard');
    }

    public function messageAdmin(){
        $messages = DB::table('user_messages')
        ->join('clients','user_messages.user_id','=','clients.id')
        ->where('user_messages.user_id','=',Session::get('client_id'))
        ->select('user_messages.*','clients.full_name')
        ->orderBy('user_messages.id','desc')
        ->get();

        //return $messages;
        //dd($messages);

        $total = count($messages);

        //return $total;

        foreach ($messages as $message) {
            if ($message->seen == 0) {
                $m = UserMessage::find($message->id);
                $m->seen = 1;
                $m->save();

            }
        }

        /*foreach($messages as $message){
            $m = UserMessage::find($message->id);
            $m->admin_seen = 0;
            $m->save();
        }*/
        

        return view('user.message-admin',compact('messages'));
    }

    public function sendMessage(Request $request){
        $image     = $request->file('image');

        if ($image) {
            // code...
            $imageName = $image->getClientOriginalName();
            $directory = 'user-messages/';
            $image->move($directory,$imageName);
        }
        

        if ($image) {
            // code...
            $message = new UserMessage();
            $message->user_id = Session::get('client_id');
            $message->sender_id = Session::get('client_id');
            $message->receiver_id = 0;
            $message->message = $request->message;
            $message->image             = $directory.$imageName;

        }
        else{
            $message = new UserMessage();
            $message->user_id = Session::get('client_id');
            $message->sender_id = Session::get('client_id');
            $message->receiver_id = 0;
            $message->message = $request->message;
        }

        $messages = UserMessage::where('user_id',Session::get('client_id'))->get();

        foreach($messages as $me){
            $m = UserMessage::find($me->id);
            $m->admin_seen = 0;
            $m->save();
        }
        
        $message->save();
        return redirect()->back()->with('message','Message sent successfully');

    }

    public function login(){
        return view('front-end.sign-in.sign-in');
    }

    public function loginProcess(Request $request)
    {
        $client = Client::where('email', $request->email)->first();
        if ($client) {
            if ($client->status==1){
                if (password_verify($request->password, $client->password)) {
                    Session::put('client_id', $client->id);
                    Session::put('client_name', $client->full_name);
                    Session::put('client_email', $client->email);
                    Session::put('client_mobile_no', $client->mobile_no);

                    return redirect('/');
                } else {
                    return redirect('/login/user')->with('message', 'Wrong password!!');
                }
            }
            else{
                return redirect('/login/user')->with('message', 'Your account may be temporarily disabled. Please mail us express@news.com!!');

            }

        } else {
            return redirect('/login/user')->with('message', 'Wrong email!!');
        }

    }

    public function register(){
        return view('front-end.sign-in.sign-up');
    }

    public function registerProcess(Request $request){


        $client = new Client();
        $client->full_name = $request->full_name;
        $client->email = $request->email;
        $client->password = bcrypt($request->password);
        $client->mobile_no = $request->mobile_no;
        $client->status = 1;

        $client->save();

        Session::put('client_id', $client->id);
        Session::put('client_name', $client->full_name);
        Session::put('client_email', $client->email);
        Session::put('client_mobile_no', $client->mobile_no);

        return redirect('/');


    }

    public function verifyUser(){
        return view('front-end.sign-in.verify-email');
    }

    public function logout()
    {

        Session::forget('client_id');
        Session::forget('client_name');
        Session::forget('client_email');
        Session::forget('client_contact_no');

        return redirect('/');

    }


    public function resetPassword(){
        return view('front-end.sign-in.reset');
    }






}
