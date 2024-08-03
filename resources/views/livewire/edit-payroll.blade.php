<section>
    {{-- <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header> --}}

    <form wire:submit="update({{ $payroll }})" class="mt-6 space-y-6">
        <div class="mt-4">
            <x-input-label for="date" :value="__('Tanggal')" />

            <x-text-input id="date" wire:model="date" class="block mt-1 w-full " type="date" name="date"
                required />

            <x-input-error class="mt-2" :messages="$errors->get('date')" />
        </div>
        <div>
            <x-input-label for="name" :value="__('Nama Guru')" />
            <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full" readonly/>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />

        </div>

        <div class="mt-2">
            <x-input-label for="total_salary" :value="__('Total Gaji (Otomatis)')" />
            <x-text-input wire:model.live="total_salary" id="total_salary" name="total_salary" type="number"
                class="mt-1 block w-full" required readonly />
            <x-input-error class="mt-2" :messages="$errors->get('total_salary')" />
        </div>

        <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Potongan-potongan :') }}
        </h2>
    </header>

        <div class="mt-2">
            <x-input-label for="receipt_or_donation" :value="__('Bon/Sumbangan (Jangan menggunakan titik koma)')" />
            <x-text-input wire:model.live="receipt_or_donation" id="receipt_or_donation" name="receipt_or_donation" type="number"
                class="mt-1 block w-full" required  />
            <x-input-error class="mt-2" :messages="$errors->get('receipt_or_donation')" />
        </div>
        <div class="mt-2">
            <x-input-label for="savings" :value="__('Tabungan (Jangan menggunakan titik koma)')" />
            <x-text-input wire:model.live="savings" id="savings" name="savings" type="number"
                class="mt-1 block w-full" required  />
            <x-input-error class="mt-2" :messages="$errors->get('savings')" />
        </div>
        <div class="mt-2">
            <x-input-label for="cooperative" :value="__('Koperasi (Jangan menggunakan titik koma)')" />
            <x-text-input wire:model.live="cooperative" id="cooperative" name="cooperative" type="number"
                class="mt-1 block w-full" required  />
            <x-input-error class="mt-2" :messages="$errors->get('cooperative')" />
        </div>
        <div class="mt-2">
            <x-input-label for="bank" :value="__('Bank (Jangan menggunakan titik koma)' )" />
            <x-text-input wire:model.live="bank" id="bank" name="bank" type="number"
                class="mt-1 block w-full" required  />
            <x-input-error class="mt-2" :messages="$errors->get('bank')" />
        </div>

        <div class="mt-2">
            <x-input-label for="total_payroll" :value="__('Jumlah Bersih (Otomatis)')" />
            <x-text-input wire:model.live="total_payroll" id="total_payroll" name="total_payroll" type="number"
                class="mt-1 block w-full" required readonly />
            <x-input-error class="mt-2" :messages="$errors->get('total_payroll')" />
        </div>


        <div class="flex justify-end items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-danger-button type="button">
                <a href="{{ route('allowance') }}" wire:navigate> {{ __('Cancel') }}</a>
            </x-danger-button>
        </div>
    </form>
</section>
