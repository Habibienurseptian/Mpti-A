<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Threads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Threads $thread){


        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->threads_id = $thread->id;
        $comment->content = request()->get('content');

        $comment->save();

        $thread = $thread->load('comments');

        return redirect()->back()->with('success', 'Comment added successfully!');

    }
}
