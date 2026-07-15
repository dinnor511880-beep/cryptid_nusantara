<x-app-layout>
    <x-slot name="header">
        <h2 class="font-horror text-2xl text-blood-500 leading-tight tracking-wider">👁 Lapor Penampakan Baru</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="horror-card p-8">
                <form method="POST" action="{{ route('sightings.store') }}">
                    @csrf

                    <div class="mb-5">
                        <x-input-label for="cryptid_id" :value="__('Makhluk yang Ditemui')" />
                        <select id="cryptid_id" name="cryptid_id" required class="horror-input w-full mt-1">
                            <option value="">-- Pilih Cryptid --</option>
                            @foreach($cryptids as $cryptid)
                                <option value="{{ $cryptid->id }}" {{ old('cryptid_id') == $cryptid->id ? 'selected' : '' }}>{{ $cryptid->name }} ({{ $cryptid->danger_level }})</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('cryptid_id')" class="mt-2" />
                    </div>

                    <div class="mb-5">
                        <x-input-label for="location" :value="__('Lokasi Penampakan')" />
                        <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')" required placeholder="Contoh: Hutan Alas Roban, Batang, Jawa Tengah" />
                        <x-input-error :messages="$errors->get('location')" class="mt-2" />
                    </div>

                    <div class="mb-5">
                        <x-input-label for="sighting_date" :value="__('Tanggal Penampakan')" />
                        <x-text-input id="sighting_date" class="block mt-1 w-full" type="date" name="sighting_date" :value="old('sighting_date')" required />
                        <x-input-error :messages="$errors->get('sighting_date')" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <x-input-label for="kronologi" :value="__('Kronologi Kejadian')" />
                        <textarea id="kronologi" name="kronologi" rows="5" required placeholder="Ceritakan apa yang Anda alami atau lihat secara detail..." class="horror-input w-full">{{ old('kronologi') }}</textarea>
                        <x-input-error :messages="$errors->get('kronologi')" class="mt-2" />
                    </div>

                    <hr class="blood-divider mb-6">

                    <div class="flex items-center justify-between">
                        <a href="{{ route('sightings.index') }}" class="text-sm text-gray-400 hover:text-gray-200 transition-colors">← Kembali</a>
                        <x-primary-button>
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Kirim Laporan
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
