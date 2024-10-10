<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    
    @vite(['resources/css/app.css','resources/js/app.js'])
    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;1,100;1,200&display=swap"
        rel="stylesheet" />
</head>

<body>
    <header class="container">
        <!-- Navbar -->
        @guest
        <nav class="navbar  flex justify-between md:justify-around py-4 backdrop-blur-md shadow-md w-full px-10 fixed top-0 left-0 right-0 z-10 md:px-3">
            <!-- Logo Container -->
            <div class="flex items-center">
                <!-- Logo -->
                <a href="{{route('landing')}}" class="cursor-pointer">
                    <h3 class="text-2xl font-medium text-blue-500">
                        <img class=" h-12 w-14" src="{{URL('images/acgg_logo.png')}}" alt="ACGGLogo" />
                    </h3>
                </a>
            </div>

            <!-- Links Section -->
            <div class="items-center md:space-x-8 justify-center justify-items-start md:justify-items-center md:flex md:pt-2 w-full left-0 top-16 px-5 md:px-10 py-3 md:py-0 border-t md:border-t-0 hidden">
                <a href="{{route('landing')}}" class="nav-text  flex hover:text-blue-500 cursor-pointer transition-colors duration-300"> Home </a>

                <a class="nav-text  flex hover:text-blue-500 cursor-pointer transition-colors duration-300"> How it Works </a>

                <a class="nav-text  flex hover:text-blue-500 cursor-pointer transition-colors duration-300"> About Us </a>
            </div>

            <!-- Auth Links -->
            <div class=" items-center space-x-5 hidden md:flex">
                <!-- Register -->
                <a href="{{ route('register') }}" class="nav-text  flex hover:text-blue-500 cursor-pointer transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 mr-2 mt-0.5 size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    Register
                </a>

                <!-- Login -->
                <a href="{{route('login')}}" class="nav-text  flex cursor-pointer transition-colors duration-300 font-semibold hover:text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 mr-2 mt-0.5 size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                    </svg>
                    Login
                </a>
            </div>

            <!-- Hamberger Menu -->
            <button
                class="w-10 h-10 md:hidden justify-self-end rounded-full hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </nav>
        @endguest

        @auth
        <nav class=" border-b border-gray-200 fixed z-30 w-full">
        <div class="dashBoard-nav  px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
        <div class="flex items-center justify-start">
            <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar" class="lg:hidden mr-2 text-gray-600 hover:text-gray-900 cursor-pointer p-2 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 rounded">
                <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
                <svg id="toggleSidebarMobileClose" class="w-6 h-6 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
            <a href="{{route('dashboard')}}" class="text-xl font-bold flex items-center lg:ml-2.5">
                <img src="{{URL('images/acgg_logo.png')}}" class="h-6 mr-2" alt="Windster Logo">
                <span class="self-center whitespace-nowrap">Acqua Care Green Guard</span>
            </a>
        </div>w
        <div class="flex items-center">
            <form action="{{route('logout')}}" method="post">
            @csrf
                <button class="flex cursor-pointer transition-colors duration-300 font-semibold hover:text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 mr-2 mt-0.5 size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                    </svg> Logout 
                </button>
            </form>
        </div>
        </div>
        </div>
        </nav>
        @endauth
    </header>

    {{-- Inside the main are the different contents such as:
        Index Page
        Dashboard Page
        Login Page
    --}}
    @guest
    <main class="flex flex-col items-center justify-center mt-32">
        {{$slot}}
    </main>
    @endguest

    @auth
    <main>
        {{$slot}}
    </main>
    @endauth
        
    {{-- Footer --}}
    @guest
    <footer class="footer sm:mt-10 w-full">
        <!-- Copyright Bar -->
        <div class="pt-2">
            <div class="white-txt  flex pb-5 px-3 m-auto pt-5 text-sm flex-col md:flex-row max-w-6xl">
                <div class="mt-2">© Copyright 2024-year. All Rights Reserved.</div>
            </div>
        </div>
    </footer>
    @endguest
</body>
</html>
