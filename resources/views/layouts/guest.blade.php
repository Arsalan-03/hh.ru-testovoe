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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 to-blue-300">
        <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
            <div class="flex justify-center mb-6">
                <a href="/">
                    <x-application-logo class="w-16 h-16 fill-current text-blue-500" />
                </a>
            </div>
            {{ $slot }}
        </div>
    </body>
</html>
