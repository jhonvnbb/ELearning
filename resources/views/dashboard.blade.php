<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | ELearning</title>
</head>
<body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- WELCOME SECTION -->
            <div class="mb-6 p-6 bg-white shadow-md rounded-lg">
                <h3 class="text-xl font-bold text-gray-700">Selamat Datang, {{ Auth::user()->name }}!</h3>
                <p class="text-gray-500 mt-2">Silakan pilih menu di bawah untuk memulai belajar.</p>
            </div>

            <!-- MENU CARD SECTION -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!-- Materi -->
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h4 class="text-lg font-semibold text-gray-700 mb-2">📚 Modul</h4>
                    <p class="text-gray-500 text-sm">Lihat dan pelajari materi pembelajaran yang telah disediakan.</p>
                    <a href="#" class="inline-block mt-4 text-blue-600 font-medium hover:underline">Lihat Modul →</a>
                </div>

                <!-- Tugas -->
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h4 class="text-lg font-semibold text-gray-700 mb-2">📝 Tugas</h4>
                    <p class="text-gray-500 text-sm">Kerjakan dan kumpulkan tugas dari dosen secara online.</p>
                    <a href="#" class="inline-block mt-4 text-blue-600 font-medium hover:underline">Lihat Tugas →</a>
                </div>

                <div class="mb-4">
    <h3 class="font-bold text-lg">Kelas Saya:</h3>
    <ul class="list-disc pl-5">
        @foreach (auth()->user()->classes as $class)
            <li>{{ $class->name }}</li>
        @endforeach
    </ul>
</div>


                <!-- Forum -->
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h4 class="text-lg font-semibold text-gray-700 mb-2">💬 Forum Diskusi</h4>
                    <p class="text-gray-500 text-sm">Diskusi dan tanya jawab bersama teman dan dosen.</p>
                    <a href="#" class="inline-block mt-4 text-blue-600 font-medium hover:underline">Masuk Forum →</a>
                </div>

                <!-- Nilai -->
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h4 class="text-lg font-semibold text-gray-700 mb-2">📊 Nilai</h4>
                    <p class="text-gray-500 text-sm">Lihat nilai ujian, tugas, dan aktivitas belajar lainnya.</p>
                    <a href="#" class="inline-block mt-4 text-blue-600 font-medium hover:underline">Lihat Nilai →</a>
                </div>

                <!-- Jadwal -->
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h4 class="text-lg font-semibold text-gray-700 mb-2">📅 Jadwal</h4>
                    <p class="text-gray-500 text-sm">Cek jadwal kelas online dan kegiatan akademik.</p>
                    <a href="#" class="inline-block mt-4 text-blue-600 font-medium hover:underline">Lihat Jadwal →</a>
                </div>

                <!-- Profile -->
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h4 class="text-lg font-semibold text-gray-700 mb-2">👤 Profil</h4>
                    <p class="text-gray-500 text-sm">Kelola informasi akun dan pengaturan pribadi kamu.</p>
                    <a href="#" class="inline-block mt-4 text-blue-600 font-medium hover:underline">Kelola Profil →</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

</body>
</html>