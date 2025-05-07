<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 via-white to-blue-200 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-2xl shadow-xl">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900">🔐 Reset Password</h2>
                <p class="mt-2 text-sm text-gray-600">Masukkan email dan password baru kamu.</p>
            </div>

            <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-envelope mr-1 text-gray-500"></i> Email
                    </label>
                    <div class="mt-1 relative">
                        <input id="email" name="email" type="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username"
                            class="appearance-none rounded-md relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-lock mr-1 text-gray-500"></i> Password Baru
                    </label>
                    <div class="mt-1 relative">
                        <input id="password" name="password" type="password" required autocomplete="new-password"
                            class="appearance-none rounded-md relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-lock mr-1 text-gray-500"></i> Konfirmasi Password
                    </label>
                    <div class="mt-1 relative">
                        <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                            class="appearance-none rounded-md relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-150 ease-in-out">
                        <i class="fas fa-sync-alt mr-2"></i> Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
