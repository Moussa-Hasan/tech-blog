    <div class="navbar bg-base-100">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </div>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    @if (Route::has('login'))
                        <li><a href="/">Home</a></li>
                        <li><a href="/blog">Blog</a></li>
                        @auth
                            <li><a href="{{ url('/profile') }}">Profile</a></li>
                            <li>
                                <form class="flex" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                                </form>
                            </li>
                        @else
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                            <li><a href="{{ route('login') }}">Log in</a></li>
                        @endauth
                    @endif
                </ul>
            </div>
            <a href="/" class="btn btn-ghost text-xl text-gray-700">Tech Blog</a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                @if (Route::has('login'))
                    <li><a href="/">Home</a></li>
                    <li><a href="/blog">Blog</a></li>
                    @auth
                        <li><a href="{{ url('/profile') }}">Profile</a></li>
                        <li>
                            <form class="flex" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                            </form>
                        </li>
                    @else
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @endif
                        <li><a href="{{ route('login') }}">Log in</a></li>
                    @endauth
                @endif
            </ul>
        </div>
        <div class="navbar-end">

        </div>
    </div>
