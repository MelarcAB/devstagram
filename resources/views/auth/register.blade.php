@extends('layouts.app')

@section('title')
    Registro
@endsection

@section('content')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12">
            <img src="{{ asset('img/register.jpg') }}">
        </div>
        <div class="md:w-4/12 bg-white p-5  rounded-lg shadow-md">
            <form method="POST" action="{{ route('register.store') }}" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                    <input value="{{ old('name') }}" type="text" id="name" name="name" placeholder="Nombre"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror">
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input type="text" value="{{ old('username') }}" id="username" name="username"
                        placeholder="Nombre de usuario"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror">
                    @error('username')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input type="email" id="email" value="{{ old('email') }}" name="email" placeholder="Email"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror">
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Password"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repetir
                        contraseña</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="border p-3 w-full rounded-lg @error('password_confirmation') border-red-500 @enderror">

                </div>
                <input type="submit" value="Create account"
                    class="bg-sky-600 hover:bg-sky-700 transition-colorscursor-pointer uppdercase font-bold w-full p-3 text-white rounded-lg cursor-pointer" />

            </form>
        </div>
    </div>
@endsection
