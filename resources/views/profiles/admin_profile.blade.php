@extends('components.layout')
@section('content')
    <div class="min-h-screen flex flex-col items-center justify-center p-4">
        <!-- Admin Profile Section -->
        <div class="w-full max-w-4xl bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">Admin Dashboard</h2>

            <!-- Admin Info -->
            <div class="flex items-center space-x-4">
                <img class="w-20 h-20 rounded-full border-4 border-red-500" src="{{ asset('storage/' . $admin->picture) }}"
                    alt="Admin Avatar">
                <div>
                    <p class="text-gray-700"><span class="font-semibold">Name:</span> {{ $admin->name }}</p>
                    <p class="text-gray-700"><span class="font-semibold">Email:</span> {{ $admin->email }}</p>
                    <p class="text-gray-700"><span class="font-semibold">Role:</span> {{ $admin->role }}</p>
                    <p class="text-gray-700"><span class="font-semibold">Bio:</span> {{ $admin->bio }}</p>
                </div>
            </div>

        @livewire('admin.profile')
        </div>
    </div>
@endsection
