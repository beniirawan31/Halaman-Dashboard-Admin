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
                            <td class="px-5 py-3 font-medium text-[#640D5F] whitespace-nowrap text-base">{{ $loop->iteration }}</td>
                            <td class="px-5 py-3 text-gray-800 whitespace-nowrap text-base">{{ $user->name }}</td>
                            <td class="px-5 py-3 text-gray-800 break-words text-base max-w-xs">{{ $user->email }}</td>
                            <td class="px-5 py-3 capitalize font-semibold text-[#D91656] whitespace-nowrap text-base">{{ $user->role }}</td>
                            <td class="px-5 py-3 text-center whitespace-nowrap">
                                <div class="inline-flex space-x-3 justify-center">
                                    <a href="{{ route('users.edit', $user->id) }}" 
                                       class="flex items-center space-x-2 px-4 py-2 rounded-md bg-[#FFB200] text-white hover:bg-[#e0a500] transition text-base font-semibold">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 11l6-6 3 3-6 6H9v-3z" />
                                        </svg>
                                        <span>Edit</span>
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            class="flex items-center space-x-2 px-4 py-2 rounded-md bg-[#D91656] text-white hover:bg-[#b51344] transition text-base font-semibold">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            <span>Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-8 text-gray-500 text-lg">Belum ada user terdaftar.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection
