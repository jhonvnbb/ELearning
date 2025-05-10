@extends('layouts.guru')

@section('content')
    <!-- WELCOME -->
    <div class="p-6 bg-white shadow-xl rounded-xl border-l-4 border-blue-500 mb-8">
        <h3 class="text-2xl font-bold text-gray-800">Halo, {{ Auth::user()->name }} 👋</h3>
        <p class="text-gray-600 mt-2 text-sm">
            Selamat datang di Dashboard Guru. Berikut ringkasan aktivitas Anda.
        </p>
    </div>

    <!-- STATISTICS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="p-6 bg-white shadow-md rounded-xl text-center border-l-4 border-blue-400">
            <h4 class="text-lg font-semibold text-gray-700">Jumlah Kelas</h4>
            <p class="text-3xl font-bold text-blue-600 mt-2">{{ $jumlahKelas }}</p>
        </div>
        <div class="p-6 bg-white shadow-md rounded-xl text-center border-l-4 border-green-400">
            <h4 class="text-lg font-semibold text-gray-700">Total Siswa</h4>
            <p class="text-3xl font-bold text-green-600 mt-2">{{ $jumlahSiswa }}</p>
        </div>
        <div class="p-6 bg-white shadow-md rounded-xl text-center border-l-4 border-yellow-400">
            <h4 class="text-lg font-semibold text-gray-700">Tugas Dikirim</h4>
            <p class="text-3xl font-bold text-yellow-600 mt-2">8</p>
        </div>
    </div>

    <!-- KELAS YANG DIAMPU -->
    <div class="bg-white shadow-md rounded-xl p-6 mb-8">
        <h4 class="text-xl font-bold text-gray-800 mb-4">📘 Kelas yang Anda Ampu</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($kelas as $item)
                <a href="{{ route('guru.class-content', $item->id) }}" class="block p-4 border border-blue-100 bg-blue-50 hover:bg-blue-100 rounded-lg transition">
                    📚 <span class="font-semibold">{{ $item->name }}</span>
                </a>
            @endforeach
        </div>
    </div>

    <!-- AKSES CEPAT -->
    <div class="bg-white shadow-md rounded-xl p-6">
        <h4 class="text-xl font-bold text-gray-800 mb-4">⚡ Akses Cepat</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
            <a href="{{ route('guru.dashboard') }}" class="block p-4 border border-blue-100 bg-blue-50 hover:bg-blue-100 rounded-lg transition">
                📚 <span class="font-semibold">Manajemen Kelas</span>
            </a>
            <a href="#" class="block p-4 border border-green-100 bg-green-50 hover:bg-green-100 rounded-lg transition">
                📝 <span class="font-semibold">Kelola Tugas</span>
            </a>
            <a href="#" class="block p-4 border border-yellow-100 bg-yellow-50 hover:bg-yellow-100 rounded-lg transition">
                📅 <span class="font-semibold">Absensi Siswa</span>
            </a>
            <a href="#" class="block p-4 border border-purple-100 bg-purple-50 hover:bg-purple-100 rounded-lg transition">
                📢 <span class="font-semibold">Pengumuman</span>
            </a>
        </div>
    </div>
@endsection
