<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body{
                background-image: url("{{ asset('images/ft-bg.jpg') }}");
                background-size: contain;
                background-position: center top;
                /* background-repeat: no-repeat;
                background-color: #111827; */
                background-attachment: fixed;
            }
            </style>
            @stack('styles')
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <footer class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                <center class="text-sm text-gray-500 dark:text-gray-400">
                    © {{ date('Y') }} {{ config('app.name', 'MovieApp') }}. All Rights Reserved.
                </center>
            </div>
        </footer>
    </body>
    <script>
        setTimeout(function(){
            var div = document.getElementById("myDiv");
            if (div){
                div.style.display = "none";
            }
        }, 2000);
    </script>
</html>
