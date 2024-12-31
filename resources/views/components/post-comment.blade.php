<div class="border border-4 border-gray-500 border-bold rounded-lg p-5 mb-5">
    <p class="text-green-600 font-bold text-lg">{{ $comment->author->name }}</p>
    <p class="text-gray-700 mt-2 text-xl">{{ $comment->body }}</p>
    <p class="text-gray-500 text-sm mt-1">{{ $comment->created_at->format('Y-m-d') }}</p>
</div>
