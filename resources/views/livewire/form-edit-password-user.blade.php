<section class="pt-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update user account's password.") }}
        </p>
    </header>

    <form wire:submit="updatePassword({{ $user }})" class="mt-6 space-y-6">
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input wire:model="password" id="password"  name="password" type="password"
                class="mt-1 block w-full" required />
            <x-input-error class="mt-2" :messages="$errors->get('password')" />
        </div>
        <div>
            <x-input-label for="confirmPass" :value="__('confirmPass')" />
            <x-text-input wire:model="confirmPass" id="confirmPass"  name="confirmPass" type="password"
                class="mt-1 block w-full" required />
            <x-input-error class="mt-2" :messages="$errors->get('confirmPass')" />
        </div>



        <div class="flex justify-end items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-danger-button type="button">
                <a href="{{ route('user') }}" wire:navigate> {{ __('Cancel') }}</a>
            </x-danger-button>
        </div>
    </form>
</section>
