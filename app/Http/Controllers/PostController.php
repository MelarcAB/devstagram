<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{


    //constructor
    public function __construct()
    {
        $this->middleware('auth');
    }



    function index()
    {
        return view('home');
    }
}
