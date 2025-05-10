@extends('layouts.guru')

@section('content')
    <!-- Judul Kelas -->
    <div class="mb-6">
        <h2 class="text-3xl font-bold text-gray-800 flex items-center gap-2">
            📚 Kelas: {{ $class->name }}
        </h2>
        @if($guruList->count())
            <p class="text-sm text-gray-600 mt-1">
                👨‍🏫 Guru Pengampu: {{ $guruList->pluck('name')->join(', ') }}
            </p>
        @endif
    </div>

    <!-- Header Materi -->
    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800">📘 Materi Pembelajaran</h1>
        <p class="text-gray-500 mt-2 text-sm">Daftar materi pembelajaran berdasarkan pertemuan.</p>
    </div>

    <!-- Loop Materi -->
    <div class="space-y-6">
        @for ($i = 1; $i <= 16; $i++)
            <div class="bg-white shadow-md rounded-xl p-6 border-l-4 border-blue-500 hover:shadow-xl transition-all">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-800">📖 Pertemuan {{ $i }}</h3>
                        <p class="text-sm text-gray-500 mt-1">Materi untuk sesi ke-{{ $i }}</p>
                    </div>
                    <span class="text-xs bg-blue-500 text-white px-3 py-0.5 rounded-full self-start">Materi</span>
                </div>

                <!-- Dummy Content -->
                <p class="text-gray-700 font-medium mb-2">Judul Materi Pertemuan {{ $i }}</p>
                <p class="text-sm text-gray-600 mb-4">
                    Ringkasan materi yang bisa dibaca oleh guru sebelum mengajar atau mengunggah file lampiran.
                </p>

                <!-- Aksi -->
                <div class="flex items-center justify-between">
                    <a href="#" class="text-blue-600 hover:underline text-sm font-semibold flex items-center gap-1">
                        📄 Lihat Lampiran
                    </a>
                    <button class="text-sm text-gray-500 hover:text-blue-600">✏️ Edit Materi</button>
                </div>
            </div>
        @endfor
    </div>
@endsection
