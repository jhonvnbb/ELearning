<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-100 via-white to-indigo-200 py-12 px-6">
        <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">📧 Verifikasi Email</h2>
                <p class="text-sm text-gray-600 mt-2">
                    Terima kasih telah mendaftar! Silakan klik link yang telah dikirim ke email kamu untuk verifikasi.
                </p>
                <p class="text-sm text-gray-600 mt-1">
                    Tidak menerima email? Kamu bisa meminta untuk dikirim ulang.
                </p>
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 p-3 bg-green-100 text-green-800 text-sm rounded-md">
                    Link verifikasi baru telah dikirim ke email kamu!
                </div>
            @endif

            <div class="mt-6 space-y-4">
                <form method="POST" action="{{ route('verification.send') }}" class="w-full">
                    @csrf
                    <button
                        type="submit"
                        class="w-full flex justify-center items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                        <i class="fas fa-envelope mr-2"></i> Kirim Ulang Email Verifikasi
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button
                        type="submit"
                        class="w-full text-center text-sm text-gray-600 hover:text-gray-900 underline focus:outline-none">
                        <i class="fas fa-sign-out-alt mr-1"></i> Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
