<div class="overflow-x-auto">
    @if (session('status'))
        <div class="alert alert-success" x-data="{ shown: false, timeout: null }" x-init="shown = {{ session()->has('status') ? 'true' : 'false' }};
        timeout = setTimeout(() => { shown = false }, 2000)"
            x-show.transition.out.opacity.duration.1500ms="shown" x-transition:leave.opacity.duration.1500ms
            style="display: none;">
            {{ session('status') }}
        </div>
    @endif
    @hasrole('officer|headmaster')
    <div class="flex justify-between items-center mb-4">
        <div>
            <x-primary-button wire:click="print">
                Cetak
            </x-primary-button>
        </div>
        <div class="w-1/3">
            <x-text-input wire:model.live="search" type="text" placeholder="Search..." class="w-full" />
        </div>

    </div>
    @endhasrole
    <table class="w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-lg">
        <thead>
            <tr>
                <th class="px-6 py-4 text-xs font-medium text-gray-300 uppercase tracking-wider">
                    No
                </th>
                @hasrole('officer|headmaster')
                    <th class="px-6 py-4 text-xs font-medium text-gray-300 uppercase tracking-wider">
                        Nama
                    </th>
                @endhasrole
                <th class="px-6 py-4 text-xs font-medium text-gray-300 uppercase tracking-wider">
                    Tanggal
                </th>
                <th class="px-6 py-4 text-xs font-medium text-gray-300 uppercase tracking-wider">
                    Besaran Gaji
                </th>
                <th class="px-6 py-4 text-xs font-medium text-gray-300 uppercase tracking-wider">
                    Sumbangan
                </th>
                <th class="px-6 py-4 text-xs font-medium text-gray-300 uppercase tracking-wider">
                    Tabungan
                </th>
                <th class="px-6 py-4 text-xs font-medium text-gray-300 uppercase tracking-wider">
                    Koperasi
                </th>
                <th class="px-6 py-4 text-xs font-medium text-gray-300 uppercase tracking-wider">
                    Bank
                </th>
                <th class="px-6 py-4 text-xs font-medium text-gray-300 uppercase tracking-wider">
                    Total Gaji
                </th>
                <th class="px-6 py-4 text-xs font-medium text-gray-300 uppercase tracking-wider">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody class=" divide-y divide-gray-200 dark:divide-gray-200 dark:border-gray-700 border-t">
            {{-- <tbody class=" divide-y divide-gray-200 dark:divide-gray-700"> --}}
            @if ($payrolls->count() == 0)
                <tr class="text-center">
                    @hasrole('officer|headmaster')
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300" colspan="10">Belum Ada Data...</td>
                    @endhasrole
                    @hasrole('teacher')
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300" colspan="9">Belum Ada Data...</td>
                    @endhasrole
                </tr>
            @else
                @foreach ($payrolls as $payroll)
                    <tr class="text-center">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $loop->iteration }}</td>
                        @hasrole('officer|headmaster')
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $payroll->user->name }}</td>
                        @endhasrole

                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            {{ \Carbon\Carbon::parse($payroll->date)->format('d M Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            Rp.{{ number_format($payroll->total_salary, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            Rp.{{ number_format($payroll->receipt_or_donation, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            Rp.{{ number_format($payroll->savings, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            Rp.{{ number_format($payroll->cooperative, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            Rp.{{ number_format($payroll->bank, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            Rp.{{ number_format($payroll->total_payroll, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            <div class="flex items-center justify-center gap-2">

                                <button
                                    class="inline-flex items-center px-2 py-1 text-xs bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    <a href="{{ route('print-slip', $payroll) }} " target="_blank">Cetak</a>
                                </button>

                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <div class="mt-4">
        {{ $payrolls->links() }}
    </div>
</div>
