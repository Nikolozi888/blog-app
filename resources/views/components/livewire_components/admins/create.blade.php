@props(['tab'])
<div class="mt-8 {{ $tab == 'add_admin' ? 'show active' : 'hidden' }}" id="add_admin" role="tabpanel">
    <h3 class="text-xl font-bold text-gray-800 mb-4">Add Admin</h3>
    <form wire:submit.prevent="addAdmin" enctype="multipart/form-data" class="space-y-6">

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Admin Name</label>
            <input type="text" id="name" wire:model="name"
                class="p-2 mt-1 block w-full rounded-md border border-gray-300 shadow focus:border-indigo-500 focus:ring-indigo-500"
                required>
                <x-error :name="'name'" />
        </div>

        <!-- Username -->
        <div>
            <label for="username" class="block text-sm font-medium text-gray-700">Admin Username</label>
            <input type="text" id="username" wire:model="username"
                class="p-2 mt-1 block w-full rounded-md border border-gray-300 shadow focus:border-indigo-500 focus:ring-indigo-500"
                required>
                <x-error :name="'username'" />
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Admin Email</label>
            <input type="email" id="email" wire:model="email"
                class="p-2 mt-1 block w-full rounded-md border border-gray-300 shadow focus:border-indigo-500 focus:ring-indigo-500"
                required>
                <x-error :name="'email'" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Admin Password</label>
            <input type="password" id="password" wire:model="password"
                class="p-2 mt-1 block w-full rounded-md border border-gray-300 shadow focus:border-indigo-500 focus:ring-indigo-500"
                required>
                <x-error :name="'password'" />
        </div>



        <!-- Submit Button -->
        <div>
            <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md shadow-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-none">
                Add Admin
            </button>
        </div>
    </form>
</div>
