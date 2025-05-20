@extends('layouts.app')

@section('content')

<div class="flex min-h-screen items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 shadow-md rounded-lg">
        <h2 class="text-2xl font-bold text-center text-gray-800">Ngajidek</h2>
        <h2 class="text-2xl font-bold text-center text-gray-800">Login</h2>
        <form method="POST" action="{{ route('login') }}" class="mt-4">
            @csrf
            <div>
                <label class="block text-gray-600">Email</label>
                <input type="email" name="email" required class="w-full px-4 py-2 border rounded-md">
            </div>
            <div class="mt-2">
                <label class="block text-gray-600">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-2 border rounded-md">
            </div>
            <button type="submit" class="w-full mt-4 bg-blue-600 text-white py-2 rounded-md">Login</button>
        </form>
        <p class="mt-4 text-center text-gray-600">Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600">Daftar</a></p>
    </div>
</div>
@endsection
