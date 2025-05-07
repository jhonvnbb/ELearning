<x-guest-layout>
@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
@endpush

<div class="min-h-screen flex">
    <!-- Left Panel -->
    <div class="hidden lg:flex w-1/2 bg-gradient-to-br from-indigo-700 to-purple-600 items-center justify-center text-white p-12" data-aos="fade-right">
        <div class="space-y-6 text-center max-w-md">
            <i class="fas fa-user-plus text-6xl mb-4"></i>
            <h1 class="text-3xl font-bold">Buat Akun!</h1>
            <p class="text-lg">Silakan daftar untuk mulai mengakses sistem pembelajaran digital kami.</p>
            <p class="text-sm">Sudah punya akun?
                <a href="{{ route('login') }}" class="underline hover:text-yellow-300 transition font-medium">Klik Login</a>
            </p>
        </div>
    </div>

    <!-- Right Panel -->
    <div class="flex flex-col justify-center items-center w-full lg:w-1/2 px-6 py-12 bg-gray-50" data-aos="fade-left">
        <div class="w-full max-w-md bg-white p-10 rounded-xl shadow-xl">
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">📋 Daftar Akun Baru</h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-gray-700 mb-1 font-medium">Nama</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-user"></i>
                        </span>
                        <input id="name" type="text" name="name" required autofocus
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none transition" />
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-sm text-red-500" />
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-gray-700 mb-1 font-medium">Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input id="email" type="email" name="email" required
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none transition" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-500" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-gray-700 mb-1 font-medium">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input id="password" type="password" name="password" required
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none transition" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-500" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-gray-700 mb-1 font-medium">Konfirmasi Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none transition" />
                    </div>
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 rounded-lg shadow hover:bg-indigo-700 transition flex items-center justify-center font-medium text-lg">
                    <i class="fas fa-user-plus mr-2"></i> Daftar
                </button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({ duration: 1000, once: true });
    </script>
@endpush
</x-guest-layout>
