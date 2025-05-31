@extends('layouts.app')

@section('content')
<div class="flex h-screen bg-gray-100">
    @include('layouts.sidebar')
    @include('layouts.nav')

    <main class="flex-1 overflow-auto p-6 max-w-full ml-6">
        <h2 class="text-3xl font-bold text-[#640D5F] mb-8">Tambahkan Event Baru</h2>
    
    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- Judul Event --}}
        <div>
            <label for="title" class="block text-gray-700 font-semibold mb-2">Judul Event <span class="text-red-500">*</span></label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
                class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#640D5F] @error('title') border-red-500 @enderror"
                placeholder="Masukkan judul event...">
            @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Gambar Event --}}
        <div>
            <label for="image" class="block text-gray-700 font-semibold mb-2">Gambar Event <span class="text-red-500">*</span></label>
            <input type="file" name="image" id="image" accept="image/*"
                class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4
                       file:rounded-md file:border-0
                       file:text-sm file:font-semibold
                       file:bg-[#640D5F] file:text-white
                       hover:file:bg-[#510a4d]
                       focus:outline-none"
                onchange="previewImage(event)">
            @error('image') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            <div class="mt-4">
                <img id="image-preview" src="#" alt="Preview Gambar" class="rounded-md shadow-md max-h-48 mx-auto hidden">
            </div>
        </div>

        {{-- Tipe & Pembicara --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="type" class="block text-gray-700 font-semibold mb-2">Tipe Event <span class="text-red-500">*</span></label>
                <input type="text" name="type" id="type" value="{{ old('type') }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#640D5F] @error('type') border-red-500 @enderror"
                    placeholder="Webinar, Workshop, dll">
                @error('type') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="speaker" class="block text-gray-700 font-semibold mb-2">Pembicara</label>
                <input type="text" name="speaker" id="speaker" value="{{ old('speaker') }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#640D5F] @error('speaker') border-red-500 @enderror"
                    placeholder="Nama pembicara">
                @error('speaker') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- Harga & Diskon --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="harga" class="block text-gray-700 font-semibold mb-2">Harga (Rp) <span class="text-red-500">*</span></label>
                <input type="number" name="harga" id="harga" min="0" value="{{ old('harga') }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#640D5F] @error('harga') border-red-500 @enderror"
                    placeholder="Harga event">
                @error('harga') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="diskon" class="block text-gray-700 font-semibold mb-2">Diskon (%)</label>
                <input type="number" name="diskon" id="diskon" min="0" max="100" value="{{ old('diskon', 0) }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#640D5F] @error('diskon') border-red-500 @enderror"
                    placeholder="Diskon dalam persen">
                @error('diskon') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- Kuota & Point --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="quota" class="block text-gray-700 font-semibold mb-2">Kuota</label>
                <input type="number" name="quota" id="quota" min="0" value="{{ old('quota') }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#640D5F] @error('quota') border-red-500 @enderror"
                    placeholder="Kuota peserta">
                @error('quota') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="point" class="block text-gray-700 font-semibold mb-2">Point</label>
                <input type="number" name="point" id="point" min="0" value="{{ old('point', 0) }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#640D5F] @error('point') border-red-500 @enderror"
                    placeholder="Point yang didapat">
                @error('point') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- Kategori & Status --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="kategori" class="block text-gray-700 font-semibold mb-2">Kategori <span class="text-red-500">*</span></label>
                <input type="text" name="kategori" id="kategori" value="{{ old('kategori') }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#640D5F] @error('kategori') border-red-500 @enderror"
                    placeholder="Contoh: teknologi, bisnis">
                @error('kategori') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="status" class="block text-gray-700 font-semibold mb-2">Status <span class="text-red-500">*</span></label>
                <select name="status" id="status"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#640D5F] @error('status') border-red-500 @enderror">
                    <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @error('status') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- Informasi Tambahan --}}
        <div>
            <label for="information" class="block text-gray-700 font-semibold mb-2">Informasi Tambahan</label>
            <textarea name="information" id="information" rows="4"
                class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#640D5F] @error('information') border-red-500 @enderror"
                placeholder="Tuliskan informasi tambahan jika ada...">{{ old('information') }}</textarea>
            @error('information') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Buttons --}}
        <div class="flex justify-between items-center">
            <a href="{{ route('events.index') }}"
                class="px-5 py-3 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 font-semibold transition">
                Batal
            </a>
            <button type="submit"
                class="px-8 py-3 bg-[#640D5F] text-white rounded-md hover:bg-[#510a4d] font-semibold transition">
                Simpan
            </button>
        </div>
    </form>
</div>

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('image-preview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            preview.classList.add('hidden');
        }
    }
</script>
@endsection
