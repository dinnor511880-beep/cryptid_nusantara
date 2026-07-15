<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Cryptid Tracker') }} - Enter the Darkness</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="fog-overlay"></div>

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-abyss-50 relative z-10">
            <!-- Animated Logo -->
            <div class="animate-float">
                <a href="/" class="group">
                    <x-application-logo class="w-20 h-20 fill-current text-blood-500 group-hover:text-blood-400 transition-colors duration-300" />
                </a>
            </div>

            <!-- App Title -->
            <h1 class="mt-3 font-horror text-2xl text-blood-500 animate-flicker tracking-wider">
                Cryptid Nusantara
            </h1>

            <!-- Form Card -->
            <div class="w-full sm:max-w-md mt-6 px-8 py-6 horror-card animate-slide-up">
                {{ $slot }}
            </div>

            <!-- Footer -->
            <p class="mt-6 text-xs text-gray-600 tracking-wider">
                ☠ Beware of what lurks in the shadows ☠
            </p>
        </div>
    </body>
</html>
