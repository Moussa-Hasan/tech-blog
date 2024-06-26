@extends('layouts.layout')

@section('content')
    <div class="container m-auto text-center pt-15 pb-4 mt-2">
        <h1 class="text-xl md:text-2xl sm:text-2xl font-bold text-gray-700">All Posts</h1>
    </div>

    @if (Auth::check())
        <div class="flex justify-center">
            <a class="btn btn-sm bg-green-200 text-green-600 hover:bg-green-300 mt-2 uppercase"
                href="/blog/create">Add new post</a>
        </div>
    @endif

    @if (session()->has('message'))
        <div id="alert" class="flex justify-center mt-2">
            <div class="flex justify-center px-14 py-4 mb-4 text-sm w-92 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">{{ session()->get('message') }}</span>
            </div>
        </div>
    @endif

    <!-- Search Input & unused for now -->
    {{-- <div class="flex justify-center mt-4 px-4 sm:px-0">
        <input type="text" id="searchInput" placeholder="Search posts by title"
            class="w-full max-w-md border-b-2 border-gray-600 py-2 px-2 sm:px-4 text-gray-700 focus:outline-none rounded-lg shadow-sm">
    </div> --}}

    <ul id="postList" class="grid grid-cols-1 xl:grid-cols-3 gap-y-10 gap-x-6 items-start p-8">
        @foreach ($posts as $post)
            <li class="relative flex flex-col sm:flex-row xl:flex-col items-start">
                <div class="order-1 sm:ml-6 xl:ml-0">
                    <h3 class="mb-1 text-slate-900 font-semibold dark:text-slate-200">
                        <span class="block text-sm leading-6 text-indigo-500">
                            {{ $post->user->name }}
                        </span>
                        <span class="mb-1 block text-sm leading-6 text-indigo-500">
                            {{ date('d-m-Y', strtotime($post->updated_at)) }}
                        </span>
                        {{ $post->title }}
                    </h3>
                    <div class="prose prose-slate prose-sm text-slate-600 dark:prose-dark">
                        <p>{!! substr($post->description, 0, strrpos(substr($post->description, 0, 120), ' ')) !!}...</p>
                    </div>
                    <a class="btn group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
                        href="/blog/{{ $post->slug }}">
                        Learn more
                        <span class="sr-only">
                            {{ $post->title }}
                        </span>
                        <svg class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400 dark:text-slate-500 dark:group-hover:text-slate-400"
                            width="3" height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M0 0L3 3L0 6"></path>
                        </svg>
                    </a>
                </div>
                <a href="/blog/{{ $post->slug }}">
                    <img src="/images/{{ $post->image_path }}" alt=""
                        class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-full transition duration-300 ease-in-out transform hover:opacity-75"
                        width="1216" height="640">

                </a>
            </li>
        @endforeach
    </ul>

    <!-- Pagination Links -->
    <div class="my-4 mx-10">
        {{ $posts->links() }}
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
