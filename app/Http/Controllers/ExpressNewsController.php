<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpressNewsController extends Controller
{
    public function index(){
        return view('front-end.home.home');
    }
}
