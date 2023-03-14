<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//intervation image
use Intervention\Image\Facades\Image;
//str   
use Illuminate\Support\Str;

class ImagenController extends Controller
{
    //
    function store(Request $request)
    {
        try {
            $img = $request->file('file');

            $img_name = Str::uuid() . '.' . $img->getClientOriginalExtension();

            $img_server = Image::make($img)->fit(1200, 1200);
            var_dump($img_server);
            return response()->json(['test' => 'test']);
            $img_path = public_path('uploads/' . $img_name);

            $img_server->save($img_path);
        } catch (\Exception $e) {
            print($e->getMessage());
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
