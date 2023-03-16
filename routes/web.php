<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('principal');
});
Route::get('/phpinfo', function () {
    return phpinfo();
});

//Crear cuenta Auth/RegisterController
Route::controller(App\Http\Controllers\Auth\RegisterController::class)->group(function () {
    Route::get('/crear-cuenta', 'create')->name('register.index');
    Route::post('/crear-cuenta', 'store')->name('register.store');
});

//login controller
Route::controller(App\Http\Controllers\Auth\LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login.index');
    Route::post('/login', 'store')->name('login.store');
    Route::get('/logout', 'logout')->name('logout');
});


//PostController
Route::controller(App\Http\Controllers\PostController::class)->group(function () {
    Route::get('/{user:username}', 'index')->name('posts.index');
    //get posts create
    Route::get('/post/crear', 'create')->name('posts.create');
    //post posts create
    Route::post('/posts', 'store')->name('posts.store');
    //get posts 
    Route::get('/{user:username}/posts/{post}', 'show')->name('posts.show');
    //delete
    Route::delete('/posts/{post}', 'destroy')->name('posts.destroy');
});

//ImagenController
Route::controller(App\Http\Controllers\ImagenController::class)->group(function () {
    Route::post('/imagen/crear', 'store')->name('imagen.store');
});


//comment controller
Route::controller(App\Http\Controllers\CommentsController::class)->group(function () {
    Route::post('/{user:username}/posts/{post}', 'store')->name('comments.store');
});
