<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('cryptids.index') }}" class="text-gray-500 hover:text-blood-400 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <h2 class="font-horror text-2xl text-blood-500 leading-tight tracking-wider">⛧ {{ $cryptid->name }}</h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="horror-card p-8">
                <!-- Header -->
                <div class="flex items-start justify-between mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-100 mb-2">{{ $cryptid->name }}</h1>
                        <div class="flex items-center gap-3">
                            <span class="danger-{{ strtolower($cryptid->danger_level) }}">{{ $cryptid->danger_level }}</span>
                            @if($cryptid->status === 'approved')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-900/50 text-emerald-300 border border-emerald-700/30">✅ Approved</span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-yellow-900/50 text-yellow-300 border border-yellow-700/30">📝 Draft</span>
                            @endif
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('cryptids.edit', $cryptid) }}" class="horror-btn-phantom text-xs px-4 py-2">Edit</a>
                    </div>
                </div>

                <hr class="blood-divider mb-6">

                <!-- Description -->
                <div class="mb-8">
                    <h3 class="text-sm uppercase tracking-wider text-gray-500 mb-3">Deskripsi</h3>
                    <p class="text-gray-300 leading-relaxed whitespace-pre-line">{{ $cryptid->description }}</p>
                </div>

                <!-- Meta -->
                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="horror-card p-4">
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Dilaporkan Oleh</p>
                        <p class="text-gray-200 font-medium">{{ $cryptid->user->name ?? 'Unknown' }}</p>
                    </div>
                    <div class="horror-card p-4">
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Tanggal Entri</p>
                        <p class="text-gray-200 font-medium">{{ $cryptid->created_at->format('d M Y') }}</p>
                    </div>
                </div>

                <!-- Sightings -->
                <div>
                    <h3 class="text-sm uppercase tracking-wider text-gray-500 mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-phantom-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        Riwayat Penampakan ({{ $cryptid->sightings->count() }})
                    </h3>

                    @if($cryptid->sightings->count() > 0)
                        <div class="space-y-3">
                            @foreach($cryptid->sightings as $sighting)
                                <div class="horror-card p-4 border-l-2 border-phantom-700">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="text-sm font-medium text-gray-200">📍 {{ $sighting->location }}</p>
                                            <p class="text-xs text-gray-500 mt-1">{{ $sighting->sighting_date->format('d M Y') }} · oleh {{ $sighting->user->name ?? 'Anonim' }}</p>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-400 mt-2">{{ Str::limit($sighting->kronologi, 200) }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-sm text-gray-600">Belum ada penampakan yang dilaporkan.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
