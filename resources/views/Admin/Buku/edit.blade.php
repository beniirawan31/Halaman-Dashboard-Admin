@extends('layouts.app')

@section('content')
    <div class="flex h-screen bg-gray-100">
        @include('layouts.sidebar')
        @include('layouts.nav')
        @include('komponen.notif')

        <main class="flex-1 overflow-auto p-6 max-w-full ml-6">
            <h2 class="text-3xl font-bold text-[#640D5F] mb-6">Edit Buku : {{ $buku->title }}</h2>
            <form action="{{ route('bukus.update', $buku->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Judul Buku --}}
                <div>
                    <label for="title" class="block text-gray-700 font-semibold mb-2">Judul Buku <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title', $buku->title) }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#640D5F] @error('title') border-red-500 @enderror"
                        placeholder="Masukkan judul buku...">
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Gambar Buku --}}
                <div>
                    <label for="image" class="block text-gray-700 font-semibold mb-2">Gambar Buku</label>
                    <input type="file" name="image" id="image" accept="image/*"
                        class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4
                            file:rounded-md file:border-0
                            file:text-sm file:font-semibold
                            file:bg-[#640D5F] file:text-white
                            hover:file:bg-[#510a4d]
                            focus:outline-none"
                        onchange="previewImage(event)">
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <div class="mt-4">
                        <img id="image-preview" src="{{ asset('storage/' . $buku->image) }}" alt="Preview Gambar"
                            class="rounded-md shadow-md max-h-48 mx-auto">
                    </div>
                </div>

                {{-- Nama Pengarang & Kategori --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nama_pengarang" class="block text-gray-700 font-semibold mb-2">Nama Pengarang <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nama_pengarang" id="nama_pengarang"
                            value="{{ old('nama_pengarang', $buku->nama_pengarang) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#640D5F] @error('nama_pengarang') border-red-500 @enderror"
                            placeholder="Nama pengarang buku">
                        @error('nama_pengarang')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="kategori" class="block text-gray-700 font-semibold mb-2">Kategori <span
                                class="text-red-500">*</span></label>
                        <select name="kategori" id="kategori"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#640D5F] @error('kategori') border-red-500 @enderror"
                            required>
                            <option value="">-- Pilih Kategori --</option>
                            @php
                                $kategoriOptions = [
                                    'kotlin',
                                    'flutter',
                                    'swift',
                                    'laravel',
                                    'php',
                                    'data science',
                                    'ui design',
                                ];
                            @endphp
                            @foreach ($kategoriOptions as $kategori)
                                <option value="{{ $kategori }}"
                                    {{ old('kategori', $buku->kategori) == $kategori ? 'selected' : '' }}>
                                    {{ ucfirst(str_replace('_', ' ', $kategori)) }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Stock & Harga --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="stock" class="block text-gray-700 font-semibold mb-2">Stock <span
                                class="text-red-500">*</span></label>
                        <input type="number" name="stock" id="stock" min="0"
                            value="{{ old('stock', $buku->stock) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#640D5F] @error('stock') border-red-500 @enderror"
                            placeholder="Jumlah stock">
                        @error('stock')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="harga" class="block text-gray-700 font-semibold mb-2">Harga (Rp) <span
                                class="text-red-500">*</span></label>
                        <input type="number" name="harga" id="harga" min="0"
                            value="{{ old('harga', $buku->harga) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#640D5F] @error('harga') border-red-500 @enderror"
                            placeholder="Harga buku">
                        @error('harga')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Diskon & Sold --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="diskon" class="block text-gray-700 font-semibold mb-2">Diskon (%) <span
                                class="text-red-500">*</span></label>
                        <input type="number" name="diskon" id="diskon" min="0" max="100"
                            value="{{ old('diskon', $buku->diskon) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#640D5F] @error('diskon') border-red-500 @enderror"
                            placeholder="Diskon dalam persen">
                        @error('diskon')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="sold" class="block text-gray-700 font-semibold mb-2">Terjual <span
                                class="text-red-500">*</span></label>
                        <input type="number" name="sold" id="sold" min="0"
                            value="{{ old('sold', $buku->sold) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#640D5F] @error('sold') border-red-500 @enderror"
                            placeholder="Jumlah buku terjual">
                        @error('sold')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Rating & Point --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="rating" class="block text-gray-700 font-semibold mb-2">Rating <span
                                class="text-red-500">*</span></label>
                        <input type="number" step="0.1" min="0" max="5" name="rating"
                            id="rating" value="{{ old('rating', $buku->rating) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#640D5F] @error('rating') border-red-500 @enderror"
                            placeholder="Rating buku (0 - 5)">
                        @error('rating')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="point" class="block text-gray-700 font-semibold mb-2">Point <span
                                class="text-red-500">*</span></label>
                        <input type="number" name="point" id="point" min="0"
                            value="{{ old('point', $buku->point) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#640D5F] @error('point') border-red-500 @enderror"
                            placeholder="Point reward">
                        @error('point')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Informasi --}}
                <div>
                    <label for="information" class="block text-gray-700 font-semibold mb-2">Informasi <span
                            class="text-red-500">*</span></label>
                    <textarea name="information" id="information" rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#640D5F] @error('information') border-red-500 @enderror"
                        placeholder="Informasi buku...">{{ old('information', $buku->information) }}</textarea>
                    @error('information')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label for="deskription" class="block text-gray-700 font-semibold mb-2">Deskripsi <span
                            class="text-red-500">*</span></label>
                    <textarea name="deskription" id="deskription" rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#640D5F] @error('deskription') border-red-500 @enderror"
                        placeholder="Deskripsi buku...">{{ old('deskription', $buku->deskription) }}</textarea>
                    @error('deskription')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tombol Simpan --}}
                <div class="flex justify-between items-center">
                    <a href="{{ route('bukus.index') }}"
                        class="px-5 py-3 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 font-semibold transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-8 py-3 bg-[#640D5F] text-white rounded-md hover:bg-[#510a4d] font-semibold transition">
                        Update
                    </button>
                </div>
            </form>
        </main>
    </div>

    {{-- Script untuk preview image --}}
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('image-preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
