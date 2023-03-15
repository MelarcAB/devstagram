@extends('layouts.app')

@section('title')
Subir publicación
@endsection

@section('content')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

<div class="md:flex md:items-center">
    <div class="md:w-1/2 px-10">
        <form action="{{ route('imagen.store') }}"  enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
            @csrf
        </form>
    </div>
    <div class="md:w-1/2 bg-white p-10 m-3  mt-10 md:mt-3 rounded-lg shadow-md">
        <form method="POST" action="{{ route('posts.store') }}" novalidate>
            @csrf
            <div class="mb-5">
                <label for="title" class="mb-2 block uppercase text-gray-500 font-bold">Título</label>
                <input value="{{old('title')}}" type="text" id="title" name="title" placeholder="Titulo de la publicación" class="border p-3 w-full rounded-lg @error('title') border-red-500 @enderror">
                @error('title')
                <span class="text-red-500 text-sm">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="description" class="mb-2 block uppercase text-gray-500 font-bold">Descripción</label>
                <textarea  id="description" name="description" placeholder="Descripción de la publicación" class="border p-3 w-full rounded-lg @error('description') border-red-500 @enderror">{{old('description')}}</textarea>
                @error('description')
                <span class="text-red-500 text-sm">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-5">
                <input type="hidden" name="image" id="image" value="{{ old('image') }}">
                @error('image')
                <span class="text-red-500 text-sm">{{$message}}</span>
                @enderror
            </div>
            <input type="submit" value="Subir" class="bg-sky-600 hover:bg-sky-700 transition-colorscursor-pointer uppdercase font-bold w-full p-3 text-white rounded-lg cursor-pointer" />

        </form>
    </div>

   
</div>
@endsection