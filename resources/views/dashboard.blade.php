<x-app-layout>
    <x-slot name="header">
        <h2 class="font-horror text-2xl text-blood-500 leading-tight tracking-wider">
            {{ __('⛧ Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="horror-card p-6 mb-8">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-full bg-blood-900/30 border border-blood-700/30 flex items-center justify-center animate-pulse-glow">
                        <svg class="w-7 h-7 text-blood-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-200">Selamat datang, {{ Auth::user()->name }}!</h3>
                        <p class="text-sm text-gray-500">Role: <span class="font-semibold text-blood-400 uppercase">{{ Auth::user()->role }}</span> — Siap berburu makhluk misterius?</p>
                    </div>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="horror-card-hover p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 uppercase tracking-wider">Total Cryptid</p>
                            <p class="text-3xl font-bold text-blood-400 mt-1">{{ \App\Models\Cryptid::count() }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-lg bg-blood-900/30 border border-blood-700/30 flex items-center justify-center">
                            <svg class="w-6 h-6 text-blood-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        </div>
                    </div>
                </div>
                <div class="horror-card-hover p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 uppercase tracking-wider">Total Penampakan</p>
                            <p class="text-3xl font-bold text-phantom-400 mt-1">{{ \App\Models\Sighting::count() }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-lg bg-phantom-900/30 border border-phantom-700/30 flex items-center justify-center">
                            <svg class="w-6 h-6 text-phantom-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </div>
                    </div>
                </div>
                <div class="horror-card-hover p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 uppercase tracking-wider">Total Hunter</p>
                            <p class="text-3xl font-bold text-emerald-400 mt-1">{{ \App\Models\User::count() }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-lg bg-emerald-900/30 border border-emerald-700/30 flex items-center justify-center">
                            <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="horror-card p-6">
                <h3 class="text-lg font-bold text-gray-200 mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-blood-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    Quick Actions
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a href="{{ route('cryptids.index') }}" class="horror-card-hover p-4 flex items-center gap-3 group">
                        <div class="w-10 h-10 rounded-lg bg-blood-900/30 border border-blood-700/30 flex items-center justify-center group-hover:bg-blood-800/40 transition-colors">
                            <svg class="w-5 h-5 text-blood-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                        </div>
                        <span class="text-sm text-gray-300 group-hover:text-blood-400 transition-colors">Lihat Cryptid</span>
                    </a>
                    <a href="{{ route('cryptids.create') }}" class="horror-card-hover p-4 flex items-center gap-3 group">
                        <div class="w-10 h-10 rounded-lg bg-phantom-900/30 border border-phantom-700/30 flex items-center justify-center group-hover:bg-phantom-800/40 transition-colors">
                            <svg class="w-5 h-5 text-phantom-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        </div>
                        <span class="text-sm text-gray-300 group-hover:text-phantom-400 transition-colors">Tambah Cryptid</span>
                    </a>
                    <a href="{{ route('sightings.index') }}" class="horror-card-hover p-4 flex items-center gap-3 group">
                        <div class="w-10 h-10 rounded-lg bg-blood-900/30 border border-blood-700/30 flex items-center justify-center group-hover:bg-blood-800/40 transition-colors">
                            <svg class="w-5 h-5 text-blood-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </div>
                        <span class="text-sm text-gray-300 group-hover:text-blood-400 transition-colors">Lihat Penampakan</span>
                    </a>
                    <a href="{{ route('sightings.create') }}" class="horror-card-hover p-4 flex items-center gap-3 group">
                        <div class="w-10 h-10 rounded-lg bg-phantom-900/30 border border-phantom-700/30 flex items-center justify-center group-hover:bg-phantom-800/40 transition-colors">
                            <svg class="w-5 h-5 text-phantom-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        </div>
                        <span class="text-sm text-gray-300 group-hover:text-phantom-400 transition-colors">Lapor Penampakan</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
