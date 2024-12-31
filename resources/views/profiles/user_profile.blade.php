@extends('components.layout')
@section('content')
    <div class="min-h-screen flex flex-col items-center justify-center p-4">
        <!-- User Profile Card -->
        <div class="w-full max-w-4xl bg-white rounded-lg shadow-lg p-6 mb-8">
            <!-- Header Section -->
            <div class="flex items-center justify-between border-b pb-4 mb-6">
                <div class="flex items-center">
                    <img class="w-24 h-24 rounded-full mr-4" src="https://via.placeholder.com/100" alt="User Avatar">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">{{ $user->name }}</h2>
                        <p class="text-gray-600">{{ $user->email }}</p>
                        <p class="text-gray-600">Role: {{ $user->role }}</p>
                    </div>
                </div>
                <a href="/profile/edit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Edit
                    Profile</a>
            </div>

            <!-- User Information Section -->
            <div class="mb-8">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Personal Information</h3>
                <p class="text-gray-600"><span class="font-semibold">Full Name:</span> {{ $user->name }}</p>
                <p class="text-gray-600 mt-2"><span class="font-semibold">Email:</span> {{ $user->email }}</p>
                <p class="text-gray-600 mt-2"><span class="font-semibold">Role:</span> {{ $user->role }}</p>
            </div>
            <!-- User Liked Items Section -->
            <div class="mb-8">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Liked Items</h3>
                <ul class="list-disc pl-6 text-gray-600">
                    @foreach ($likedItems as $item)
                        <div class="mb-5 bg-gray-200 p-5 w-2/4">
                            <img src="{{ asset('storage/' . $item->options->thumbnail) }}" alt="Post image"
                                class="w-2/4 h-auto">
                            <div class="p-4">
                                <h3 class="text-xl font-bold text-gray-800">{{ $item->name }}</h3>
                                <p class="text-gray-600 text-sm mb-4">created by <span
                                        class="text-green-600 font-bold">{{ $item->options->author_name }}</span> at <span
                                        class="text-green-500 font-bold">{{ $item->options->created_at }}</span></p>
                                <p class="text-gray-700">{{ $item->options->excerpt }}</p>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>


            <!-- User Posts Section -->
            <div class="mb-8">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Posts</h3>
                <ul class="list-disc pl-6 text-gray-600">
                    @if ($user->posts->count() > 0)
                        @foreach ($user->posts as $post)
                            <li><a href="{{ route('post.show', $post->slug) }}"
                                    class="text-blue-500 hover:underline">{{ $post->title }}</a></li>
                        @endforeach
                    @else
                        <h1>No Posts Yet</h1>
                    @endif
                </ul>
            </div>

            <!-- User Comments Section -->
            <div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">Comments</h3>
                <ul class="list-disc pl-6 text-gray-600">
                    @if ($user->posts->count() > 0)
                        @foreach ($user->comments as $comment)
                            <li>{{ $comment->body }} <span class="text-gray-500">on</span> <a
                                    href="{{ route('post.show', $comment->post->slug) }}"
                                    class="text-blue-500 hover:underline">Post #{{ $comment->post->title }}</a></li>
                        @endforeach
                    @else
                        <h1>No Comments Yet</h1>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection
