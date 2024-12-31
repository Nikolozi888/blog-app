<div>
    <section class="bg-white shadow-md rounded-md p-6 mb-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Comments</h2>

        <!-- Single Comment -->
        @foreach ($this->comments as $comment)
            <x-post-comment :comment="$comment" />
        @endforeach




        <!-- Add Comment Form -->
        @auth
            <form wire:submit.prevent="create" class="mt-6">
                @csrf
                <label for="body" class="block text-gray-800 font-semibold mb-2">Leave a Comment:</label>
                <textarea id="body" wire:model="body" rows="4"
                    class="w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-blue-200"
                    placeholder="Write your comment here..."></textarea>
                <button type="submit"
                    class="mt-4 px-6 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">Submit</button>
            </form>
        @endauth
    </section>
</div>
