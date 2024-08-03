<div class="overflow-x-auto">
    @if (session('status'))
        <div class="alert alert-success" x-data="{ shown: false, timeout: null }" x-init="shown = {{ session()->has('status') ? 'true' : 'false' }};
        timeout = setTimeout(() => { shown = false }, 2000)"
            x-show.transition.out.opacity.duration.1500ms="shown" x-transition:leave.opacity.duration.1500ms
            style="display: none;">
            {{ session('status') }}
        </div>
    @endif
    <div class="flex justify-between mb-4 items-center">
        <div>
            <x-primary-button wire:click="export">
                Cetak
            </x-primary-button>
        </div>
        <div class="flex gap-4">
            <x-text-input wire:model.live="search" type="text" placeholder="Search..." class="w-50" />
            <x-primary-button>
                <a href="{{ route('allowance.create') }}" class="text-black" wire:navigate>Tambah Data</a>
            </x-primary-button>
        </div>
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
                    Wali Kelas
                </th>
                <th class="px-6 py-4 text-xs font-medium text-gray-300 uppercase tracking-wider">
                    Tunjangan
                </th>
                <th class="px-6 py-4 text-xs font-medium text-gray-300 uppercase tracking-wider">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody class=" divide-y divide-gray-200 dark:divide-gray-200 dark:border-gray-700 border-t">
            {{-- <tbody class=" divide-y divide-gray-200 dark:divide-gray-700"> --}}
            @if ($allowances->count() == 0)
                <tr class="text-center">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300" colspan="5">Belum Ada Data...</td>
                </tr>
            @else
                @foreach ($allowances as $allowance)
                    <tr class="text-center">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $allowance->user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $allowance->classroom }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            Rp.{{ number_format($allowance->total, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            <div class="flex items-center justify-center gap-2">
                                <button
                                    class="inline-flex items-center px-2 py-1 text-xs bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    <a href="{{ route('allowance.edit', $allowance) }}" wire:navigate>Edit</a>
                                </button>
                                <form wire:submit='delete({{ $allowance }})'>
                                    <button
                                        class="inline-flex items-center px-2 py-1 text-xs bg-red-600 text-white rounded-md hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <div class="mt-4">
        {{ $allowances->links() }}
    </div>
</div>
