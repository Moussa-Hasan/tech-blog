@extends('layouts.layout')

@section('content')
    {{-- Hero Section --}}
    <div class="hero-bg-image flex flex-col items-center justify-center">

        <h1 class="text-gray-100 text-5xl uppercase font-bold pb-5 text-center">Welcome To My Blog</h1>
        <a href="/blog" class="btn bg-gray-100 text-gray-700 py-4 px-5 rounded-lg hover:bg-gray-400 transition duration-200 font-bold uppercase">Start
            Reading</a>

    </div>

    {{-- How To Be Section --}}
    <div class="container sm:grid grid-cols-2 gap-14 mx-auto py-14">
        <div class="mx-2 md:mx-0">
            <img class="sm:rounded-lg" src="https://picsum.photos/id/119/960/620" alt="">
        </div>
        <div class="flex flex-col justify-center m-10 sm:m-0">
            <h2 class="uppercase font-bold text-gray-700 text-4xl">How to be a programmer in 2023</h2>
            <p class="text-gray-600 text-xl pt-6">Engage with other programmers and participate in collaborative projects or
                open-source initiatives. Networking with fellow developers can provide valuable insights, mentorship
                opportunities, and potential career prospects.</p>
            <p class="text-gray-500 text-sm py-4 leading-6">Start by selecting a programming language that aligns with your
                interests and goals, such as Python, JavaScript, Java, or C++. Each language has its strengths and
                applications, so research and choose one to begin with.</p>
            <a class="btn bg-gray-200 text-gray-600 py-4 px-5 rounded-lg hover:bg-gray-300 font-bold uppercase place-self-start"
                href="/">Read More</a>
        </div>
    </div>

    {{-- Blog Categories --}}
    <div class="text-center bg-gray-700 text-gray-100 p-14">
        <h2 class="text-2xl">Blog Categories</h2>
        <div class="container mx-auto pt-10 sm:grid grid-cols-4">
            <div class="font-bold text-2xl py-2">UX Design</div>
            <div class="font-bold text-2xl py-2">Programming</div>
            <div class="font-bold text-2xl py-2">Graphic</div>
            <div class="font-bold text-2xl py-2">Front-End</div>
        </div>
    </div>

    {{-- Recent Post --}}
    <div class="sm:grid grid-cols-2 w-4/5 mx-auto mt-14">
        <div class="flex bg-gray-700 text-gray-100 pt-10">
            <div class="block m-auto pt-4 pb-15 w-4/5">

                <ul class="md:flex text-xs gap-2">
                    <li
                        class="bg-gray-100 text-gray-700 p-2 rounded inline-block my-1 md:my-0 hover:bg-yellow-500 hover:text-gray-100 transition duration-300">
                        <a href="/">PHP</a>
                    </li>
                    <li
                        class="bg-gray-100 text-gray-700 p-2 rounded inline-block my-1 md:my-0 hover:bg-yellow-500 hover:text-gray-100 transition duration-300">
                        <a href="/">Programming</a>
                    </li>
                    <li
                        class="bg-gray-100 text-gray-700 p-2 rounded inline-block my-1 md:my-0 hover:bg-yellow-500 hover:text-gray-100 transition duration-300">
                        <a href="/">Languages</a>
                    </li>
                    <li
                        class="bg-gray-100 text-gray-700 p-2 rounded inline-block my-1 md:my-0 hover:bg-yellow-500 hover:text-gray-100 transition duration-300">
                        <a href="/">Backend</a>
                    </li>
                </ul>

                <h3 class="text-l py-10 leading-6">
                    PHP is a general-purpose scripting language geared toward web development. It was originally created by
                    Danish-Canadian programmer Rasmus Lerdorf in 1993 and released in 1995. The PHP reference implementation
                    is now produced by The PHP Group. PHP is a server scripting language, and a powerful tool for making
                    dynamic and interactive Web pages. PHP is a widely-used, free, and efficient alternative to
                </h3>

                <a href="/"
                    class="btn bg-transparent border-2 text-gray-100 py-4 px-5 mb-5 rounded-lg font-bold uppercase text-l inline-block hover:bg-gray-100 hover:text-gray-700 transition duration-300">Read
                    More</a>
            </div>
        </div>

        <div class="flex">
            <img class="object-cover" src="https://picsum.photos/id/201/960/620" alt="">
        </div>
    </div>
@endsection
