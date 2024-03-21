<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Index</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>

    <header class="p-6">
        @if (Route::has('login'))
            <div class="flex justify-center">
                <a href="/"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline-red-500 focus:ring-2 focus:ring-primary-500 rounded-sm px-3 py-2 bg-white">
                    Home
                </a>
                <a href="/blog"
                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline-red-500 focus:ring-2 focus:ring-primary-500 rounded-sm px-3 py-2 bg-white">
                    Blog
                </a>
                @auth
                    <a href="{{ url('/profile') }}"
                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline-red-500 focus:ring-2 focus:ring-primary-500 rounded-sm px-3 py-2 bg-white">
                        Profile
                    </a>
                    {{-- <a href="#"
                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline-red-500 focus:ring-2 focus:ring-primary-500 rounded-sm px-3 py-2 bg-white">
                    {{ Auth::user()->name }}
                </a> --}}
                    <form class="flex" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="route('logout')"
                            onclick="event.preventDefault();
                                this.closest('form').submit();"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline-red-500 focus:ring-2 focus:ring-primary-500 rounded-sm px-3 py-2 bg-white">
                            Logout
                        </a>
                    </form>
                @else
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline-red-500 focus:ring-2 focus:ring-primary-500 rounded-sm px-3 py-2 bg-white">
                            Register
                        </a>
                    @endif
                    <a href="{{ route('login') }}"
                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline-red-500 focus:ring-2 focus:ring-primary-500 rounded-sm px-3 py-2 bg-white">
                        Log in
                    </a>
                @endauth
            </div>
        @endif
    </header>

    <div>
        @yield('content')
    </div>

    {{-- Footer --}}
    <div>
        @include('layouts.footer')
    </div>

</body>

<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
@yield('script')
</html>
