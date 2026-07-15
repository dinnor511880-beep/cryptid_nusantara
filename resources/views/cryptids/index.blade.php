<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-horror text-2xl text-blood-500 leading-tight tracking-wider">⛧ Direktori Cryptid</h2>
            <a href="{{ route('cryptids.create') }}" class="horror-btn text-sm">+ Tambah Cryptid</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-6 p-4 horror-card border-emerald-700/50 text-emerald-300 text-sm">
                    ✓ {{ session('success') }}
                </div>
            @endif

            @if($cryptids->count() > 0)
                <div class="grid gap-4">
                    @foreach($cryptids as $cryptid)
                        <div class="horror-card-hover p-6">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                <div class="flex-1">
                                    <div class="flex items-center gap-3 mb-2">
                                        <h3 class="text-lg font-bold text-gray-200">{{ $cryptid->name }}</h3>
                                        <span class="danger-{{ strtolower($cryptid->danger_level) }}">{{ $cryptid->danger_level }}</span>
                                        @if($cryptid->status === 'draft')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-yellow-900/50 text-yellow-300 border border-yellow-700/30">Draft</span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-900/50 text-emerald-300 border border-emerald-700/30">Approved</span>
                                        @endif
                                    </div>
                                    <p class="text-sm text-gray-500 line-clamp-2">{{ Str::limit($cryptid->description, 150) }}</p>
                                    <p class="text-xs text-gray-600 mt-2">Oleh: {{ $cryptid->user->name ?? 'Unknown' }} · {{ $cryptid->created_at->diffForHumans() }} · {{ $cryptid->sightings->count() }} penampakan</p>
                                </div>
                                <div class="flex items-center gap-2 shrink-0">
                                    <a href="{{ route('cryptids.show', $cryptid) }}" class="px-3 py-1.5 text-xs font-medium text-gray-300 bg-abyss-200 border border-gray-700/50 rounded-lg hover:border-blood-700/50 hover:text-blood-400 transition-all">Detail</a>
                                    <a href="{{ route('cryptids.edit', $cryptid) }}" class="px-3 py-1.5 text-xs font-medium text-gray-300 bg-abyss-200 border border-gray-700/50 rounded-lg hover:border-phantom-700/50 hover:text-phantom-400 transition-all">Edit</a>
                                    <form action="{{ route('cryptids.destroy', $cryptid) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus cryptid ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="px-3 py-1.5 text-xs font-medium text-gray-300 bg-abyss-200 border border-gray-700/50 rounded-lg hover:border-blood-500/50 hover:text-blood-400 hover:bg-blood-900/20 transition-all">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6">{{ $cryptids->links() }}</div>
            @else
                <div class="horror-card p-12 text-center">
                    <svg class="w-16 h-16 mx-auto text-gray-700 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    <p class="text-gray-500 mb-4">Belum ada cryptid yang terdaftar.</p>
                    <a href="{{ route('cryptids.create') }}" class="horror-btn">Tambah Cryptid Pertama</a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
