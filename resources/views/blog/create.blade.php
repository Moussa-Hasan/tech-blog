@extends('layouts.layout')

@section('content')
    <div class="container m-auto text-center pt-15 pb-8">
        <h1 class="text-6xl font-bold text-gray-700">Add new post</h1>
    </div>

    <div class="container m-auto pt-15 pb-8 px-4">
        <form action="/blog" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" placeholder="Title"
                class="w-full h-20 text-4xl rounded-lg shadow-lg border-b border-gray-300 bg-white text-gray-700 p-4 mb-5 outline-none">

            <textarea name="description" placeholder="Description"
                class="w-full h-60 text-lg rounded-lg shadow-lg border-b border-gray-300 bg-white text-gray-700 p-4 mb-5 outline-none"></textarea>


            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                                upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input id="dropzone-file" type="file" name="image" class="hidden" />
                </label>
            </div>


            <div class="flex justify-center">
                <button type="submit"
                    class="bg-green-200 hover:bg-green-700 text-green-700 hover:text-green-200 transition duration-300 cursor-pointer font-bold rounded-lg uppercase py-3 px-2 mt-7">
                    Submit the post
                </button>
            </div>
        </form>
    </div>
@endsection
