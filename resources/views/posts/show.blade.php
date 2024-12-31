@extends('components.layout')
@section('content')
    <main class="container mx-auto px-4 mt-8">
        <!-- Blog Post -->
        <article class="bg-white shadow-md rounded-md p-6 mb-6">
            <h1 class="text-3xl font-bold text-gray-800">{{ $post->title }}</h1>
            <p class="text-gray-600 text-sm mt-2">created by <span
                    class="text-green-600 font-bold">{{ $post->author->name }}</span> at <span
                    class="text-green-500 font-bold">{{ $post->created_at->format('Y-m-d') }}</span></p>
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Blog post image" class="w-1/4 h-auto rounded-md my-4">
            <p class="text-gray-700 leading-relaxed">
                {{ $post->body }}
            </p>
        </article>

        <!-- Comments Section -->
        <livewire:comment.comment :post="$post" :key="'comments' . $post->id" />

    </main>
@endsection
