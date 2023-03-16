<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


//user
use App\Models\User;
//comment
use App\Models\Comments;
//post
use App\Models\Post;

class LikesController extends Controller
{


    function store(Request $request, Post $post)
    {
        $post->likes()->create([
            'user_id' => $request->user()->id
        ]);
        return back();
    }


    function destroy(Request $request, Post $post)
    {
        $request->user()->likes()->where('post_id', $post->id)->delete();
        return back();
    }
}
