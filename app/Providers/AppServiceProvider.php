<?php

namespace App\Providers;

use App\Model\Admin\Category;
use App\Model\Admin\Post;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use View;

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


    }
}
