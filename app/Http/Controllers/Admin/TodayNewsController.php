<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class TodayNewsController extends Controller
{
    public function manageTodayAllNews(){

        $date = Carbon::now()->format('Y/m/d');

        $posts = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where('posts.publication_date',$date)
            ->select('posts.*', 'categories.category_name')
            ->orderBy('posts.id', 'desc')
            ->get();

        return view('admin.today-news.all-news', [
            'posts' => $posts
        ]);

    }

    public function manageTodayBreakingNews(){

        $date = Carbon::now()->format('Y/m/d');

        $nonBreakingNews = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where('posts.publication_date',$date)
            ->where('posts.is_breaking',"0")
            ->select('posts.*', 'categories.category_name')
            ->orderBy('posts.id', 'desc')
            ->get();


        $posts = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where('posts.publication_date',$date)
            ->where('posts.is_breaking',"1")
            ->select('posts.*', 'categories.category_name')
            ->orderBy('posts.id', 'desc')
            ->get();

        //return $posts;



        return view('admin.today-news.breaking-news', [
            'posts' => $posts,
            'nonBreakingNews' => $nonBreakingNews
        ]);

    }

    public function addBreakingNews(Request $request){
        $post = Post::find($request->post_id);
        //return $post;
        $post->is_breaking = "1";
        $post->save();
        return redirect()->back()->with('message','Post added to breaking news');
    }
}
