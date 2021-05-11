<?php

namespace App\Http\Middleware;

use App\Model\Reporter\Reporter;
use Closure;
use Session;

class VerifyReporter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (!$request->session()->has('reporter_id' )){
            return redirect('/reporter/login');

        }
        /*else{

        }*/
        return $next($request);


    }
}
