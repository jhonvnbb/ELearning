<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-gray-800 leading-tight flex items-center gap-2">
            🎓 {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gradient-to-b from-blue-50 via-white to-blue-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- WELCOME SECTION -->
            <div class="p-6 bg-white shadow-xl rounded-xl border-l-4 border-blue-500">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-100 text-blue-700 flex items-center justify-center rounded-full shadow">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M5.121 17.804A7 7 0 0112 15a7 7 0 016.879 2.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800">Halo, {{ Auth::user()->name }} 👋</h3>
                        <p class="text-gray-600 mt-1 text-sm">Selamat datang kembali di platform pembelajaran.</p>
                    </div>
                </div>
            </div>

            <!-- PROGRESS SECTION -->
            <div class="bg-white p-6 rounded-xl shadow">
                <h3 class="text-xl font-semibold text-gray-700 mb-3">📈 Progress Belajar</h3>
                <p class="text-sm text-gray-600">📚 Total Kelas: {{ auth()->user()->classes->count() }} | 🎯 Kuis Dikerjakan: - </p>
                <div class="mt-3 w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-600 h-2 rounded-full" style="width: 70%"></div>
                </div>
            </div>

            <!-- KELAS SAYA -->
            <div class="bg-white p-6 shadow-lg rounded-xl">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-semibold text-gray-700">📘 Kelas Saya</h3>
                    <a href="{{ route('join.class.form') }}"
                       class="inline-flex items-center gap-1 bg-blue-600 text-white px-4 py-2 rounded-md shadow hover:bg-blue-700 transition text-sm font-medium">
                        ➕ Gabung Kelas Baru
                    </a>
                </div>

                @if (auth()->user()->classes->isEmpty())
                    <div class="text-center text-gray-500 italic">
                        Kamu belum tergabung ke kelas manapun.
                        <br>
                        <a href="{{ route('join.class.form') }}" class="mt-3 inline-block text-blue-600 hover:underline font-medium">
                            Gabung ke Kelas →
                        </a>
                    </div>
                @else
                    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-5">
                        @foreach (auth()->user()->classes as $class)
                            <a href="{{ route('siswa.class-content', $class->id) }}"
                               class="p-5 bg-gradient-to-br from-indigo-500 to-purple-600 text-white rounded-xl shadow-lg hover:shadow-2xl transform hover:scale-105 transition duration-300">
                                <h4 class="text-lg font-semibold flex items-center justify-between">
                                    {{ $class->name }}
                                    <span class="ml-2 text-xs bg-yellow-300 text-gray-800 px-2 py-0.5 rounded-full">📌</span>
                                </h4>
                                <p class="text-sm mt-1 opacity-90">Klik untuk masuk kelas</p>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- MENU SECTION -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div class="p-6 bg-white rounded-xl shadow hover:shadow-md transition group border-t-4 border-blue-600">
                    <div class="text-4xl mb-3 group-hover:scale-110 transition">📝</div>
                    <h4 class="text-lg font-semibold text-gray-700">Tugas</h4>
                    <p class="text-sm text-gray-500 mt-1">Kerjakan dan kumpulkan tugas.</p>
                    <a href="#" class="inline-block mt-4 text-blue-600 font-medium hover:underline">Lihat Tugas →</a>
                </div>

                <div class="p-6 bg-white rounded-xl shadow hover:shadow-md transition group border-t-4 border-green-600">
                    <div class="text-4xl mb-3 group-hover:scale-110 transition">📊</div>
                    <h4 class="text-lg font-semibold text-gray-700">Nilai</h4>
                    <p class="text-sm text-gray-500 mt-1">Lihat hasil belajar kamu.</p>
                    <a href="#" class="inline-block mt-4 text-blue-600 font-medium hover:underline">Lihat Nilai →</a>
                </div>

                <div class="p-6 bg-white rounded-xl shadow hover:shadow-md transition group border-t-4 border-purple-600">
                    <div class="text-4xl mb-3 group-hover:scale-110 transition">👤</div>
                    <h4 class="text-lg font-semibold text-gray-700">Profil</h4>
                    <p class="text-sm text-gray-500 mt-1">Kelola akun kamu.</p>
                    <a href="#" class="inline-block mt-4 text-blue-600 font-medium hover:underline">Kelola Profil →</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
