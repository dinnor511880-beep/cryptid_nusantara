<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-horror text-2xl text-blood-500 leading-tight tracking-wider">👁 Laporan Penampakan</h2>
            <a href="{{ route('sightings.create') }}" class="horror-btn text-sm">+ Lapor Penampakan</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-6 p-4 horror-card border-emerald-700/50 text-emerald-300 text-sm">
                    ✓ {{ session('success') }}
                </div>
            @endif

            @if($sightings->count() > 0)
                <div class="grid gap-4">
                    @foreach($sightings as $sighting)
                        <div class="horror-card-hover p-6 border-l-2 border-phantom-700">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                <div class="flex-1">
                                    <div class="flex items-center gap-3 mb-2">
                                        <h3 class="text-lg font-bold text-gray-200">{{ $sighting->cryptid->name ?? 'Unknown Cryptid' }}</h3>
                                        <span class="danger-{{ strtolower($sighting->cryptid->danger_level ?? 'low') }}">{{ $sighting->cryptid->danger_level ?? '?' }}</span>
                                    </div>
                                    <p class="text-sm text-gray-400 mb-1">📍 {{ $sighting->location }} · 📅 {{ $sighting->sighting_date->format('d M Y') }}</p>
                                    <p class="text-sm text-gray-500 line-clamp-2">{{ Str::limit($sighting->kronologi, 150) }}</p>
                                    <p class="text-xs text-gray-600 mt-2">Saksi: {{ $sighting->user->name ?? 'Anonim' }} · {{ $sighting->created_at->diffForHumans() }}</p>
                                </div>
                                <div class="flex items-center gap-2 shrink-0">
                                    <a href="{{ route('sightings.show', $sighting) }}" class="px-3 py-1.5 text-xs font-medium text-gray-300 bg-abyss-200 border border-gray-700/50 rounded-lg hover:border-phantom-700/50 hover:text-phantom-400 transition-all">Detail</a>
                                    <a href="{{ route('sightings.edit', $sighting) }}" class="px-3 py-1.5 text-xs font-medium text-gray-300 bg-abyss-200 border border-gray-700/50 rounded-lg hover:border-phantom-700/50 hover:text-phantom-400 transition-all">Edit</a>
                                    <form action="{{ route('sightings.destroy', $sighting) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="px-3 py-1.5 text-xs font-medium text-gray-300 bg-abyss-200 border border-gray-700/50 rounded-lg hover:border-blood-500/50 hover:text-blood-400 hover:bg-blood-900/20 transition-all">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-6">{{ $sightings->links() }}</div>
            @else
                <div class="horror-card p-12 text-center">
                    <svg class="w-16 h-16 mx-auto text-gray-700 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    <p class="text-gray-500 mb-4">Belum ada laporan penampakan.</p>
                    <a href="{{ route('sightings.create') }}" class="horror-btn">Laporkan Penampakan Pertama</a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
