@props(['tab'])
<div class="mt-8 {{ $tab == 'create_post' ? 'show active' : 'hidden' }}" id="create_post" role="tabpanel">
    <h3 class="text-xl font-bold text-gray-800 mb-4">Create Post</h3>
    <form wire:submit.prevent="createPost" enctype="multipart/form-data" class="space-y-6">
        <!-- User ID -->
        <div>
            <label for="user_id" class="block text-sm font-medium text-gray-700">Author</label>
            <select id="user_id" wire:model="user_id" class="p-2 mt-1 block w-full rounded-md border border-gray-300 shadow focus:border-indigo-500 focus:ring-indigo-500">
                <option value="" disabled selected>Select an option</option>
                @foreach ($users as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>

            <x-error :name="'user_id'" />
        </div>

        <!-- Category ID -->
        <div>
            <label for="category_id" class="block text-sm font-medium text-gray-700">Category ID</label>
            <select id="category_id" wire:model="category_id" class="p-2 mt-1 block w-full rounded-md border border-gray-300 shadow focus:border-indigo-500 focus:ring-indigo-500">
                <option value="" disabled selected>Select an option</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <x-error :name="'category_id'" />
        </div>

        <!-- Slug -->
        <div>
            <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
            <input type="text" id="slug" wire:model="slug"
                class="p-2 mt-1 block w-full rounded-md border border-gray-300 shadow focus:border-indigo-500 focus:ring-indigo-500"
                required>
                <x-error :name="'slug'" />
        </div>

        <!-- Title -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" id="title" wire:model="title"
                class="p-2 mt-1 block w-full rounded-md border border-gray-300 shadow focus:border-indigo-500 focus:ring-indigo-500"
                required>
                <x-error :name="'title'" />
        </div>

        <!-- Thumbnail -->
        <div>
            <label for="thumbnail" class="block text-sm font-medium text-gray-700">Thumbnail</label>
            <input type="file" id="thumbnail" wire:model="thumbnail"
                class="p-2 mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md shadow file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                <x-error :name="'thumbnail'" />
            </div>

        <!-- Excerpt -->
        <div>
            <label for="excerpt" class="block text-sm font-medium text-gray-700">Excerpt</label>
            <textarea id="excerpt" wire:model="excerpt" rows="3"
                class="p-2 mt-1 block w-full rounded-md border border-gray-300 shadow focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                <x-error :name="'excerpt'" />
        </div>

        <!-- Body -->
        <div>
            <label for="body" class="block text-sm font-medium text-gray-700">Body</label>
            <textarea id="body" wire:model="body" rows="6"
                class="p-2 mt-1 block w-full rounded-md border border-gray-300 shadow focus:border-indigo-500 focus:ring-indigo-500"
                required></textarea>
                <x-error :name="'body'" />
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md shadow-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-none">
                Create Post
            </button>
        </div>
    </form>
</div>
