@extends('components.layout')
@section('content')
    <!-- Hero Section -->
    <section class="bg-blue-500 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4">Welcome to My Blog</h1>
            <p class="text-lg">Discover amazing content and join the conversation.</p>
        </div>
    </section>
    <!-- Blog Posts Overview -->
    @livewire('posts.index')
@endsection
