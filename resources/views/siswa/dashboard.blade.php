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
                <h3 class="text-2xl font-bold text-gray-800">Halo, {{ Auth::user()->name }} 👋</h3>
                <p class="text-gray-600 mt-2 text-sm">
                    Semangat belajar hari ini! Pilih menu atau masuk ke kelas untuk mulai.
                </p>
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
                               class="p-5 bg-gradient-to-br from-indigo-500 to-purple-600 text-white rounded-xl shadow hover:shadow-lg transform hover:scale-105 transition">
                                <h4 class="text-lg font-semibold">{{ $class->name }}</h4>
                                <p class="text-sm mt-1 opacity-90">Klik untuk masuk kelas</p>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- MENU SECTION -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <x-dashboard.card icon="📝" title="Tugas" desc="Kerjakan dan kumpulkan tugas.">
                    <a href="#" class="inline-block mt-4 text-blue-600 font-medium hover:underline">Lihat Tugas →</a>
                </x-dashboard.card>

                <x-dashboard.card icon="📊" title="Nilai" desc="Lihat hasil belajar kamu.">
                    <a href="#" class="inline-block mt-4 text-blue-600 font-medium hover:underline">Lihat Nilai →</a>
                </x-dashboard.card>

                <x-dashboard.card icon="👤" title="Profil" desc="Kelola akun kamu.">
                    <a href="#" class="inline-block mt-4 text-blue-600 font-medium hover:underline">Kelola Profil →</a>
                </x-dashboard.card>
            </div>
        </div>
    </div>
</x-app-layout>
