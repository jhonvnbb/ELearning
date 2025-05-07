<x-guest-layout>
<div class="min-h-screen flex">
    <!-- Left Panel -->
    <div class="hidden lg:flex w-1/2 bg-indigo-600 items-center justify-center text-white p-12">
        <div class="space-y-6 text-center">
            <i class="fas fa-user-plus text-6xl mb-4"></i>
            <h1 class="text-3xl font-bold mb-2">Buat Akun!</h1>
            <p class="mb-4">Silakan daftar untuk mulai mengakses sistem.</p>
            <p>Sudah punya akun? 
                <a href="{{ route('login') }}" class="underline hover:text-gray-200 transition">Klik Login</a>
            </p>
        </div>
    </div>

    <!-- Right Panel -->
    <div class="flex flex-col justify-center items-center w-full lg:w-1/2 px-6 py-12 bg-gray-100">
        <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-lg   ">
            <h2 class="text-2xl font-semibold mb-6 text-center">Daftar Akun Baru</h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="name" class="block text-gray-700 mb-1">Nama</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-user"></i>
                        </span>
                        <input id="name" type="text" name="name" required autofocus
                            class="w-full pl-10 pr-4 py-2 border rounded shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none transition" />
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-gray-700 mb-1">Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input id="email" type="email" name="email" required
                            class="w-full pl-10 pr-4 py-2 border rounded shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none transition" />
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input id="password" type="password" name="password" required
                            class="w-full pl-10 pr-4 py-2 border rounded shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none transition" />
                    </div>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-gray-700 mb-1">Konfirmasi Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            class="w-full pl-10 pr-4 py-2 border rounded shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none transition" />
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 rounded shadow hover:bg-indigo-700 transition">
                    <i class="fas fa-user-plus mr-2"></i> Daftar
                </button>
            </form>
        </div>
    </div>
</div>
</x-guest-layout>
