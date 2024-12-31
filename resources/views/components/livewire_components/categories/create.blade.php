@props(['tab'])
<div class="mt-8 {{ $tab == 'add_category' ? 'show active' : 'hidden' }}" id="add_category" role="tabpanel">
    <h3 class="text-xl font-bold text-gray-800 mb-4">Add Category</h3>
    <form wire:submit.prevent="addCategory">

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
            <input type="text" id="name" wire:model="name"
                class="p-2 mt-1 block w-full rounded-md border border-gray-300 shadow focus:border-indigo-500 focus:ring-indigo-500"
                required>
                <x-error :name="'name'" />
        </div>

        <!-- Slug -->
        <div>
            <label for="slug" class="block text-sm font-medium text-gray-700">Category Slug</label>
            <input type="text" id="slug" wire:model="slug"
                class="p-2 mt-1 block w-full rounded-md border border-gray-300 shadow focus:border-indigo-500 focus:ring-indigo-500"
                required>
                <x-error :name="'slug'" />
        </div>



        <!-- Submit Button -->
        <div class="mt-5">
            <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md shadow-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-none">
                Add Category
            </button>
        </div>
    </form>
</div>
