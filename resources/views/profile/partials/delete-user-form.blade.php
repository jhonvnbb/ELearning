<section class="space-y-6 bg-white rounded-xl shadow-lg p-6">
    <header>
        <h2 class="text-xl font-semibold text-red-600">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-2 text-sm text-gray-700">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
        class="transition hover:bg-red-700 duration-300"
        x-data
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="bg-white rounded-lg shadow p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-bold text-gray-800">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-2 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-4">
                <x-input-label for="password" value="{{ __('Password') }}" />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full"
                    placeholder="********"
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end space-x-3">
                <x-secondary-button x-on:click="$dispatch('close')" class="hover:bg-gray-200 transition">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="hover:bg-red-700 transition">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
