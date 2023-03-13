<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('principal');
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
});
