@extends('layouts.app')

@section('content')
    <div class="flex h-screen bg-gray-100">
        @include('layouts.sidebar')
        @include('layouts.nav')

        <main class="flex-1 overflow-auto p-6 max-w-full ml-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-semibold text-[#640D5F]">Daftar Event</h2>
                <a href="{{ route('events.create') }}" class="bg-[#640D5F] text-white px-4 py-2 rounded hover:bg-[#510a4d]">
                    + Tambah Event
                </a>
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
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536M9 11l6-6 3 3-6 6H9v-3z" />
                                            </svg>
                                            <span>Edit</span>
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus event ini?');"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="flex items-center space-x-2 px-4 py-2 rounded-md bg-[#D91656] text-white hover:bg-[#b51344] transition text-base font-semibold">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                                <span>Hapus</span>
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
@endsection
