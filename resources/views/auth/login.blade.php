<x-guest-layout>
<div class="min-h-screen flex">
    <!-- Left Side (Decoration) -->
    <div class="hidden lg:flex w-1/2 bg-indigo-600 text-white items-center justify-center p-12">
        <div class="space-y-6 text-center">
            <div class="text-5xl">
                <i class="fas fa-user-shield"></i>
            </div>
            <h2 class="text-3xl font-bold">Selamat Datang!</h2>
            <p class="text-lg">Akses dashboard Anda dengan aman dan mudah.<br>Silakan login menggunakan akun Anda.</p>
            <p>Belum punya akun? klik <a href="/register" class="underline hover:text-gray-200">Daftar</a></p>
        </div>
    </div>

    <!-- Right Side (Login Form) -->
    <div class="flex flex-col justify-center items-center w-full lg:w-1/2 px-6 py-12 bg-gray-100">
        <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-lg">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login ke Akun Anda</h2>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus
                            class="pl-10 pr-4 py-2 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none transition" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-500" />
                </div>

                <div>
                    <label for="password" class="block mb-1 text-sm font-medium text-gray-700">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input id="password" type="password" name="password" required
                            class="pl-10 pr-4 py-2 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none transition" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-500" />
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label for="remember_me" class="flex items-center space-x-2 text-gray-600">
                        <input id="remember_me" type="checkbox" name="remember"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                        <span>Ingat saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-indigo-600 hover:underline hover:text-indigo-800 transition" href="{{ route('password.request') }}">
                            Lupa Password?
                        </a>
                    @endif
                </div>

                <div>
                    <button type="submit"
                        class="w-full bg-indigo-600 text-white py-2 rounded-lg shadow hover:bg-indigo-700 transition flex items-center justify-center">
                        <i class="fas fa-sign-in-alt mr-2"></i> Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</x-guest-layout>
