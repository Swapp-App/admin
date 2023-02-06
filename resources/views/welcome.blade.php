<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin Panel | Swapp App </title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="antialiased">
        <div class="flex flex-col items-center justify-center w-screen h-screen bg-gradient-to-r from-[#fc4a1a] to-[#f4c05c]">
            <div class="relative grow flex flex-col items-center justify-center">
                <h1 class="text-white text-5xl font-bold font-montserrat text-center z-10">Swapp App</h1>
                <p class="text-white font-medium text-xl uppercase text-center z-10">Admin Panel</p>
                <img class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-0" src="/images/swapp-logo.webp" alt="">
            
                @if (Route::has('login'))
                    <div class="z-10 mt-10">
                        @auth
                            <a href="{{ url('/dashboard') }}" class=" bg-white py-2 px-4 rounded-3xl shadow-lg">
                                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#fc4a1a] to-[#f4c05c] font-bold">Dashboard</span>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="bg-white py-2 px-4 rounded-3xl shadow-lg">
                                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#fc4a1a] to-[#f4c05c] font-bold">Log in</span>
                            </a>
                        @endauth
                    </div>
                @endif
            </div>

            <a class="mb-6 bg-white py-2 px-4 rounded-3xl shadow-lg" href="https://swappapps.com">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#fc4a1a] to-[#f4c05c] font-bold">Main Website</span>
            </a>

            <p class="text-sm text-white text-center mb-1">Copyright © 2022 Swapp | All Rights Reserved</p>

        </div>
        @livewireScripts
    </body>
</html>
