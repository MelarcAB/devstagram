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
            $img_server = Image::make($img);
            //fit image
            $img_server->fit(1000, 1000);
            $img_path = public_path('uploads/' . $img_name);


            $img_server->save($img_path);
            return response()->json(['image' => $img_name]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
