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
            <div>
                {{$slot}}
            </div>

            <p class="text-sm text-white text-center mb-1">Copyright © 2022 Swapp | All Rights Reserved</p>

        </div>
        @livewireScripts
    </body>
</html>
