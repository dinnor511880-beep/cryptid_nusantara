<x-app-layout>
    <x-slot name="header">
        <h2 class="font-horror text-2xl text-blood-500 leading-tight tracking-wider">⛧ Tambah Cryptid Baru</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="horror-card p-8">
                <form method="POST" action="{{ route('cryptids.store') }}">
                    @csrf

                    <div class="mb-5">
                        <x-input-label for="name" :value="__('Nama Makhluk')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required placeholder="Contoh: Kuntilanak, Pocong, Buto Ijo..." />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mb-5">
                        <x-input-label for="description" :value="__('Deskripsi')" />
                        <textarea id="description" name="description" rows="5" required placeholder="Ceritakan asal-usul, ciri-ciri fisik, dan kebiasaan makhluk ini..." class="horror-input w-full">{{ old('description') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <x-input-label for="danger_level" :value="__('Tingkat Bahaya')" />
                        <select id="danger_level" name="danger_level" required class="horror-input w-full mt-1">
                            <option value="">-- Pilih Tingkat --</option>
                            <option value="Low" {{ old('danger_level') == 'Low' ? 'selected' : '' }}>🟢 Low - Jinak / Tidak Berbahaya</option>
                            <option value="Medium" {{ old('danger_level') == 'Medium' ? 'selected' : '' }}>🟡 Medium - Perlu Waspada</option>
                            <option value="High" {{ old('danger_level') == 'High' ? 'selected' : '' }}>🔴 High - Sangat Berbahaya</option>
                            <option value="Extreme" {{ old('danger_level') == 'Extreme' ? 'selected' : '' }}>💀 Extreme - Mematikan</option>
                        </select>
                        <x-input-error :messages="$errors->get('danger_level')" class="mt-2" />
                    </div>

                    <hr class="blood-divider mb-6">

                    <div class="flex items-center justify-between">
                        <a href="{{ route('cryptids.index') }}" class="text-sm text-gray-400 hover:text-gray-200 transition-colors">← Kembali</a>
                        <x-primary-button>
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Simpan Cryptid
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
