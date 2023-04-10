@extends('layouts.app')
@section('title')
    Perfil: {{ $user->username }}
@endsection

@section('content')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12   lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12; lg:w-6/12 px-5">
                <img src="{{ $user->image ? asset('profiles') . '/' . $user->image : asset('img/profile.png') }}"
                    alt="Profile image" />
            </div>
            <div
                class="md:w-8/12; lg:w-6/12 px-5 flex flex-col  items-center md:justify-center md:items-start py-10 md:py-10">
                <div class="flex items-center gap-2">

                    <p class=" text-2xl">{{ $user->username }}</p>
                    @auth
                        @if (Auth::user()->id == $user->id)
                            <a href="{{ route('profile.index') }}">
                                <i class="fas fa-edit text-gray-500  hover:text-gray-700"></i>
                            </a>
                        @endif
                    @endauth
                </div>
                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                    0 <span class="font-normal">Seguidores</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0 <span class="font-normal">Siguiendo</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{ $posts->count() }} <span class="font-normal">Posts</span>
                </p>
            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Posts</h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

            @if (count($posts) == 0)
                <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay posts</p>
            @else
                @forelse ($posts as $post)
                    <div>
                        <a href="{{ route('posts.show', [$post->user, $post]) }}">
                            <img src="{{ asset('uploads') . '/' . $post->image }}" alt="Post image {{ $post->title }}" />
                        </a>

                    </div>
                @endforeach
            @endif
        </div>
        <div class=" mt-10">

            {{ $posts->links() }}

        </div>
    </section>
@endsection
