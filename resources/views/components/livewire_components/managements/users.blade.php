@props(['tab','users'])
<div class="mt-8 {{ $tab == 'all_users' ? 'show active' : 'hidden' }}" id="all_users" role="tabpanel">
    <h3 class="text-xl font-bold text-gray-800 mb-4">Users Management</h3>
    <div class="bg-gray-50 border rounded-lg p-4">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-2 px-4">User ID</th>
                    <th class="py-2 px-4">Name</th>
                    <th class="py-2 px-4">Email</th>
                    <th class="py-2 px-4">Role</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm">
                @foreach ($users as $user)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $user->id }}</td>
                        <td class="py-2 px-4">{{ $user->name }}</td>
                        <td class="py-2 px-4">{{ $user->email }}</td>
                        <td class="py-2 px-4">{{ $user->role }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
