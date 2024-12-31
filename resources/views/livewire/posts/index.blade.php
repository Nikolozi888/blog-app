<main class="container mx-auto px-4 mt-8">
    <div class="flex flex-col md:flex-row justify-between gap-y-8 md:gap-x-8">
        <div class="w-full md:w-1/4 mb-8 md:mb-0">
            <!-- Categories List -->
            <x-sidebar :categories="$categories" />
        </div>

        <div class="w-full md:w-3/4">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Recent Posts</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Blog Post Card -->
                @foreach ($posts as $post)
                    <x-post-card :post="$post" />
                @endforeach

            </div>
        </div>
</main>
