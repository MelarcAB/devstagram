@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <div class="container mx-auto md:flex ">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads/' . $post->image) }}" alt="{{ $post->title }}" />


            <div class="p-3 flex items-center gap-4">
                @auth
                    @if ($post->checkLike(Auth::user()))
                        <form action="{{ route('likes.destroy', $post) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <div class="my-4">
                                <button type="submit">
                                    <i class="fas fa-heart text-red-500"></i>
                                </button>
                            </div>
                        </form>
                    @else
                        <form action="{{ route('likes.store', $post) }}" method="post">
                            @csrf
                            <div class="my-4">
                                <button type="submit">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </form>
                    @endif
                @endauth
                <p>{{ $post->likes()->count() }} likes</p>
            </div>


            <div>
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                <p class="mt-5">{{ $post->description }}</p>
            </div>
            @auth
                @if (Auth::user()->id == $post->user_id)
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition-colors"
                            type="submit" value="Eliminar" />
                    </form>
                @endif

            @endauth
        </div>

        <div class="md:w-1/2 p-5">
            @if (Auth::check())
                <form action="{{ route('comments.store', [$post->user, $post]) }}" method="POST">
                    @csrf
                    <div class="p-5 rounded-lg  bg-slate-50 mb-5 shadow bra">
                        <!--<p class="text-xl font-bold text-center mb-4">Añadir comentario</p> -->
                        <div class="mb-5">

                            @if (session('message'))
                                <div class="bg-green-500 p-2 uppercase font-bold rounded-lg mb-6 text-white text-center">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <label for="comment" class="mb-2 block uppercase text-gray-500 font-bold">Añadir
                                comentario</label>
                            <textarea id="comment" name="comment" placeholder="Escribir un comentario"
                                class="border p-3 w-full rounded-lg @error('comment') border-red-500 @enderror">{{ old('comment') }}</textarea>
                            @error('comment')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <input type="submit" value="Comentar"
                            class="bg-sky-600 hover:bg-sky-700 transition-colorscursor-pointer uppdercase font-bold w-full p-3 text-white rounded-lg cursor-pointer" />
                    </div>
                </form>
            @endif

            <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll">
                @if ($post->comments->count() == 0)
                    <p class="p-10 text-center">No hay comentarios</p>
                @else
                    @foreach ($post->comments as $comment)
                        <div class="p-5 border-gray-300 border-b">
                            <a class="font-bold uppercase text-sky-600"
                                href="{{ route('posts.index', $comment->user) }}">{{ $comment->user->username }}</a>
                            <p>{{ $comment->comment }}</p>
                            <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                        </div>
                    @endforeach
                @endif

            </div>

        </div>
    @endsection
