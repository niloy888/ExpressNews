<?php

namespace App\Http\Controllers\Front;

use App\Model\Front\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class PasswordResetController extends Controller
{

    public function send(Request $request)
    {
        $this->validate($request, [
            'email'  =>  'required|email',
        ]);

        $p = rand(1000,4000);

        $data = array(
            'name'      =>  $request->name,
            'message'   =>   'http://127.0.0.1:8000/login/user' .'. Your new password is '. $p
        );

        $user = Client::where('email',$request->email)->first();
        $user->password = bcrypt($p);
        $user->save();



        Mail::to($request->email)->send(new SendMail($data));
        //return back()->with('success', 'Thanks for contacting us!');
        return redirect('/login/user')->with('message', 'A temporary password sent to your email. Use that for login');
    }

    public function newPassword(){
        return view('front-end.sign-in.new-password');
    }

}
