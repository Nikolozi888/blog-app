@props(['tab','posts'])
<div class="mt-8 {{ $tab == 'all_posts' ? 'show active' : 'hidden' }}" id="all_posts" role="tabpanel">
    <h3 class="text-xl font-bold text-gray-800 mb-4">Posts Management</h3>
    <div class="bg-gray-50 border rounded-lg p-4">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-2 px-4">Post ID</th>
                    <th class="py-2 px-4">Title</th>
                    <th class="py-2 px-4">Author</th>
                    <th class="py-2 px-4">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm">
                @foreach ($posts as $post)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $post->id }}</td>
                        <td class="py-2 px-4">{{ $post->title }}</td>
                        <td class="py-2 px-4">{{ $post->author->name }}</td>
                        <td class="py-2 px-4">
                            <button wire:click="deletePost({{ $post->id }})" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded">
                                Delete
                            </button>
                            <button wire:click="selectTab('edit_post', {{$post->id}})" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded">
                                edit
                            </button>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
