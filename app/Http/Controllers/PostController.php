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
        $this->middleware('auth');
    }



    function index(User $user)
    {
        return view('home', [
            'user' => $user
        ]);
    }

    function create()
    {
        return view('posts.create');
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
}
