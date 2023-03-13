<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//user
use App\Models\User;


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
}
