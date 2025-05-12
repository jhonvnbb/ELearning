@extends('layouts.guru')

@section('content')
<div class="max-w-3xl mx-auto mt-10">
    <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-200">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-pen-to-square text-blue-500 mr-3"></i> Edit Materi
        </h2>

        <form action="{{ route('materi.update', $materi->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Judul Materi -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    <i class="fas fa-heading mr-1 text-indigo-500"></i> Judul Materi
                </label>
                <input type="text" name="title" value="{{ old('title', $materi->title) }}" class="form-input w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan judul materi" required>
            </div>

            <!-- Konten Materi -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    <i class="fas fa-align-left mr-1 text-indigo-500"></i> Konten Materi
                </label>
                <textarea name="content" rows="5" class="form-textarea w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Tulis konten materi...">{{ old('content', $materi->content) }}</textarea>
            </div>

            <!-- Upload File -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    <i class="fas fa-file-upload mr-1 text-indigo-500"></i> Ganti File PDF (Opsional)
                </label>
                <input type="file" name="file" class="form-input w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                @if ($materi->file_path)
                    <p class="text-sm text-gray-600 mt-2">
                        📎 File Saat Ini: 
                        <a href="{{ asset('storage/'.$materi->file_path) }}" target="_blank" class="text-blue-600 hover:underline">Lihat PDF</a>
                    </p>
                @endif
            </div>

            <!-- Tombol -->
            <div class="flex justify-between items-center pt-4 border-t">
                <a href="{{ url()->previous() }}" class="text-gray-600 hover:text-blue-600 flex items-center">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2.5 rounded-lg shadow">
                    <i class="fas fa-save mr-1"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
