<x-guest-layout>
@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
@endpush

<div class="min-h-screen flex">
    <!-- Left Side (Illustration / Welcome Text) -->
    <div class="hidden lg:flex w-1/2 bg-gradient-to-br from-indigo-700 to-blue-600 text-white items-center justify-center p-12" data-aos="fade-right">
        <div class="text-center space-y-6 max-w-md">
            <div class="text-5xl">
                <i class="fas fa-user-shield"></i>
            </div>
            <h2 class="text-3xl font-bold">Selamat Datang Kembali!</h2>
            <p class="text-lg">Akses dashboard Anda dengan aman dan mudah.<br>Masuk untuk mulai belajar.</p>
            <p class="text-sm text-gray-200">Belum punya akun? 
                <a href="/register" class="underline hover:text-yellow-300 font-medium">Daftar Sekarang</a>
            </p>
        </div>
    </div>

    <!-- Right Side (Login Form) -->
    <div class="flex flex-col justify-center items-center w-full lg:w-1/2 px-6 py-12 bg-gray-50" data-aos="fade-left">
        <div class="w-full max-w-md bg-white p-10 rounded-xl shadow-xl">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">🔐 Login ke Akun Anda</h2>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
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

                <!-- Password -->
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

                <!-- Remember Me & Forgot Password -->
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

                <!-- Submit -->
                <div>
                    <button type="submit"
                        class="w-full bg-indigo-600 text-white py-2 rounded-lg shadow hover:bg-indigo-700 transition flex items-center justify-center font-medium text-lg">
                        <i class="fas fa-sign-in-alt mr-2"></i> Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
@endpush
</x-guest-layout>
