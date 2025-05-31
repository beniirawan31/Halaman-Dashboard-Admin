@extends('layouts.app')

@section('content')
    <div class="flex h-screen bg-gray-100">
        @include('layouts.sidebar')
        @include('layouts.nav')

        <main class="flex-1 overflow-auto p-6 max-w-full ml-6">
            <div class="bg-white p-4 rounded-xl shadow mb-4">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-semibold text-[#640D5F]">Daftar Event</h2>
                </div>
            
                <!-- Filter Form + Tambah Button -->
                <form action="" method="GET" class="flex flex-wrap items-end justify-between gap-4">
                    <div class="flex gap-6 flex-wrap">
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
            
                    <!-- Tombol Tambah Event -->
                    <a href="{{ route('events.create') }}"
                        class="inline-flex items-center gap-2 bg-[#640D5F] text-white px-4 py-2 rounded hover:bg-[#510a4d] transition">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Tambah Event
                    </a>
                </form>
            </div>
            

            <div class="bg-white rounded shadow overflow-auto">
                <table class="w-full table-auto border-collapse text-left">
                    <thead class="bg-[#640D5F] text-white text-center font-bold">
                        <tr>
                            <th class="p-3">No</th>
                            <th class="p-3">Judul</th>
                            <th class="p-3">Tipe</th>
                            <th class="p-3">Pembicara</th>
                            <th class="p-3">Gambar</th>
                            <th class="p-3">Harga</th>
                            <th class="p-3">Diskon (%)</th>
                            <th class="p-3">Total Harga</th>
                            <th class="p-3">Kuota</th>
                            <th class="p-3">Point</th>
                            <th class="p-3">Kategori</th>
                            <th class="p-3">Status</th>
                            <th class="p-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($events as $index => $event)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-3">{{ $index + 1 }}</td>
                                <td class="p-3">{{ $event->title }}</td>
                                <td class="p-3">{{ ucfirst($event->type) }}</td>
                                <td class="p-3">{{ $event->speaker }}</td>
                                <td class="p-2 text-center">
                                    @if ($event->image)
                                        <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}"
                                            class="h-20 mx-auto rounded">
                                    @else
                                        <span class="text-gray-500 italic">Tidak ada gambar</span>
                                    @endif
                                </td>

                                <td class="p-3 text-center">Rp {{ number_format($event->harga, 0, ',', '.') }}</td>
                                <td class="p-3 text-center">{{ $event->diskon }}%</td>
                                <td class="p-3 text-green-600 font-bold">Rp
                                    {{ number_format($event->total_harga, 0, ',', '.') }}</td>
                                <td class="p-3 text-center">{{ $event->quota }}</td>
                                <td class="p-3 text-center">{{ $event->point }}</td>
                                <td class="p-3">{{ ucfirst($event->kategori) }}</td>
                                <td class="p-3 text-center">
                                    <span
                                        class="px-2 py-1 text-sm rounded {{ $event->status == 'aktif' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                                        {{ ucfirst($event->status) }}
                                    </span>
                                </td>
                                <td class="p-3 text-center whitespace-nowrap">
                                    <div class="flex justify-center items-center space-x-2">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('events.edit', $event->id) }}"
                                            class="flex items-center space-x-2 px-4 py-2 rounded-md bg-[#FFB200] text-white hover:bg-[#e0a500] transition text-base font-semibold">
                                            <svg class="w-[29px] h-[29px] text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                            </svg>
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <form id="delete-form-{{ $event->id }}"
                                            action="{{ route('events.destroy', $event->id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete({{ $event->id }})"
                                                class="flex items-center space-x-2 px-4 py-2 rounded-md bg-[#D91656] text-white hover:bg-[#b51344] transition text-base font-semibold">
                                                <svg class="w-[29px] h-[29px] text-white"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
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
                                <td colspan="13" class="text-center p-4 text-gray-500">Belum ada event tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-6">
                    {{ $events->links() }}
                </div>
            </div>
        </main>
    </div>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data event akan dihapus secara permanen.",
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
