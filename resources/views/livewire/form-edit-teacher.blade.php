<section>
    {{-- <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header> --}}

    <form wire:submit="update({{ $teacher }})" class="mt-6 space-y-6">
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" value="{{ $teacher->name }}" id="name" name="name" type="text"
                class="mt-1 block w-full" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="status" :value="__('Status')" />
            <select id="status"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
                wire:model="status" name="status" required>
                <option value="" class="text-gray-300 hover:bg-gray-100 hover:text-gray-900">
                    -- Pilih status guru --
                </option>
                <option value="Guru Tetap" class="text-gray-300 hover:bg-gray-100 hover:text-gray-900"
                {{ $teacher->profile->status == 'Guru Tetap' ? 'selected' : '' }}>
                    Guru Tetap
                </option>
                <option value="Guru Honorer" class="text-gray-300 hover:bg-gray-100 hover:text-gray-900"
                {{ $teacher->profile->status == 'Guru Honorer' ? 'selected' : '' }}>
                    Guru Honorer
                </option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('status')" />

        </div>

        <div class="flex justify-end items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-danger-button type="button">
                <a href="{{ route('teacher') }}" wire:navigate> {{ __('Cancel') }}</a>
            </x-danger-button>
        </div>
    </form>
</section>
