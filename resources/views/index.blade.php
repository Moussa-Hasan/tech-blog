@extends('layouts.layout')

@section('content')
    {{-- Hero Section --}}
    <div class="hero-bg-image flex flex-col items-center justify-center">

        <h1 class="text-gray-100 text-5xl uppercase font-bold pb-5 text-center">Welcome To Tech Blog</h1>
        <a href="/blog"
            class="btn bg-gray-100 text-gray-700 py-4 px-5 rounded-lg hover:bg-gray-400 transition duration-200 font-bold uppercase">Start
            Reading</a>

    </div>

    {{-- How To Be Section --}}
    <div class="container sm:grid grid-cols-2 gap-14 mx-auto py-14">
        <div class="mx-2 md:mx-0">
            <img class="sm:rounded-lg" src="https://picsum.photos/id/1/960/620" alt="">
        </div>
        <div class="flex flex-col justify-center m-10 sm:m-0">
            <h2 class="uppercase font-bold text-gray-700 text-3xl">The Best 7 Frontend Frameworks for Developers in 2024</h2>
            <p class="text-gray-600 text-xl pt-6">Which frontend frameworks should developers focus on in 2024? We’re listing them for you and showing advantages and drawbacks. You’ll notice we included some libraries as well, because you can’t miss those in 2024.</p>
            <p class="text-gray-500 text-sm py-4 leading-6">According to online users, the best way to start with frameworks is actually… not using frameworks. Yes, many users point out that before learning frameworks, you should get along well with HTML, JavaScript, and CSS. Only then, after being fantastic at those, and especially with JavaScript, you should start with frameworks.</p>
            <a class="btn bg-gray-200 text-gray-600 py-4 px-5 rounded-lg hover:bg-gray-300 font-bold uppercase place-self-start"
                href="/blog">Read More</a>
        </div>
    </div>

    {{-- Blog Categories --}}
    <div class="text-center bg-slate-700 text-gray-100 p-14">
        <h2 class="text-2xl font-semibold">Blog Categories</h2>
        <div class="container mx-auto pt-10 sm:grid grid-cols-4">
            <div class="text-xl py-2 px-2">General</div>
            <div class="text-xl py-2 px-2">Programming</div>
            <div class="text-xl py-2 px-2">Web Development</div>
            <div class="text-xl py-2 px-2">Mobile Development</div>
            <div class="text-xl py-2 px-2">Data Science</div>
            <div class="text-xl py-2 px-2">Machine Learning</div>
            <div class="text-xl py-2 px-2">Artificial Intelligence</div>
            <div class="text-xl py-2 px-2">Hardware</div>
            <div class="text-xl py-2 px-2">Cybersecurity</div>
            <div class="text-xl py-2 px-2">Networking</div>
            <div class="text-xl py-2 px-2">Cloud Computing</div>
            <div class="text-xl py-2 px-2">Blockchain</div>
            <div class="text-xl py-2 px-2">Robotics</div>
            <div class="text-xl py-2 px-2">UI/UX</div>
            <div class="text-xl py-2 px-2">Virtual Reality</div>
            <div class="text-xl py-2 px-2">Augmented Reality</div>
            <div class="text-xl py-2 px-2">Internet of Things (IoT)</div>
            <div class="text-xl py-2 px-2">Big Data</div>
            <div class="text-xl py-2 px-2">Nanotechnology</div>
            <div class="text-xl py-2 px-2">Software Engineering</div>
        </div>
    </div>

    {{-- Recent Post --}}
    <div class="sm:grid grid-cols-2 w-4/5 mx-auto mt-14 mb-14">
        <div class="flex bg-slate-700 text-gray-100 pt-10">
            <div class="block m-auto pt-4 pb-15 w-4/5">

                <ul class="md:flex text-xs gap-2">
                    <li
                        class="bg-gray-100 text-slate-800 p-2 rounded inline-block my-1 md:my-0 hover:bg-yellow-500 hover:text-gray-100 transition duration-100 cursor-pointer">
                        <a>Time</a>
                    </li>
                    <li
                        class="bg-gray-100 text-slate-800 p-2 rounded inline-block my-1 md:my-0 hover:bg-yellow-500 hover:text-gray-100 transition duration-100 cursor-pointer">
                        <a>Programming</a>
                    </li>
                    <li
                        class="bg-gray-100 text-slate-800 p-2 rounded inline-block my-1 md:my-0 hover:bg-yellow-500 hover:text-gray-100 transition duration-100 cursor-pointer">
                        <a>Productivity</a>
                    </li>
                    <li
                        class="bg-gray-100 text-slate-800 p-2 rounded inline-block my-1 md:my-0 hover:bg-yellow-500 hover:text-gray-100 transition duration-100 cursor-pointer">
                        <a>Career</a>
                    </li>
                </ul>

                <h3 class="text-l py-10 leading-6">
                    Effective time management is crucial for programmers to maximize productivity and achieve their goals
                    efficiently. Whether you're working on complex coding projects or troubleshooting bugs, mastering time
                    management techniques can significantly enhance your performance. Learn how to prioritize tasks,
                    eliminate distractions, and maintain focus to become a more efficient programmer.
                </h3>

                <a href="/blog"
                    class="btn bg-transparent border-2 text-gray-100 py-4 px-5 mb-5 rounded-lg font-bold uppercase text-l inline-block hover:bg-gray-100 hover:text-gray-700 transition duration-300">Read
                    More</a>
            </div>
        </div>

        <div class="flex">
            <img class="object-cover" src="https://picsum.photos/id/4/960/620" alt="">
        </div>
    </div>
@endsection
