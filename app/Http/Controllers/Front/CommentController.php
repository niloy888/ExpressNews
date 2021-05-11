<?php

namespace App\Http\Controllers\Front;

use App\Model\Front\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function submitComment(Request $request){

        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->client_id = $request->client_id;
        $comment->comment = $request->comment;
        $comment->save();
        return back()->with('message','Comment Submitted Successfully!');

    }
}
