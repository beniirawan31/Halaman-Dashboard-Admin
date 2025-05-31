@extends('layouts.app')

@section('content')
    <div class="flex h-screen bg-gray-100">
        @include('layouts.sidebar')

        @include('layouts.nav')

        <main class="flex-1 overflow-auto p-6 max-w-full ml-6"> {{-- ml-6 geser ke kiri --}}
            <div class="mb-6">
                <h2 class="text-3xl font-semibold text-[#640D5F]">Daftar Pengguna</h2>
            </div>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto bg-white rounded-lg shadow border border-gray-200 max-w-full">
                <table class="w-full min-w-[700px] divide-y divide-gray-200"> {{-- minimal lebar 700px --}}
                    <thead class="bg-[#640D5F]">
                        <tr>
                            <th class="px-5 py-3 text-left text-base font-semibold text-gray-200">No</th>
                            <th class="px-5 py-3 text-left text-base font-semibold text-gray-200">Nama</th>
                            <th class="px-5 py-3 text-left text-base font-semibold text-gray-200">Email</th>
                            <th class="px-5 py-3 text-left text-base font-semibold text-gray-200">Role</th>
                            <th class="px-5 py-3 text-center text-base font-semibold text-gray-200">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($users as $user)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-5 py-3 font-medium text-[#640D5F] whitespace-nowrap text-base">
                                    {{ $loop->iteration }}</td>
                                <td class="px-5 py-3 text-gray-800 whitespace-nowrap text-base">{{ $user->name }}</td>
                                <td class="px-5 py-3 text-gray-800 break-words text-base max-w-xs">{{ $user->email }}</td>
                                <td class="px-5 py-3 capitalize font-semibold text-[#D91656] whitespace-nowrap text-base">
                                    {{ $user->role }}</td>
                                <td class="px-5 py-3 text-center whitespace-nowrap">
                                    <div class="inline-flex space-x-3 justify-center">
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="flex items-center space-x-2 px-4 py-2 rounded-md bg-[#FFB200] text-white hover:bg-[#e0a500] transition text-base font-semibold">
                                            <svg class="w-[29px] h-[29px] text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                            </svg>
                                            <span>Edit</span>
                                        </a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="flex items-center space-x-2 px-4 py-2 rounded-md bg-[#D91656] text-white hover:bg-[#b51344] transition text-base font-semibold">
                                                <svg class="w-[29px] h-[29px] text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.8"
                                                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                </svg>
                                                <span>Hapus</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-8 text-gray-500 text-lg">Belum ada user terdaftar.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>
@endsection
