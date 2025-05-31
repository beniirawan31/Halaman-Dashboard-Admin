@extends('layouts.app')

@section('content')
    <div class="flex h-screen bg-gray-100">
        @include('layouts.sidebar')
        @include('layouts.nav')

        <main class="flex-1 overflow-auto p-6 max-w-full ml-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-semibold text-[#640D5F]">Tambah Buku Baru</h2>

            </div>

            @if (session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('bukus.store') }}" method="POST" enctype="multipart/form-data"
                class="bg-white p-6 rounded shadow-md space-y-4">
                @csrf

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-1 font-medium">Judul Buku</label>
                        <input type="text" name="title" class="w-full border border-gray-300 rounded px-3 py-2"
                            required>
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Nama Pengarang</label>
                        <input type="text" name="nama_pengarang" class="w-full border border-gray-300 rounded px-3 py-2"
                            required>
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Kategori</label>
                        <select name="kategori" class="w-full border border-gray-300 rounded px-3 py-2" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="kotlin">Kotlin</option>
                            <option value="flutter">Flutter</option>
                            <option value="swift">Swift</option>
                            <option value="laravel">Laravel</option>
                            <option value="php">PHP</option>
                            <option value="data_science">Data Science</option>
                            <option value="ui_design">UI Design</option>
                        </select>
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Harga</label>
                        <input type="number" name="harga" class="w-full border border-gray-300 rounded px-3 py-2"
                            required>
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Diskon (%)</label>
                        <input type="number" name="diskon" class="w-full border border-gray-300 rounded px-3 py-2"
                            required>
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Stok</label>
                        <input type="number" name="stock" class="w-full border border-gray-300 rounded px-3 py-2"
                            required>
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Terjual</label>
                        <input type="number" name="sold" class="w-full border border-gray-300 rounded px-3 py-2"
                            value="0" required>
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Rating</label>
                        <input type="number" step="0.1" name="rating"
                            class="w-full border border-gray-300 rounded px-3 py-2" required>
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Point</label>
                        <input type="number" name="point" class="w-full border border-gray-300 rounded px-3 py-2"
                            required>
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Gambar</label>
                        <input type="file" name="image" accept="image/*"
                            class="w-full border border-gray-300 rounded px-3 py-2" required>
                    </div>
                </div>

                <div>
                    <label class="block mb-1 font-medium">Informasi Tambahan</label>
                    <textarea name="information" rows="3" class="w-full border border-gray-300 rounded px-3 py-2" required></textarea>
                </div>

                <div>
                    <label class="block mb-1 font-medium">Deskripsi</label>
                    <textarea name="deskription" rows="4" class="w-full border border-gray-300 rounded px-3 py-2" required></textarea>
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('bukus.index') }}"
                        class="inline-flex items-center gap-2 bg-gray-200 text-[#640D5F] px-4 py-2 rounded hover:bg-gray-300">
                        ← Kembali
                    </a>
                    <button type="submit"
                        class="bg-[#640D5F] text-white px-6 py-2 rounded hover:bg-[#510a4d] transition">Simpan</button>
                </div>
            </form>
        </main>
    </div>
@endsection
