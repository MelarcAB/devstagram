<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//user
use App\Models\User;
//comment
use App\Models\Comments;
//post
use App\Models\Post;

class CommentsController extends Controller
{


    function store(Request $request, User $user, Post $post)
    {

        $msg_validation = [
            'comment.required' => 'El comentario es requerido'
        ];
        $this->validate($request, [
            'comment' => 'required'
        ], $msg_validation);

        $comment = new Comments();
        $comment->comment = $request->comment;
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $post->id;
        $comment->save();
        return back()->with('message', 'Comentario agregado');
    }
}
