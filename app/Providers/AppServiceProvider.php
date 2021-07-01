<?php

namespace App\Providers;

use App\Model\Admin\Category;
use App\Model\Admin\Post;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use View;
use DB;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        View::composer('front-end.master', function ($view){

            $date = Carbon::now()->format('Y/m/d');

            $view->with('categories', Category::where('publication_status', 1)->orderBy('category_name','asc')->get());
            $view->with('breakingNews', Post::where('publication_status', 1)->where('publication_date',$date)->where('is_breaking', 1)->orderBy('id','desc')->get());
        });


        View::composer('user.master', function ($view){

           $messages = DB::table('user_messages')
        ->join('clients','user_messages.user_id','=','clients.id')
        ->where('user_messages.user_id','=',Session::get('client_id'))
        ->where('user_messages.seen','=',0)
        ->select('user_messages.*','clients.full_name')
        ->orderBy('user_messages.id','desc')
        ->get();

        $total = count($messages);

        $view->with('total',$total);

        });


    }
}
