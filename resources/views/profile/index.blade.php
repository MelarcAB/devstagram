@extends('layouts.app')
@section('title')
    Editar perfil de {{ auth()->user()->username }}
@endsection

@section('content')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6 rounded-lg ">
            <form class="mt-10 md:mt-0" method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input value="{{ auth()->user()->username }}" type="text" id="username" name="username"
                        placeholder="{{ auth()->user()->username }}"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror">
                    @error('username')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="image" class="mb-2 block uppercase text-gray-500 font-bold">Imagen de perfil</label>
                    <input value="{{ auth()->user()->image }}" type="file" id="image" name="image"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror">
                    @error('image')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <input type="submit" value="Guardar cambios"
                    class="bg-sky-600 hover:bg-sky-700 transition-colorscursor-pointer uppdercase font-bold w-full p-3 text-white rounded-lg cursor-pointer" />

            </form>

        </div>

    </div>
@endsection
