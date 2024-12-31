<div>
    <section class="bg-white shadow-md rounded-md p-6 mb-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Comments</h2>

        <!-- Single Comment -->
        @foreach ($post->comments as $comment)
            <x-post-comment :comment="$comment" />
        @endforeach


        <!-- Add Comment Form -->
        @auth
            @include('posts._add-comment-form')
        @endauth
    </section>
</div>
