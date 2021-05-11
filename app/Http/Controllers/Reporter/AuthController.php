<?php

namespace App\Http\Controllers\Reporter;

use App\Model\Admin\Category;
use App\Model\Reporter\Reporter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class AuthController extends Controller
{
    public function register()
    {
        $categories = Category::all();
        return view('reporter.auth.register',compact('categories'));

    }


    public function registerProcess(Request $request)
    {

        $reporter = new Reporter();
        $reporter->reporter_name = $request->reporter_name;
        $reporter->reporter_email = $request->reporter_email;
        $reporter->password = bcrypt($request->password);
        $reporter->reporter_contact_number = $request->reporter_contact_number;
        $reporter->reporter_section = $request->reporter_section;

        $reporter->save();

        Session::put('reporter_id', $reporter->id);
        Session::put('reporter_name', $reporter->reporter_name);
        Session::put('reporter_email', $reporter->reporter_email);
        Session::put('reporter_contact_number', $reporter->reporter_contact_number);

        return redirect('/reporter/login')->with('message','Please wait for admin approval');
    }


    public function login()
    {
        return view('reporter.auth.login');

    }

    public function loginProcess(Request $request)
    {
        $reporter = Reporter::where('reporter_email', $request->reporter_email)->first();
        if ($reporter) {
            if ($reporter->status==1){
                if (password_verify($request->password, $reporter->password)) {
                    Session::put('reporter_id', $reporter->id);
                    Session::put('reporter_name', $reporter->reporter_name);
                    Session::put('reporter_email', $reporter->reporter_email);
                    Session::put('reporter_contact_number', $reporter->reporter_contact_number);
                    Session::put('reporter_section', $reporter->reporter_section);

                    return redirect('/reporter/dashboard');

                } else {
                    return redirect('/reporter/login')->with('message', 'Wrong Password!!');
                }
            }
            elseif($reporter->status==0){
                return redirect('/reporter/login')->with('message', 'Please wait for admin approval!!');

            }
            else{
                return redirect('/reporter/login')->with('message', 'Your account may be temporarily disabled. Please mail us express@news.com!!');

            }

        } else {
            return redirect('reporter-login')->with('message', 'Invalid email!!');
        }

    }


    public function logout(Request $request)
    {


        Session::forget('reporter_id');
        Session::forget('reporter_name');
        Session::forget('reporter_email');
        Session::forget('reporter_contact_number');
        Session::forget('reporter_section');


        return redirect('/reporter/login');

    }
}
