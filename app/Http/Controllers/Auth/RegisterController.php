<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//user
use App\Models\User;
//hash
use Illuminate\Support\Facades\Hash;
//str
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    //function register
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $params = $request->all();

        //modificar el request->username para que sea slug
        $request->request->add(['username' => Str::slug($params['username'])]);

        $rules = [
            'name' => 'required|string|max:255',
            'username' => 'required | string | min:3 | max:255 | unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed',
        ];

        $messages = [
            'name.required' => 'El nombre es requerido',
            'username.required' => 'El nombre de usuario es requerido',
            'email.required' => 'El email es requerido',
            'email.email' => 'El email no es válido',
            'password.required' => 'La contraseña es requerida',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'username.unique' => 'El nombre de usuario ya existe',
            'username.min' => 'El nombre de usuario debe tener al menos 3 caracteres',
            'username.max' => 'El nombre de usuario debe tener máximo 255 caracteres',
            'email.unique' => 'El email ya está registrado',
        ];

        $this->validate($request, $rules, $messages);

        $user = User::create([
            'name' => $params['name'],
            'username' => ($params['username']),
            'email' => $params['email'],
            'password' => Hash::make($params['password']),
        ]);

        //auth
        auth()->attempt($request->only('email', 'password'));
        //or
        //auth()->login($user);
        //posts.index
        return redirect()->route('posts.index')->with('success', 'Usuario creado correctamente');
    }
}
