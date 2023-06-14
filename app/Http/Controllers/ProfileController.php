<?php

namespace App\Http\Controllers;

//image
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
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
        //custom mensajes
        $msg_validaciones = [
            'username.required' => 'El nombre de usuario es requerido',
            'username.max' => 'El nombre de usuario no puede tener mas de 20 caracteres',
            'username.min' => 'El nombre de usuario no puede tener menos de 3 caracteres',
            'username.unique' => 'El nombre de usuario ya esta en uso',
        ];
        //validacion
        $this->validate($request, [
            // 'username' => 'required|max:20|min:3|unique:users',
            $actual_username = auth()->user()->username,
            //permitir que el usuario actual pueda usar su mismo username
            'username' => [
                'required',
                'max:20',
                'min:3',
                'unique:users',
                //descartar el username actual de unique
                "unique:users,username,{$actual_username},username",
                'not_in:admin,root,administrador,moderador,mod,moderador,moderadora,moderadores,moderadoras,administradores,administradora,administradoras,root,roots,admin,admins,administrador,administradores,administradora,administradoras,moderador,moderadores,moderadora,moderadoras,usuario,usuarios,usuario,usuarios,us,edit-profile',

            ]
        ], $msg_validaciones);

        $user = auth()->user();
        if ($request->image) {
            $img = $request->file('image');
            $img_name = Str::uuid() . '.' . $img->getClientOriginalExtension();

            $server_img = Image::make($img)->resize(500, 500)->save(public_path('profiles/' . $img_name));
        }

        $user->username = $request->username;
        $user->image = $img_name ?? auth()->user()->image ?? '';

        $user->save();

        return redirect()->route('posts.index', $user->username)->with([
            'message' => 'Perfil actualizado correctamente'
        ]);
    }
}
