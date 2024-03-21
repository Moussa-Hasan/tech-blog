@extends('layouts.layout')

@section('content')
    <div class="container m-auto text-center pt-15 pb-4 mt-2">
        <h1 class="text-6xl font-bold text-gray-700">All Posts</h1>
    </div>

    @if (session()->has('message'))
        <div class="flex justify-center">
            <div class="flex justify-center p-4 mb-4 text-sm w-48 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">{{ session()->get('message') }}</span>
            </div>
        </div>
    @endif

    @if (Auth::check())
        <div class="container sm:grid grid-cols-2 gap-14 mx-auto py-8 px-5">
            <a class="text-white bg-green-500 py-4 px-5 rounded-lg hover:bg-green-400 font-bold uppercase place-self-start duration-300"
                href="/blog/create">Add new post</a>
        </div>
    @endif


    @foreach ($posts as $post)
        <div class="container sm:grid grid-cols-2 gap-14 mx-auto py-14 px-5 border-b border-gray-300">
            <div class="flex">
                <img class="object-cover" src="/images/{{ $post->image_path }}" alt="">
            </div>

            <div>
                <h2 class="text-gray-700 text-4xl font-bold py-5 md:pt-0 pb-3">{{ $post->title }}</h2>
                <div>
                    By: <span class="text-gray-500 italic">{{ $post->user->name }}</span>
                    On: <span class="text-gray-500 italic">{{ date('d-m-Y', strtotime($post->updated_at)) }}</span>

                    <p class="text-gray-700 text-l leading-6 py-8">
                        {!! Illuminate\Support\Str::limit($post->description, 100) !!}
                    </p>

                    <a class="bg-gray-200 text-gray-600 py-4 px-5 rounded-lg hover:bg-gray-300 font-bold uppercase place-self-start duration-300"
                        href="/blog/{{ $post->slug }}">Read More</a>
                </div>
            </div>
        </div>
    @endforeach
@endsection
