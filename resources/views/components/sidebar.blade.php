@props(['categories'])
<div class="bg-white shadow-md rounded-md p-4">
    <h2 class="text-xl font-bold text-gray-800 mb-4">Categories</h2>
    <ul class="space-y-2">

        @foreach ($categories as $category)
            <li>
                <h3 wire:click="category('{{ $category->slug }}')" class="text-gray-700 hover:text-blue-500 cursor-pointer">
                    {{ $category->name }}
                </h3>
            </li>
        @endforeach

    </ul>
</div>
