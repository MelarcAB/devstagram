<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('principal');
});

//Crear cuenta Auth/RegisterController
Route::controller(App\Http\Controllers\Auth\RegisterController::class)->group(function () {
    Route::get('/crear-cuenta', 'create')->name('register.index');
    //post
    Route::post('/crear-cuenta', 'store')->name('register.store');
});

//login controller
Route::controller(App\Http\Controllers\Auth\LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login.index');
    //post
    Route::post('/login', 'store')->name('login.store');

    //logout
    Route::get('/logout', 'logout')->name('logout');
});



//PostController
Route::controller(App\Http\Controllers\PostController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('posts.index');
    //store

});
