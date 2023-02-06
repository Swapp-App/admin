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
            <div class="grow w-full flex flex-col justify-center">
                <div class="bg-white p-3 w-11/12 max-w-sm mx-auto rounded-xl">
                    <h1 class="text-center text-xl font-bold text-slate-400 uppercase mb-5">Login</h1>
                    {{ $slot }}
                </div>
            </div>
            <p class="text-sm text-white text-center mb-1">Copyright © 2022 Swapp | All Rights Reserved</p>

        </div>
        @livewireScripts
    </body>
</html>
