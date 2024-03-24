@extends('layouts.layout')

@section('content')
    <div class="container m-auto text-center pt-15 pb-8">
        <h1 class="text-3xl md:text-5xl sm:text-4xl font-bold text-gray-700">Edit the post</h1>
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
                <option value="general" {{ $post->category == 'general' ? 'selected' : '' }}>General</option>
                <option value="programming" {{ $post->category == 'programming' ? 'selected' : '' }}>Programming</option>
                <option value="web-development" {{ $post->category == 'web-development' ? 'selected' : '' }}>Web Development
                </option>
                <option value="mobile-development" {{ $post->category == 'mobile-development' ? 'selected' : '' }}>Mobile
                    Development</option>
                <option value="data-science" {{ $post->category == 'data-science' ? 'selected' : '' }}>Data Science</option>
                <option value="machine-learning" {{ $post->category == 'machine-learning' ? 'selected' : '' }}>Machine
                    Learning</option>
                <option value="artificial-intelligence"
                    {{ $post->category == 'artificial-intelligence' ? 'selected' : '' }}>Artificial Intelligence</option>
                <option value="hardware" {{ $post->category == 'hardware' ? 'selected' : '' }}>Hardware</option>
                <option value="cybersecurity" {{ $post->category == 'cybersecurity' ? 'selected' : '' }}>Cybersecurity
                </option>
                <option value="networking" {{ $post->category == 'networking' ? 'selected' : '' }}>Networking</option>
                <option value="cloud-computing" {{ $post->category == 'cloud-computing' ? 'selected' : '' }}>Cloud
                    Computing</option>
                <option value="blockchain" {{ $post->category == 'blockchain' ? 'selected' : '' }}>Blockchain</option>
                <option value="robotics" {{ $post->category == 'robotics' ? 'selected' : '' }}>Robotics</option>
                <option value="ui-ux" {{ $post->category == 'ui-ux' ? 'selected' : '' }}>UI/UX Design</option>
                <option value="virtual-reality" {{ $post->category == 'virtual-reality' ? 'selected' : '' }}>Virtual
                    Reality</option>
                <option value="augmented-reality" {{ $post->category == 'augmented-reality' ? 'selected' : '' }}>Augmented
                    Reality</option>
                <option value="iot" {{ $post->category == 'iot' ? 'selected' : '' }}>Internet of Things (IoT)</option>
                <option value="big-data" {{ $post->category == 'big-data' ? 'selected' : '' }}>Big Data</option>
                <option value="nanotechnology" {{ $post->category == 'nanotechnology' ? 'selected' : '' }}>Nanotechnology
                </option>
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
                    class="btn bg-green-200 hover:bg-green-700 text-green-700 hover:text-green-200 transition duration-300 cursor-pointer font-bold rounded-lg uppercase py-3 px-2 mt-7">
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
