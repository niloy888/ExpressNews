<?php

namespace App\Http\Controllers\Front;

use App\Model\Admin\Category;
use App\Model\Admin\Post;
use App\NewsPaper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class ExpressNewsController extends Controller
{
    public function index(){

        $categories = Category::where('publication_status',1)->get();
        //$newspapers = NewsPaper::where('status',1)->get();
        $totalCategories = count($categories)+2;
        //return $totalCategories;
        $date = Carbon::now()->format('Y/m/d');

        //return $date;
        //$posts    = Post::where('publication_status', 1)->where('publication_date',$date)->orderBy('id','desc')->take($totalCategories)->get();
        //return $posts;
        $breakingArticles = Post::where('publication_status', 1)->where('publication_date',$date)->where('is_breaking',"1")->orderBy('id','desc')->get();
        //return $breakingArticles;





        return view('front-end.home.home',[
            'posts'      => Post::where('publication_status', 1)->where('publication_date',$date)->orderBy('id','desc')->take($totalCategories)->get(),
            'categories' => Category::where('publication_status', 1)->orderBy('category_name','asc')->get(),
            'newspapers' => NewsPaper::where('status', 1)->get(),
            'popularArticles' => Post::where('publication_status', 1)->where('publication_date',$date)->take(5)->orderBy('popularity','desc')->get(),
            'recentPosts' => Post::where('publication_status', 1)->where('publication_date',$date)->take(5)->orderBy('id','desc')->get(),
            'breakingArticles' => Post::where('publication_status', 1)->where('publication_date',$date)->where('is_breaking',"1")->orderBy('id','desc')->get(),

        ]);
    }

    public function singleArticle($id){

        $categories = Category::where('publication_status', 1)->orderBy('category_name','asc')->get();

        $post = Post::find($id);
        $post->increment("popularity");
        $comments = DB::table('comments')

            ->join('posts','comments.post_id','=','posts.id')
            ->join('clients','clients.id','=','comments.client_id')
            ->select('comments.*','clients.full_name')
            ->where('comments.post_id',$post->id)
            ->where('comments.status',1)
            ->orderBy('comments.id','desc')
            ->get();

        $otherArticles = Post::where('id','!=',$id)->where('publication_status',1)->get()->random(4);

        return view('front-end.post.single-post.single-post',[
            'post'       => Post::find($id),
            'comments'   => $comments,
            'categories' => $categories,
            'popularArticles' => Post::where('publication_status', 1)->take(3)->orderBy('popularity','desc')->get(),
            'randomPosts' => Post::all()->where('publication_status', 1)->random(3),
            'recentPosts' => Post::where('publication_status', 1)->take(3)->orderBy('id','desc')->get(),
            'otherArticles' => $otherArticles,
        ]);
    }

    public function categoryArticles($id){

        $date = Carbon::now()->format('Y/m/d');

        $category = Category::find($id);

        $categories = Category::where('publication_status', 1)->orderBy('category_name','asc')->get();

        $posts = Post::with('category')->where('category_id',$id)->where('publication_date',$date)->where('publication_status', 1)->get();

        $photoPosts = Post::where('publication_status', 1)->where('publication_date',$date)->orderBy('popularity','desc')->get()->random(5);




        return view('front-end.post.category-post.category-post',[
            'posts' => $posts,
            'category' => $category,
            'categories' => $categories,
            'popularArticles' => Post::where('publication_status', 1)->orderBy('popularity','desc')->get(),
            'popularPosts' => Post::where('publication_status', 1)->orderBy('popularity','desc')->take(3)->get(),
            'randomPosts' => Post::all()->where('publication_status', 1)->random(3),
            'recentPosts' => Post::where('publication_status', 1)->take(3)->orderBy('id','desc')->get(),
            'photoPosts' => $photoPosts,
        ]);

    }
}
