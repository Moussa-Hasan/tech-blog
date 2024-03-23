@extends('layouts.layout')

@section('content')
    @if (session()->has('message'))
        <div id="alert" class="flex justify-center">
            <div class="flex justify-center p-4 mb-4 text-sm w-48 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">{{ session()->get('message') }}</span>
            </div>
        </div>
    @endif

    <div class="container m-auto text-center pt-15 pb-8">
        <h1 class="text-xl md:text-3xl sm:text-2xl font-bold text-gray-700 px-4">{{ $post->title }}</h1>
        <div class="text-gray-700 mt-4">
            By: <span class="text-gray-500 italic">{{ $post->user->name }}</span>
            On: <span class="text-gray-500 italic">{{ date('d-m-Y', strtotime($post->updated_at)) }}</span>
        </div>
    </div>

    <div class="flex justify-center mb-4">
        @if (Auth::user() && Auth::user()->id == $post->user_id)
            <a href="/blog/{{ $post->slug }}/edit"
                class="btn btn-sm bg-green-200 hover:bg-green-700 text-green-700 hover:text-green-200 py-2 px-3 rounded-lg font-bold inline-block uppercase mr-2 transition duration-300 cursor-pointer">Edit</a>
        @endif

        @if (Auth::user() && Auth::user()->id == $post->user_id)
            <form class="inline-block" action="/blog/{{ $post->slug }}" method="POST">
                @csrf
                @method('delete')
                <button
                    class="btn btn-sm bg-red-200 hover:bg-red-700 text-red-700 hover:text-red-200 py-2 px-3 rounded-lg font-bold inline-block uppercase ml-2 transition duration-300 cursor-pointer">Delete</button>
            </form>
        @endif
    </div>


    <div class="container m-auto pt-15 pb-8">
        <div class="flex">
            <img src="/images/{{ $post->image_path }}" alt="" class="object-cover h-96 w-full">
        </div>
        <div class="text-gray-700 text-lg py-8 px-4 leading-8">
            {!! $post->description !!}
        </div>

    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var alert = document.getElementById('alert');
            if (alert) {
                setTimeout(function() {
                    alert.style.display = 'none';
                }, 2000);
            }
        });
    </script>
@endsection
