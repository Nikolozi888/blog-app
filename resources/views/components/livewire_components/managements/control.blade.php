@props(['tab'])
<div class="mt-8 {{ $tab == 'control' ? 'show active' : 'hidden' }}" id="control" role="tabpanel">
    <h3 class="text-xl font-bold text-gray-800 mb-4">Control Management</h3>

    <div class="mb-2 bg-gray-50 border border-gray-400 rounded-lg p-4">
        <a class="font-bold cursor-pointer" wire:click="selectTab('create_post')" role="tab"
            data-toggle="tab">Create Post</a>
    </div>

    <div class="mb-2 bg-gray-50 border border-gray-400 rounded-lg p-4">
        <a class="font-bold cursor-pointer" wire:click="selectTab('add_admin')" role="tab" data-toggle="tab">Add
            Admin</a>
    </div>

    <div class="mb-2 bg-gray-50 border border-gray-400 rounded-lg p-4">
        <a class="font-bold cursor-pointer" wire:click="selectTab('edit_profile')" role="tab"
            data-toggle="tab">Edit Profile</a>
    </div>

    <div class="mb-2 bg-gray-50 border border-gray-400 rounded-lg p-4">
        <a class="font-bold cursor-pointer" wire:click="selectTab('add_category')" role="tab"
            data-toggle="tab">Add Category</a>
    </div>

</div>
