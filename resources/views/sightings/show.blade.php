<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('sightings.index') }}" class="text-gray-500 hover:text-blood-400 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <h2 class="font-horror text-2xl text-blood-500 leading-tight tracking-wider">👁 Detail Penampakan</h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="horror-card p-8">
                <div class="flex items-start justify-between mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-100 mb-2">{{ $sighting->cryptid->name ?? 'Unknown' }}</h1>
                        <div class="flex items-center gap-3">
                            <span class="danger-{{ strtolower($sighting->cryptid->danger_level ?? 'low') }}">{{ $sighting->cryptid->danger_level ?? '?' }}</span>
                        </div>
                    </div>
                    <a href="{{ route('sightings.edit', $sighting) }}" class="horror-btn-phantom text-xs px-4 py-2">Edit</a>
                </div>

                <hr class="blood-divider mb-6">

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                    <div class="horror-card p-4">
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">📍 Lokasi</p>
                        <p class="text-gray-200 font-medium">{{ $sighting->location }}</p>
                    </div>
                    <div class="horror-card p-4">
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">📅 Tanggal</p>
                        <p class="text-gray-200 font-medium">{{ $sighting->sighting_date->format('d M Y') }}</p>
                    </div>
                    <div class="horror-card p-4">
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">👤 Saksi</p>
                        <p class="text-gray-200 font-medium">{{ $sighting->user->name ?? 'Anonim' }}</p>
                    </div>
                </div>

                <div>
                    <h3 class="text-sm uppercase tracking-wider text-gray-500 mb-3">Kronologi Kejadian</h3>
                    <p class="text-gray-300 leading-relaxed whitespace-pre-line">{{ $sighting->kronologi }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
