<x-guest-layout>
    <div class="min-h-screen flex">
        <!-- Left Side (Decoration) -->
        <div class="hidden lg:flex w-1/2 bg-indigo-600 text-white items-center justify-center p-12">
            <div class="space-y-6 text-center">
                <div class="text-5xl">
                    <i class="fas fa-unlock-alt"></i>
                </div>
                <h2 class="text-3xl font-bold">Lupa Password?</h2>
                <p class="text-lg">Jangan khawatir! Masukkan email Anda dan kami akan <br> mengirimkan tautan untuk mereset password Anda.</p>
                <p>Sudah ingat password? <a href="/login" class="underline">Login di sini</a></p>
            </div>
        </div>

        <!-- Right Side (Form) -->
        <div class="flex flex-col justify-center items-center w-full lg:w-1/2 px-6 py-12 bg-gray-100">
            <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-lg">
                <h2 class="text-center text-2xl font-bold text-gray-800 mb-6">
                    <i class="fas fa-envelope-open-text mr-2 text-indigo-600"></i>
                    Reset Password
                </h2>

                <x-auth-session-status class="mb-4 text-sm text-green-600" :status="session('status')" />

                <div class="mb-4 text-sm text-gray-600 text-center">
                    {{ __('Masukkan email Anda dan kami akan mengirimkan link reset password.') }}
                </div>

                <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="email" :value="__('Email')" class="text-sm font-semibold text-gray-700" />
                        <x-text-input id="email" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    <div>
                        <x-primary-button class="w-full py-3 rounded-lg shadow-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-150 flex items-center justify-center">
                            <i class="fas fa-paper-plane mr-2"></i>
                            {{ __('Kirim Link Reset') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
