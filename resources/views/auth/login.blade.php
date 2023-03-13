@extends('layouts.app')

@section('title')
Iniciar sesión
@endsection

@section('content')

<div class="md:flex md:justify-center md:gap-10 md:items-center">
    <div class="md:w-6/12">
        <img src="{{asset('img/login.jpg')}}">
    </div>
    <div class="md:w-4/12 bg-white p-5  rounded-lg shadow-md">
        <form novalidate action="{{ route('login.store') }}" method="post">
            @csrf

            @if(session('message'))
            <div class="bg-red-500 p-3 rounded-lg mb-6 text-white text-center font-bold">
                <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                {{session('message')}}
            </div>
            @endif
            <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                <input type="email" id="email" value="{{old('email')}}" name="email" placeholder="Email" class="border 
                @error('email') border-red-500 @enderror
                p-3 w-full rounded-lg @error('name') border-red-500 @enderror" + value="{{old('email')}}">
                @error('email')
                <span class="text-red-500 text-sm">{{$message}}</span>
                @enderror

            </div>
            <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Password" class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">
                @error('password')
                <span class="text-red-500 text-sm">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-5">
                <input type="checkbox" id="remember" name="remember" class="">
                <label for="remember" class="text-sm">Recuérdame</label>
            </div>

            <input type="submit" value="Login" class="bg-sky-600 hover:bg-sky-700 transition-colorscursor-pointer uppdercase font-bold w-full p-3 text-white rounded-lg cursor-pointer" />

        </form>
    </div>
</div>
@endsection