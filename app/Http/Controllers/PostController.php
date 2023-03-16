<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//user
use App\Models\User;

//post
use App\Models\Post;

class PostController extends Controller
{


    //constructor
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }



    function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->paginate(3);
        return view('home', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    function create()
    {
        return view('posts.create');
    }

    function show(User $user, Post $post)
    {
        return view('posts.show', [
            'user' => $user,
            'post' => $post
        ]);
    }


    function store(Request $request)
    {



        //mensajes de error
        $messages = [
            'title.required' => 'El titulo es requerido',
            'description.required' => 'La descripcion es requerida',
            'image.required' => 'La imagen es requerida',
        ];
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required'
        ], $messages);

        //guardar en la base de datos
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('posts.index', ['user' => auth()->user()->username]);
    }

    function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $img_path = public_path('uploads/' . $post->image);
        $post->delete();
        if (file_exists($img_path)) {
            unlink($img_path);
        }
        return redirect()->route('posts.index', ['user' => auth()->user()->username])->with('message', 'Post eliminado');
    }
}
