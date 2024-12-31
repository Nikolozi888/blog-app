@extends('components.layout')
@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Login</h1>
            <form action="{{ route('login.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="login_id" class="block text-gray-700 font-semibold mb-2">Username / Email</label>
                    <input type="text" id="login_id" name="login_id" value="{{ old('login_id') }}" required
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <x-error :name="'login_id'" />
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <x-error :name="'password'" />
                </div>

                <div class="mb-6">
                    <button type="submit"
                        class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Login</button>
                </div>
                <p class="text-sm text-gray-600 text-center">
                    Don't have account? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a>
                </p>
            </form>
        </div>
    </div>
@endsection
