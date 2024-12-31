<div>
    <!-- Action Buttons -->
    <div class="mt-6 grid grid-cols-3 gap-4">
        <a wire:click="selectTab('control')"
            class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded cursor-pointer" role="tab"
            data-toggle="tab">
            Control Everything
        </a>
        <a wire:click="selectTab('all_users')"
            class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded cursor-pointer" role="tab"
            data-toggle="tab">
            View All Users
        </a>
        <a wire:click="selectTab('all_posts')"
            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded cursor-pointer" role="tab"
            data-toggle="tab">
            View All Posts
        </a>
    </div>

    {{-- ----------------------- <Managements> ------------------------- --}}



    <!-- Managements Pages -->

    @include('components.livewire_components.managements.control', ['tab' => $tab])

    @include('components.livewire_components.managements.posts', ['tab' => $tab], ['posts' => $posts])

    @include('components.livewire_components.managements.users', ['tab' => $tab], ['users' => $users])



    {{-- ----------------------- </Managements> ------------------------- --}}




    <!-- Create Post -->
    @include('components.livewire_components.posts.create', ['tab' => $tab])

    <!-- Edit Post -->
    @include('components.livewire_components.posts.edit', ['tab' => $tab])

    <!-- Add Admin -->
    @include('components.livewire_components.admins.create', ['tab' => $tab])

    <!-- Edit Profile -->
    @include('components.livewire_components.profile.edit', ['tab' => $tab], ['admin' => $admin])

    <!-- Add Category -->
    @include('components.livewire_components.categories.create', ['tab' => $tab])

</div>
