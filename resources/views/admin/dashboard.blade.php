<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-gray-800 leading-tight flex items-center gap-2">
            🎓 {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gradient-to-b from-blue-50 via-white to-blue-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- WELCOME SECTION -->
            <div class="p-6 bg-white shadow-xl rounded-xl border-l-4 border-blue-500">
                <h3 class="text-2xl font-bold text-gray-800">Halo, {{ Auth::user()->name }} 👋</h3>
                <p class="text-gray-600 mt-2 text-sm">
                    Semangat belajar hari ini! Pilih menu atau masuk ke kelas untuk mulai.
                </p>
            </div>

        </div>
    </div>
</x-app-layout>
