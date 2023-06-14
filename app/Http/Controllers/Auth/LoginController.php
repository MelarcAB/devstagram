<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    function index()
    {
        //si la sesion esta iniciada
        if (auth()->check()) {
            // return redirect()->route('posts.index');
        }
        return view('auth.login');
    }

    //store
    function store(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $messages = [
            'email.required' => 'El email es requerido',
            'email.email' => 'El email no es válido',
            'password.required' => 'La contraseña es requerida',
        ];

        $this->validate($request, $rules, $messages);

        if (auth()->attempt($request->only('email', 'password'), $request->remember)) {
            $user = auth()->user();
            return redirect()->route('posts.index', $user->username);
        } else {
            return back()->with([
                'message' => 'El email o la contraseña no son correctos.'
            ]);
        }
    }


    //logout
    function logout()
    {
        auth()->logout();
        return redirect()->route('login.index');
    }
}
