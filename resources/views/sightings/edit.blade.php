<x-app-layout>
    <x-slot name="header">
        <h2 class="font-horror text-2xl text-blood-500 leading-tight tracking-wider">👁 Edit Laporan Penampakan</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="horror-card p-8">
                <form method="POST" action="{{ route('sightings.update', $sighting) }}">
                    @csrf @method('PUT')

                    <div class="mb-5">
                        <x-input-label for="cryptid_id" :value="__('Makhluk yang Ditemui')" />
                        <select id="cryptid_id" name="cryptid_id" required class="horror-input w-full mt-1">
                            @foreach($cryptids as $cryptid)
                                <option value="{{ $cryptid->id }}" {{ old('cryptid_id', $sighting->cryptid_id) == $cryptid->id ? 'selected' : '' }}>{{ $cryptid->name }} ({{ $cryptid->danger_level }})</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('cryptid_id')" class="mt-2" />
                    </div>

                    <div class="mb-5">
                        <x-input-label for="location" :value="__('Lokasi Penampakan')" />
                        <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location', $sighting->location)" required />
                        <x-input-error :messages="$errors->get('location')" class="mt-2" />
                    </div>

                    <div class="mb-5">
                        <x-input-label for="sighting_date" :value="__('Tanggal Penampakan')" />
                        <x-text-input id="sighting_date" class="block mt-1 w-full" type="date" name="sighting_date" :value="old('sighting_date', $sighting->sighting_date->format('Y-m-d'))" required />
                        <x-input-error :messages="$errors->get('sighting_date')" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <x-input-label for="kronologi" :value="__('Kronologi Kejadian')" />
                        <textarea id="kronologi" name="kronologi" rows="5" required class="horror-input w-full">{{ old('kronologi', $sighting->kronologi) }}</textarea>
                        <x-input-error :messages="$errors->get('kronologi')" class="mt-2" />
                    </div>

                    <hr class="blood-divider mb-6">

                    <div class="flex items-center justify-between">
                        <a href="{{ route('sightings.index') }}" class="text-sm text-gray-400 hover:text-gray-200 transition-colors">← Kembali</a>
                        <x-primary-button>
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Perbarui Laporan
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
