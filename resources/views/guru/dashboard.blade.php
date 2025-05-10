<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-gray-800 leading-tight flex items-center gap-2">
            🎓 {{ __('Dashboard Guru') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gradient-to-b from-blue-50 via-white to-blue-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- WELCOME SECTION -->
            <div class="p-6 bg-white shadow-xl rounded-xl border-l-4 border-blue-500">
                <h3 class="text-2xl font-bold text-gray-800">Halo, {{ Auth::user()->name }} 👋</h3>
                <p class="text-gray-600 mt-2 text-sm">
                    Selamat datang di Dashboard Guru. Berikut ringkasan aktivitas Anda.
                </p>
            </div>

            <!-- STATISTICS SECTION -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-4 bg-white shadow-md rounded-lg">
                    <h4 class="text-lg font-semibold text-gray-700">Jumlah Kelas</h4>
                    <p class="text-3xl font-bold text-blue-600 mt-2">4</p>
                </div>
                <div class="p-4 bg-white shadow-md rounded-lg">
                    <h4 class="text-lg font-semibold text-gray-700">Total Siswa</h4>
                    <p class="text-3xl font-bold text-blue-600 mt-2">120</p>
                </div>
                <div class="p-4 bg-white shadow-md rounded-lg">
                    <h4 class="text-lg font-semibold text-gray-700">Tugas Dikirim</h4>
                    <p class="text-3xl font-bold text-blue-600 mt-2">8</p>
                </div>
            </div>

            <!-- QUICK ACCESS / MENU -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h4 class="text-xl font-bold text-gray-800 mb-4">Akses Cepat</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <a href="{{ route('guru.dashboard') }}" class="block p-4 border border-blue-100 bg-blue-50 hover:bg-blue-100 rounded-lg transition">
                        📚 <span class="font-semibold">Manajemen Kelas</span>
                    </a>
                    <a href="{{ route('guru.dashboard') }}" class="block p-4 border border-green-100 bg-green-50 hover:bg-green-100 rounded-lg transition">
                        📝 <span class="font-semibold">Kelola Tugas</span>
                    </a>
                    <a href="{{ route('guru.dashboard') }}" class="block p-4 border border-yellow-100 bg-yellow-50 hover:bg-yellow-100 rounded-lg transition">
                        📅 <span class="font-semibold">Absensi Siswa</span>
                    </a>
                    <a href="{{ route('guru.dashboard') }}" class="block p-4 border border-purple-100 bg-purple-50 hover:bg-purple-100 rounded-lg transition">
                        📢 <span class="font-semibold">Pengumuman</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
