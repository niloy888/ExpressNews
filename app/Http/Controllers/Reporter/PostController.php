<?php

namespace App\Http\Controllers\Reporter;

use App\Model\Admin\Category;
use App\Model\Admin\Post;
use App\Model\Front\Client;
use App\Model\Front\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Image;
use Session;


class PostController extends Controller
{
    public function addPost()
    {
        return view('reporter.posts.add-post', [
            'categories' => Category::where('publication_status', 1)->get()
        ]);
    }

    public function newPost(Request $request)
    {
        //return $request->all();
        $p = Post::orderBy('id','desc')->first();
        $rand = rand(1000,9999);
        $number = $p->id+1 . $rand;

        //return $number;

        $postImage = $request->file('image');
        $fileType  = $postImage->getClientOriginalExtension();
        $imageName = $number . '.' . $fileType;
        $directory = 'post-images/';
        $img       = Image::make($postImage)->resize(800, 450)->save($directory . $imageName);


        $post                         = new Post();
        $post->category_id            = Session::get('reporter_section');
        $post->post_title             = $request->post_title;
        $post->post_short_description = $request->post_short_description;
        $post->post_long_description  = $request->post_long_description;
        $post->image                  = $directory . $imageName;
        $post->video                  = $request->video;
        $post->is_breaking            = $request->is_breaking;
        $post->publication_status     = $request->publication_status;
        $post->publication_date       = $request->publication_date;

        $post->save();

        return back()->with('message', 'Post created successfully!!');


    }

    public function managePost()
    {

        $posts = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where('posts.category_id', Session::get('reporter_section'))
            ->select('posts.*', 'categories.category_name')
            ->orderBy('posts.id', 'desc')
            ->get();

        return view('reporter.posts.manage-post', [
            'posts' => $posts
        ]);
    }

    public function editPost($id)
    {

        return view('reporter.posts.edit-post', [
//            'categories' => Category::where('publication_status', 1)->get(),
            'post' => Post::find($id)
        ]);
    }

    public function updatePost(Request $request)
    {
        $p = Post::orderBy('id','desc')->first();
        $rand = rand(1000,9999);
        $number = $p->id+1 . $rand;

        $postImage = $request->file('image');

        if ($postImage) {
            $post = Post::find($request->id);
            unlink($post->image);

            $fileType  = $postImage->getClientOriginalExtension();
            $imageName = $number . '.' . $fileType;

            $directory = 'post-images/';
            $img       = Image::make($postImage)->resize(800, 450)->save($directory . $imageName);

            $post->category_id            = Session::get('reporter_section');
            $post->post_title             = $request->post_title;
            $post->post_short_description = $request->post_short_description;
            $post->post_long_description  = $request->post_long_description;
            $post->image                  = $directory . $imageName;
            $post->video                  = $request->video;
            $post->is_breaking            = $request->is_breaking;
            $post->publication_status     = $request->publication_status;
            $post->publication_date       = $request->publication_date;

            $post->save();

            return redirect('/reporter/post/manage')->with('message', 'Post updated successfully!!');

        } else {
            $post = Post::find($request->id);

            $post->category_id            = Session::get('reporter_section');
            $post->post_title             = $request->post_title;
            $post->post_short_description = $request->post_short_description;
            $post->post_long_description  = $request->post_long_description;
            $post->video                  = $request->video;
            $post->is_breaking            = $request->is_breaking;
            $post->publication_status     = $request->publication_status;
            $post->publication_date       = $request->publication_date;

            $post->save();

            return redirect('/reporter/post/manage')->with('message', 'Post updated successfully!!');
        }
    }

    public function deletePost(Request $request)
    {

        $post = Post::find($request->id);
        unlink($post->image);
        $post->delete();
        return redirect('/reporter/post/manage')->with('message', 'Post deleted successfully!!');
    }

    public function manageComments($id){
        $comments = DB::table('comments')
            ->join('clients','comments.client_id','=','clients.id')
            ->where('comments.post_id',$id)
            ->select('comments.*','clients.full_name','clients.status as client_status')
            ->get();

        //return $comments;
        //$comments = Comment::where('post_id',$id)->get();
        return view('reporter.comments.manage-comments',compact('comments'));
    }

    public function changeCommentStatus($id){
        $comment = Comment::find($id);
        if ($comment->status=="1"){
            $comment->status = "0";
            $comment->save();
        }
        else{
            $comment->status = "1";
            $comment->save();
        }

        return redirect()->back()->with('message','Comment status changed successfully');
    }

    public function changeClientStatus($id){
        $client = Client::find($id);
        if ($client->status==1){
            $client->status = 0;
            $client->save();
        }
        else{
            $client->status = 1;
            $client->save();
        }

        return redirect()->back()->with('message','Client status changed successfully');
    }

}
