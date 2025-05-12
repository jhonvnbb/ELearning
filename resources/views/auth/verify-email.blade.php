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
                <div class="flex justify-center items-center mb-4 p-3 bg-green-100 text-green-800 text-sm rounded-md">
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

    {{-- Toast Notification --}}
    <div
        x-data="{ show: @json(session('status') || $errors->any()), message: '{{ session('status') ?? $errors->first() }}' }"
        x-show="show"
        x-init="setTimeout(() => show = false, 4000)"
        class="fixed top-6 right-6 z-50 bg-white border border-green-500 text-green-700 px-4 py-3 rounded-lg shadow-lg flex items-center space-x-3 transition-all duration-300"
        x-transition:enter="transform ease-out duration-300"
        x-transition:enter-start="translate-y-[-20px] opacity-0"
        x-transition:enter-end="translate-y-0 opacity-100"
        x-transition:leave="transform ease-in duration-300"
        x-transition:leave-start="translate-y-0 opacity-100"
        x-transition:leave-end="translate-y-[-20px] opacity-0"
    >
        <i class="fas fa-check-circle text-green-600"></i>
        <span x-text="message"></span>
    </div>

    {{-- Toast for login error --}}
    @if ($errors->any())
        <div
            x-data="{ show: true }"
            x-show="show"
            x-init="setTimeout(() => show = false, 4000)"
            class="fixed top-6 right-6 z-50 bg-white border border-red-500 text-red-700 px-4 py-3 rounded-lg shadow-lg flex items-center space-x-3 transition-all duration-300"
            x-transition
        >
            <i class="fas fa-exclamation-circle text-red-600"></i>
            <span>{{ $errors->first() }}</span>
        </div>
    @endif
</x-guest-layout>
