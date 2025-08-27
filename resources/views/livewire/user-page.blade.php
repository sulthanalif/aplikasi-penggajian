<div class="overflow-x-auto" x-data="{ openCreate: false }">
    @if (session('status'))
        <div class="alert alert-success" x-data="{ shown: false, timeout: null }" x-init="shown = {{ session()->has('status') ? 'true' : 'false' }};
        timeout = setTimeout(() => { shown = false }, 2000)"
            x-show.transition.out.opacity.duration.1500ms="shown" x-transition:leave.opacity.duration.1500ms
            style="display: none;">
            {{ session('status') }}
        </div>
    @endif
    <div class="flex justify-end mb-4">
        <x-primary-button>
            <a href="{{ route('user.create') }}" class="text-black" wire:navigate>Tambah User</a>
        </x-primary-button>
    </div>
    <table class="w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-lg">
        <thead>
            <tr>
                <th class="px-6 py-4 text-xs font-medium text-gray-300 uppercase tracking-wider">
                    No
                </th>
                <th class="px-6 py-4 text-xs font-medium text-gray-300 uppercase tracking-wider">
                    Nama
                </th>
                <th class="px-6 py-4 text-xs font-medium text-gray-300 uppercase tracking-wider">
                    Email
                </th>
                <th class="px-6 py-4 text-xs font-medium text-gray-300 uppercase tracking-wider">
                    Role
                </th>
                <th class="px-6 py-4 text-xs font-medium text-gray-300 uppercase tracking-wider">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody class=" divide-y divide-gray-200 dark:divide-gray-200 dark:border-gray-700 border-t">
            @if ($users->count() == 0)
                <tr class="text-center">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300" colspan="5">Belum Ada Data...</td>
                </tr>
            @else
                @foreach ($users as $user)
                    <tr class="text-center" x-data="{ openEdit{{ $user->id }}: false }">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $user->email }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            {{ Str::ucfirst($user->roles->first()->name ?? '') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm flex justify-center items-center">
                            <div class="flex items-center justify-center gap-2">
                                <button
                                    class="inline-flex items-center px-2 py-1 text-xs bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    <a href="{{ route('user.edit', $user) }}" wire:navigate>Edit</a>
                                </button>
                                <button wire:click='delete({{ $user }})'
                                    wire:confirm="Are you sure you want to delete this data?"
                                    class="inline-flex items-center px-2 py-1 text-xs bg-red-600 text-white rounded-md hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Hapus</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
