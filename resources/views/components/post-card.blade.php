<article class="bg-white shadow-md rounded-md overflow-hidden">
    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Post image" class="w-full h-auto">
    <div class="p-4">
        <h3 class="text-xl font-bold text-gray-800">{{ $post->title }}</h3>
        <p class="text-gray-600 text-sm mb-4">created by <span
                class="text-green-600 font-bold">{{ $post->author->name }}</span> at <span
                class="text-green-500 font-bold">{{ $post->created_at->format('Y-m-d') }}</span></p>
        <p class="text-gray-700">{{ $post->excerpt }}</p>
        <a href="{{ route('post.show', $post->slug) }}" class="text-blue-500 hover:underline mt-2 block">Read More</a>
    </div>

    <div class="m-5">
        @if (Cart::instance('wishlist')->content()->where('id', $post->id)->count() > 0)
        @php
            $wishlistItem = Cart::instance('wishlist')
                ->content()
                ->where('id', $post->id)
                ->first();
        @endphp
        <form method="POST" action="{{ route('wishlist.destroy', $wishlistItem->rowId) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="pc__btn-wl top-0 end-0 bg-transparent border-0 filled-heart"
                title="Remove from Wishlist">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                    fill="currentColor" stroke="none">
                    <path
                        d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z">
                    </path>
                </svg>
            </button>
        </form>
    @else
        <form action="{{ route('wishlist.create') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $post->id }}">
            <input type="hidden" name="thumbnail" value="{{ $post->thumbnail }}">
            <input type="hidden" name="title" value="{{ $post->title }}">
            <input type="hidden" name="author_name" value="{{ $post->author->name }}">
            <input type="hidden" name="created_at" value="{{ $post->created_at }}">
            <input type="hidden" name="excerpt" value="{{ $post->excerpt }}">
            <button class="pc__btn-wl top-0 end-0 bg-transparent border-0 js-add-wishlist">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z">
                    </path>
                </svg>


            </button>
        </form>
    @endif
    </div>

</article>
