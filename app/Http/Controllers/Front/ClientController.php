<?php

namespace App\Http\Controllers\Front;

use App\Model\Front\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;

class ClientController extends Controller
{
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
