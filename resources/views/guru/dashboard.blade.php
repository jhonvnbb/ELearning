@extends('layouts.guru')

@section('content')
<div class="space-y-10">

    <!-- GREETING -->
    <div class="p-6 bg-white shadow-xl rounded-2xl border-l-4 border-blue-600">
        <h3 class="text-3xl font-bold text-gray-800">👋 Halo, {{ Auth::user()->name }}</h3>
        <p class="text-gray-600 mt-2">Selamat datang di Dashboard Guru! Di bawah ini adalah ringkasan aktivitas Anda.</p>
    </div>

    <!-- STATISTICS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="p-6 bg-white shadow-lg rounded-xl border-t-4 border-blue-500 text-center">
            <div class="text-blue-500 text-3xl mb-2"><i class="fas fa-chalkboard"></i></div>
            <h4 class="text-lg font-semibold text-gray-700">Jumlah Kelas</h4>
            <p class="text-3xl font-bold text-blue-600 mt-1">{{ $jumlahKelas }}</p>
        </div>
        <div class="p-6 bg-white shadow-lg rounded-xl border-t-4 border-green-500 text-center">
            <div class="text-green-500 text-3xl mb-2"><i class="fas fa-users"></i></div>
            <h4 class="text-lg font-semibold text-gray-700">Total Siswa</h4>
            <p class="text-3xl font-bold text-green-600 mt-1">{{ $jumlahSiswa }}</p>
        </div>
        <div class="p-6 bg-white shadow-lg rounded-xl border-t-4 border-indigo-500 text-center">
            <div class="text-indigo-500 text-3xl mb-2"><i class="fas fa-book"></i></div>
            <h4 class="text-lg font-semibold text-gray-700">Total Materi</h4>
            <p class="text-3xl font-bold text-indigo-600 mt-1">{{ $totalMateri ?? '-' }}</p>
        </div>
    </div>

    <!-- KELAS YANG DIAMPU -->
    <div class="bg-white shadow-md rounded-2xl p-6">
        <h4 class="text-xl font-bold text-gray-800 mb-4">📘 Kelas yang Anda Ampu</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse ($kelas as $item)
                <a href="{{ route('guru.class-content', $item->id) }}" class="block p-4 border border-blue-100 bg-blue-50 hover:bg-blue-100 rounded-xl transition duration-200 shadow-sm">
                    <div class="font-semibold text-lg mb-1">📚 {{ $item->name }}</div>
                    <div class="text-sm text-gray-600">
                        📄 Materi: <span class="font-medium">{{ $item->materials_count }}</span><br>
                        📝 Tugas/Kuis: <span class="font-medium">{{ $item->quizzes_count }}</span>
                    </div>
                </a>
            @empty
                <p class="text-gray-500">Belum ada kelas yang Anda ampu.</p>
            @endforelse
        </div>
    </div>

    <!-- AKSES CEPAT -->
    <div class="bg-white shadow-md rounded-2xl p-6">
        <h4 class="text-xl font-bold text-gray-800 mb-4">⚡ Akses Cepat</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
            <a href="{{ route('guru.dashboard') }}" class="flex items-center gap-2 p-4 border border-blue-100 bg-blue-50 hover:bg-blue-100 rounded-xl transition">
                <i class="fas fa-layer-group text-blue-600 text-xl"></i>
                <span class="font-medium text-gray-700">Manajemen Kelas</span>
            </a>
            <a href="#" class="flex items-center gap-2 p-4 border border-green-100 bg-green-50 hover:bg-green-100 rounded-xl transition">
                <i class="fas fa-tasks text-green-600 text-xl"></i>
                <span class="font-medium text-gray-700">Kelola Tugas</span>
            </a>
            <a href="#" class="flex items-center gap-2 p-4 border border-yellow-100 bg-yellow-50 hover:bg-yellow-100 rounded-xl transition">
                <i class="fas fa-calendar-check text-yellow-600 text-xl"></i>
                <span class="font-medium text-gray-700">Absensi Siswa</span>
            </a>
            <a href="#" class="flex items-center gap-2 p-4 border border-purple-100 bg-purple-50 hover:bg-purple-100 rounded-xl transition">
                <i class="fas fa-bullhorn text-purple-600 text-xl"></i>
                <span class="font-medium text-gray-700">Pengumuman</span>
            </a>
        </div>
    </div>
</div>
@endsection
