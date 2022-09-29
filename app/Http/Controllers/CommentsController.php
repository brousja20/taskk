<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CommentsRequest;

class CommentsController extends Controller
{
    public function store(Blog $blog, CommentsRequest $request) {
        $data = $request->validated();
        $comment = new Comment();

        $comment->user_id = auth()->user()->id;
        $comment->blog_id = $blog->id;
        if ($data['parent_id'] == "NULL") {
            $data['parent_id'] = NULL;
        }
        $comment->parent_id = $data['parent_id'];
        $comment->text = $data['text'];
        $comment->save();

        return back();
    }

    public function destroy(Comment $comment)
    {
        if (count(DB::table('comments')->where('parent_id', $comment->id)->get()) > 0)
        {
            $replace = new Comment();
            $replace->id = $comment->id;
            $replace->user_id = $comment->user_id;
            $replace->blog_id = $comment->blog_id;
            $replace->parent_id = $comment->parent_id;
            $replace->text = "This comment has been deleted.";
            $comment->delete();
    
            $replace->save();
        } else 
        {
            $comment->delete();
        }
        

        return back();
    }
}
