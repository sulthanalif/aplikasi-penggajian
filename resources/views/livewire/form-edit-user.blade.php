<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form wire:submit="update({{ $user }})" class="mt-6 space-y-6">
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" value="{{ $user->name }}" name="name" type="text"
                class="mt-1 block w-full" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>

            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" name="email" value="{{ $user->email }}" type="email"
                class="mt-1 block w-full" required />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

        </div>
        <div>
            <x-input-label for="role" :value="__('Role')" />
            <select id="role"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
                wire:model="role" name="role" required>
                <option value="" class="text-gray-300 hover:bg-gray-100 hover:text-gray-900">
                    -- Pilih Role --
                </option>
                <option value="officer" class="text-gray-300 hover:bg-gray-100 hover:text-gray-900" {{ optional($user->roles->first())->name == 'officer' ? 'selected' : '' }}>
                    Petugas TU
                </option>
                <option value="teacher" class="text-gray-300 hover:bg-gray-100 hover:text-gray-900" {{ optional($user->roles->first())->name == 'teacher' ? 'selected' : '' }}>
                    Guru
                </option>
                <option value="headmaster" class="text-gray-300 hover:bg-gray-100 hover:text-gray-900" {{ optional($user->roles->first())->name == 'headmaster' ? 'selected' : '' }}>
                    Kepala Sekolah
                </option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('role')" />

        </div>


        <div class="flex justify-end items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
