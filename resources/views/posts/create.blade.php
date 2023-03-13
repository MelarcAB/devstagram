@extends('layouts.app')

@section('title')
Subir publicación
@endsection

@section('content')

<div class="md:flex md:items-center">
    <div class="md:w-1/2 px-10">
        IMG
    </div>
    <div class="md:w-1/2 bg-white p-10 m-3  mt-10 md:mt-3 rounded-lg shadow-md">
        <form method="POST" action="{{ route('register.store') }}" novalidate>
            @csrf
            <div class="mb-5">
                <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">Título</label>
                <input value="{{old('titulo')}}" type="text" id="titulo" name="titulo" placeholder="Titulo de la publicación" class="border p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror">
                @error('titulo')
                <span class="text-red-500 text-sm">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">Descripción</label>
                <textarea  id="descripcion" name="descripcion" placeholder="Descripción de la publicación" class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror">{{old('descripcion')}}</textarea>
                @error('descripcion')
                <span class="text-red-500 text-sm">{{$message}}</span>
                @enderror
            </div>
            <input type="submit" value="Subir" class="bg-sky-600 hover:bg-sky-700 transition-colorscursor-pointer uppdercase font-bold w-full p-3 text-white rounded-lg cursor-pointer" />

        </form>
    </div>

   
</div>
@endsection