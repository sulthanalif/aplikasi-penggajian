<section>
    <x-alert on="success">
        {{ __('Absensi Berhasil!') }}
    </x-alert>
    <x-alert on="warning">
        {{ __('Anda sudah absen hari ini, coba lagi besok!') }} <br>
    </x-alert>

    <form wire:submit="store" class="mt-6 space-y-6">
        <div>
            <x-input-label for="date" :value="__('Tanggal')" />
            <x-text-input wire:model.live="date" id="date" name="date" type="date" class="mt-1 block w-full"
                readonly />
            <x-input-error class="mt-2" :messages="$errors->get('date')" />
        </div>
        <div>
            <x-input-label for="description" :value="__('Keterangan')" />
            <select id="description"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
                wire:model.live="description" name="description" required autofocus>
                <option value="" class="text-gray-300 hover:bg-gray-100 hover:text-gray-900">
                    -- Pilih Keterangan --
                </option>
                <option value="Masuk" class="text-gray-300 hover:bg-gray-100 hover:text-gray-900">
                    Masuk
                </option>
                <option value="Izin" class="text-gray-300 hover:bg-gray-100 hover:text-gray-900">
                    Izin
                </option>
                <option value="Sakit" class="text-gray-300 hover:bg-gray-100 hover:text-gray-900">
                    Sakit
                </option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />

        </div>


        <div class="flex justify-end items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>

    <table class="w-full mt-6 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-lg">
        <thead>
            <tr>
                <th class="px-6 py-4 text-xs font-medium text-gray-300 uppercase tracking-wider">
                    Tanggal
                </th>
                <th class="px-6 py-4 text-xs font-medium text-gray-300 uppercase tracking-wider">
                    Keterangan
                </th>
                <th class="px-6 py-4 text-xs font-medium text-gray-300 uppercase tracking-wider">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody class=" divide-y divide-gray-200 dark:divide-gray-200 dark:border-gray-700 border-t">
            @if ($absences->count() == 0)
                <tr class="text-center">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300" colspan="3">Kamu Belum Absen Hari ini...</td>
                </tr>
            @else
                @foreach ($absences as $absence)
                    <tr class="text-center">
                        {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $loop->iteration }}</td> --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ \Carbon\Carbon::parse($absence->date)->format('d M Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $absence->description }}</td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm flex justify-center items-center">
                            <div class="flex items-center justify-center gap-2">
                                <form wire:submit='delete({{ $absence }})'>
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
</section>

