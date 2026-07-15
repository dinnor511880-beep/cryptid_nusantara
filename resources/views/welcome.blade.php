<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cryptid Nusantara - Track the Unknown</title>
        <meta name="description" content="Ensiklopedia dan pelacak makhluk misterius Nusantara. Dokumentasikan penampakan hantu, monster, dan cryptid lokal.">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-abyss-50 text-gray-200">
        <div class="fog-overlay"></div>

        <div class="relative z-10 min-h-screen flex flex-col">
            <!-- Navigation -->
            <nav class="p-6 flex justify-between items-center max-w-7xl mx-auto w-full">
                <div class="flex items-center gap-3">
                    <x-application-logo class="w-10 h-10 fill-current text-blood-500" />
                    <span class="font-horror text-xl text-blood-500">Cryptid Nusantara</span>
                </div>
                <div class="flex items-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="horror-btn text-sm">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-400 hover:text-blood-400 transition-colors text-sm font-medium">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="horror-btn text-sm">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </nav>

            <!-- Hero Section -->
            <main class="flex-1 flex flex-col items-center justify-center px-6 -mt-16">
                <div class="text-center max-w-3xl animate-slide-up">
                    <!-- Floating Skull -->
                    <div class="animate-float mb-8">
                        <x-application-logo class="w-28 h-28 mx-auto fill-current text-blood-500" />
                    </div>

                    <h1 class="font-horror text-5xl sm:text-7xl text-blood-500 animate-flicker tracking-wider mb-4">
                        Cryptid Nusantara
                    </h1>
                    
                    <p class="text-lg sm:text-xl text-gray-400 mb-2 font-light">
                        Ensiklopedia Makhluk Misterius Indonesia
                    </p>
                    <p class="text-sm text-gray-600 mb-10 max-w-xl mx-auto">
                        Dokumentasikan, lacak, dan pelajari entitas supernatural yang menghantui pelosok Nusantara. 
                        Dari Kuntilanak hingga Buto Ijo — semua tercatat di sini.
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="horror-btn text-base px-8 py-3">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                                Masuk Dashboard
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="horror-btn text-base px-8 py-3">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                                Mulai Berburu
                            </a>
                            <a href="{{ route('login') }}" class="horror-btn-phantom text-base px-8 py-3">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                                Masuk
                            </a>
                        @endauth
                    </div>
                </div>

                <!-- Feature Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto mt-20 mb-12 w-full animate-slide-up" style="animation-delay: 0.3s">
                    <div class="horror-card-hover p-6 text-center">
                        <div class="w-12 h-12 mx-auto mb-4 rounded-full bg-blood-900/30 border border-blood-700/30 flex items-center justify-center">
                            <svg class="w-6 h-6 text-blood-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        </div>
                        <h3 class="font-bold text-gray-200 mb-2">Ensiklopedia</h3>
                        <p class="text-sm text-gray-500">Database lengkap makhluk misterius dari seluruh Nusantara</p>
                    </div>
                    <div class="horror-card-hover p-6 text-center">
                        <div class="w-12 h-12 mx-auto mb-4 rounded-full bg-phantom-900/30 border border-phantom-700/30 flex items-center justify-center">
                            <svg class="w-6 h-6 text-phantom-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </div>
                        <h3 class="font-bold text-gray-200 mb-2">Catat Penampakan</h3>
                        <p class="text-sm text-gray-500">Laporkan setiap penampakan makhluk & lokasi kejadian</p>
                    </div>
                    <div class="horror-card-hover p-6 text-center">
                        <div class="w-12 h-12 mx-auto mb-4 rounded-full bg-blood-900/30 border border-blood-700/30 flex items-center justify-center">
                            <svg class="w-6 h-6 text-blood-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4.5c-.77-.833-2.694-.833-3.464 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
                        </div>
                        <h3 class="font-bold text-gray-200 mb-2">Level Bahaya</h3>
                        <p class="text-sm text-gray-500">Klasifikasi tingkat ancaman dari Low hingga Extreme</p>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="py-6 text-center border-t border-gray-800/30">
                <p class="text-xs text-gray-600">☠ Cryptid Nusantara &copy; {{ date('Y') }} — Beware of what lurks in the shadows ☠</p>
            </footer>
        </div>
    </body>
</html>
