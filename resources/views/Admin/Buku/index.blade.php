@extends('layouts.app')

@section('content')
<div class="flex h-screen bg-gray-100">
    @include('layouts.sidebar')
    @include('layouts.nav')

    <main class="flex-1 overflow-auto p-6 max-w-full ml-6">
        <div class="mb-6">     
            <!-- Filter -->
            <div class="bg-white p-4 rounded-xl shadow mb-4 ">
                <h2 class="text-3xl font-semibold text-[#640D5F]">Daftar Buku</h2>
                <form action="" method="GET" class="flex flex-wrap gap-6 items-end justify-between">
                    <div class="flex gap-6">
                        <div class="flex flex-col">
                            <label for="judul" class="mb-1 text-sm font-medium text-gray-700">Judul</label>
                            <input type="text" name="judul" id="judul" placeholder="Cari judul..."
                                class="w-48 rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#640D5F]" />
                        </div>
                        <div class="flex flex-col">
                            <label for="harga" class="mb-1 text-sm font-medium text-gray-700">Harga</label>
                            <input type="text" name="harga" id="harga" placeholder="Cari harga..."
                                class="w-48 rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#640D5F]" />
                        </div>
                    </div>
                    
                    <a href="{{ route('bukus.create') }}"
                        class="inline-flex items-center gap-2 bg-[#640D5F] text-white px-4 py-2 rounded hover:bg-[#510a4d] transition">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Tambah Buku
                    </a>
                </form>
            </div>

            <!-- Tabel Buku -->
            <div class="bg-white rounded-xl shadow overflow-auto">
                <table class="w-full table-auto border-collapse text-left">
                    <thead class="bg-[#640D5F] text-white text-center font-bold">
                        <tr>
                            <th class="p-3">No</th>
                            <th class="p-3">Judul</th>
                            <th class="p-3">Pengarang</th>
                            <th class="p-3">Kategori</th>
                            <th class="p-3">Deskripsi</th>
                            <th class="p-3">Informasi</th>
                            <th class="p-3">Harga</th>
                            <th class="p-3">Diskon</th>
                            <th class="p-3">Total Harga</th>
                            <th class="p-3">Stok</th>
                            <th class="p-3">Terjual</th>
                            <th class="p-3">Rating</th>
                            <th class="p-3">Point</th>
                            <th class="p-3">Gambar</th>
                            <th class="p-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bukus as $index => $buku)
                            <tr class="text-center border-b border-gray-200 hover:bg-gray-50">
                                <td class="p-3">{{ $index + 1 }}</td>
                                <td class="p-3">{{ $buku->title }}</td>
                                <td class="p-3">{{ $buku->nama_pengarang }}</td>
                                <td class="p-3">{{ $buku->kategori }}</td>
                                <td class="p-3">{{ Str::limit($buku->deskription, 5) }}</td>
                                <td class="p-3">{{ Str::limit($buku->information, 5) }}</td>
                                <td class="p-3">Rp{{ number_format($buku->harga, 0, ',', '.') }}</td>
                                <td class="p-3">{{ $buku->diskon }}%</td>
                                <td class="p-3">Rp{{ number_format($buku->total_harga, 0, ',', '.') }}</td>
                                <td class="p-3">{{ $buku->stock }}</td>
                                <td class="p-3">{{ $buku->sold }}</td>
                                <td class="p-3">{{ $buku->rating }} ⭐</td>
                                <td class="p-3">{{ $buku->point }}</td>
                                <td class="p-3">
                                    @if ($buku->image)
                                        <img src="{{ asset('storage/' . $buku->image) }}" alt="Cover Buku"
                                            class="w-20 h-12 object-cover mx-auto rounded">
                                    @else
                                        <span class="text-gray-400 italic">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td class="p-3 text-center whitespace-nowrap">
                                    <div class="flex justify-center items-center space-x-2">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('bukus.edit', $buku->id) }}"
                                            class="flex items-center justify-center px-3 py-2 rounded-md bg-[#FFB200] text-white hover:bg-[#e0a500] transition">
                                            <svg class="w-[29px] h-[29px] text-white" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                            </svg>
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <form id="delete-form-{{ $buku->id }}"
                                            action="{{ route('bukus.destroy', $buku->id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete({{ $buku->id }})"
                                                class="flex items-center justify-center px-3 py-2 rounded-md bg-[#D91656] text-white hover:bg-[#b51344] transition">
                                                <svg class="w-[29px] h-[29px] text-white" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.8"
                                                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="15" class="text-center py-6 text-gray-500">Tidak ada data buku.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data buku akan dihapus secara permanen.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endsection
