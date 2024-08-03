<section>
    {{-- <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header> --}}

    <form wire:submit="store" class="mt-6 space-y-6">
        <div>
            <x-input-label for="user_id" :value="__('Nama Guru')" />
            <select id="user_id"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
                wire:model="user_id" name="user_id" required autofocus>
                <option value="" class="text-gray-300 hover:bg-gray-100 hover:text-gray-900">
                    -- Pilih Guru --
                </option>
                @foreach ($teachers as $teacher)
                    @if (empty($teacher->teachingHours))
                        <option value="{{ $teacher->id }}" class="text-gray-300 hover:bg-gray-100 hover:text-gray-900">
                            {{ $teacher->name }}
                        </option>
                    @endif
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('user_id')" />

        </div>
        <div>
            <x-input-label for="hours" :value="__('Jam Mengajar dalam 1 bulan')" />
            <x-text-input wire:model="hours" id="hours" name="hours" type="number"
                class="mt-1 block w-full" required />
            <x-input-error class="mt-2" :messages="$errors->get('hours')" />
        </div>
        <div>
            <x-input-label for="total" :value="__('Total Gaji (Tanpa titik koma)')" />
            <x-text-input wire:model="total" id="total" name="total" type="number"
                class="mt-1 block w-full" required />
            <x-input-error class="mt-2" :messages="$errors->get('total')" />
        </div>

        <div class="flex justify-end items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-danger-button type="button">
                <a href="{{ route('teaching_hours') }}" wire:navigate> {{ __('Cancel') }}</a>
            </x-danger-button>
        </div>
    </form>
</section>
