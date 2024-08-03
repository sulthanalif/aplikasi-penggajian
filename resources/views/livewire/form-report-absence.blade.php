<section x-data="{ selectedOption: '' }">
    <header>

        <x-input-label for="select" :value="__('Pilih Tipe Laporan')" />
        <select name="" id="select"
            class="mt-4 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-30"
            x-model="selectedOption">
            <option value="">Pilih Tipe Laporan</option>
            <option value="Harian">Harian</option>
            <option value="Bulanan">Bulanan</option>
            <option value="Tahunan">Tahunan</option>
            <option value="Jangka Waktu">Jangka Waktu</option>
        </select>
    </header>

    <template x-if="selectedOption === 'Harian'">
        <form wire:submit="exportDaily" class="mt-6 space-y-6">
            <div class="mt-4">
                <x-input-label for="date" :value="__('Tanggal')" />

                <div class="flex items-center gap-4">
                    <x-text-input id="date" wire:model="date" class="block mt-1 w-30 " type="date" name="date"
                    required />

                <x-input-error class="mt-2" :messages="$errors->get('date')" />
                <x-primary-button>{{ __('Cetak') }}</x-primary-button>
                </div>
            </div>
        </form>
    </template>
    <template x-if="selectedOption === 'Bulanan'">
        <form wire:submit="exportMonthly" class="mt-6 space-y-6">
            <div class="mt-4">

                <div class="flex items-center gap-4">
                    <select name="month" id="month" wire:model="month"
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-30" required>
                    <option value="">Pilih Bulan</option>
                    @foreach ($months as $month)
                        <option value="{{ $month }}">{{ date('F', mktime(0, 0, 0, $month, 10)) }}</option>
                    @endforeach
                </select>
                    <select name="year" id="year" wire:model="year"
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-30" required>
                    <option value="">Pilih Tahun</option>
                    @foreach ($years as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
                <x-primary-button>{{ __('Cetak') }}</x-primary-button>
                </div>
            </div>
        </form>
    </template>
    <template x-if="selectedOption === 'Tahunan'">
        <form wire:submit="exportYearly" class="mt-6 space-y-6">
            <div class="mt-4">
                <x-input-label for="year" :value="__('Tahun')" />

                <select name="year" id="year" wire:model="year"
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-30" required>
                    <option value="">Pilih Tahun</option>
                    @foreach ($years as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>

                <x-input-error class="mt-2" :messages="$errors->get('year')" />
                <x-primary-button>{{ __('Cetak') }}</x-primary-button>
            </div>
        </form>
    </template>
    <template x-if="selectedOption === 'Jangka Waktu'">
        <form wire:submit="exportDateRange" class="mt-6 space-y-6">
            <div class="mt-4">

                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-4">
                        <x-text-input id="start_date" wire:model="start_date" class="block mt-1 w-30 " type="date" name="start_date"
                        required />s/d
                        <div class="flex items-center gap-4">
                            <x-text-input id="end_date" wire:model="end_date" class="block mt-1 w-30 " type="date" name="end_date"
                            required />
                <x-primary-button>{{ __('Cetak') }}</x-primary-button>
                </div>
            </div>
        </form>
    </template>
</section>
