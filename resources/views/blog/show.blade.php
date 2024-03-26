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

    <div class="container mx-auto text-center sm:px-4 md:px-8 lg:px-16 xl:px-24 pt-8 pb-8 mt-5">
        <h1 class="text-xl md:text-3xl sm:text-2xl font-bold text-gray-700 px-4">{{ $post->title }}</h1>
        <div class="text-gray-700 mt-4">
            By: <span class="text-gray-500 italic">{{ $post->user->name }}</span>
            &nbsp;&nbsp;&nbsp; <!-- spaces -->
            On: <span class="text-gray-500 italic">{{ date('d-m-Y', strtotime($post->updated_at)) }}</span>
            &nbsp;&nbsp;&nbsp; <!-- spaces -->
            Category: <span class="text-gray-500 italic">{{ $post->category }}</span>
        </div>
    </div>


    <div class="flex justify-center">
        @if (Auth::user() && Auth::user()->id == $post->user_id)
            <a href="/blog/{{ $post->slug }}/edit"
                class="btn btn-sm bg-green-200 text-green-600 hover:bg-green-300 ml-2 uppercase">Edit</a>
        @endif

        @if (Auth::user() && Auth::user()->id == $post->user_id)
            <form id="deleteForm" class="inline-block" action="/blog/{{ $post->slug }}" method="POST">
                @csrf
                @method('delete')
                <button onclick="delete_modal.showModal()" type="button"
                    class="btn btn-sm bg-red-200 text-red-600 hover:bg-red-300 ml-2 uppercase">Delete</button>
            </form>
        @endif

    </div>

    <dialog id="delete_modal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Confirmation</h3>
            <p class="py-4">Are you sure you want to delete this post?</p>
            <div class="modal-action">
                <form method="dialog" onsubmit="return confirmDelete()">
                    @csrf
                    @method('delete')
                    <button type="submit"
                        class="btn btn-sm bg-red-200 text-red-600 hover:bg-red-300 uppercase">Confirm
                        Delete</button>
                    <button type="button" onclick="delete_modal.close()" class="btn btn-sm bg-gray-200 text-gray-600 hover:bg-gray-300 uppercase">Cancel</button>
                </form>
            </div>
        </div>
    </dialog>

    <div class="container mx-auto px-4 lg:px-8 py-8">
        <div class="flex justify-center">
            <img src="/images/{{ $post->image_path }}" alt=""
                class="object-cover h-auto max-w-full rounded-sm shadow-sm">
        </div>
        <div class="text-gray-700 text-lg py-8 leading-8 max-w-screen-lg mx-auto">
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

        function confirmDelete() {
            document.getElementById("deleteForm").submit();
            return true;
        }
    </script>
@endsection
