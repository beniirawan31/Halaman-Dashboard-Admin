@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-600 via-pink-500 to-red-400 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow-2xl rounded-2xl w-full max-w-md p-8 animate-fade-in">
        <h2 class="text-3xl font-bold text-center text-[#640D5F] mb-6">Login</h2>
        <form method="POST" action="" class="space-y-5">
            @csrf
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                <input id="email" type="email" name="email" required
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-500" />
            </div>
            <div>
                <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                <input id="password" type="password" name="password" required
                    class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-500" />
            </div>
            <div class="flex items-center justify-between">
                <label class="flex items-center text-sm">
                    <input type="checkbox" name="remember" class="mr-2">
                    Ingat saya
                </label>
                <a href="#" class="text-sm text-pink-600 hover:underline">Lupa Password?</a>
            </div>
            <button type="submit"
                class="w-full py-2 px-4 bg-[#640D5F] text-white rounded-lg hover:bg-[#4b0945] transition duration-300 font-semibold">
                Login
            </button>
        </form>
        <p class="mt-6 text-center text-sm text-gray-600">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-pink-600 font-medium hover:underline">Daftar Sekarang</a>
        </p>
    </div>
</div>
@endsection
