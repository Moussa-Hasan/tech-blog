@extends('layouts.layout')

@section('content')
    <div class="container m-auto text-center pt-15 pb-8">
        <h1 class="text-xl md:text-2xl sm:text-2xl font-bold text-gray-700">Edit the post</h1>
    </div>

    <div class="container m-auto pt-15 pb-8 px-4">

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-5 mt-5" role="alert">
                <strong class="font-bold">Oops! Something went wrong.</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/blog/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" name="title" value="{{ $post->title }}"
                class="w-full h-12 text-xl rounded-lg shadow-lg border-b border-gray-300 bg-white text-gray-700 p-4 mb-5 outline-none">

            <textarea name="description" id="editor"
                class="w-full h-60 text-lg rounded-lg shadow-lg border-b border-gray-300 bg-white text-gray-700 p-4 mb-5 outline-none">{{ $post->description }}</textarea>

            <!-- Category Select Input -->
            <select name="category"
                class="w-full h-16 text-lg rounded-lg shadow-md border-b border-gray-300 bg-white text-gray-700 p-4 mb-5 mt-5 outline-none">
                <option value="" disabled>Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category }}" {{ $post->category == $category ? 'selected' : '' }}>
                        {{ ucfirst(str_replace('-', ' ', $category)) }}</option>
                @endforeach
            </select>

            <div class="flex items-center justify-center w-full mt-4">
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
                    class="btn btn-md bg-green-200 text-green-600 hover:bg-green-300 mt-7 uppercase">
                    Submit the post
                </button>
            </div>

        </form>
    </div>
@endsection

@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
