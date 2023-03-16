<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{

    function index()
    {
        return view('profile.index');
    }

    function edit()
    {
        return view('profile.edit');
    }

    ///store    
    function store(Request $request)
    {


        return back()->with('message', 'Perfil actualizado');
    }
}
