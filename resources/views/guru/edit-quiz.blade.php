@extends('layouts.guru')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-200">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-pen-to-square text-green-500 mr-3"></i> Edit Kuis
        </h2>

        <form action="{{ route('quizzes.update', $quiz->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Judul Kuis -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    <i class="fas fa-heading mr-1 text-indigo-500"></i> Judul Kuis
                </label>
                <input type="text" name="title" value="{{ old('title', $quiz->title) }}" class="form-input w-full rounded-lg border-gray-300 focus:ring-green-500 focus:border-green-500" placeholder="Masukkan judul kuis" required>
            </div>

            <!-- Daftar Soal -->
            <div>
                <h4 class="text-lg font-semibold text-gray-700 mb-3 flex items-center">
                    <i class="fas fa-list-check mr-2 text-indigo-600"></i> Soal-Soal
                </h4>

                @foreach($quiz->questions as $index => $question)
                <div class="mb-6 p-6 bg-gray-50 rounded-xl border border-gray-300">
                    <input type="hidden" name="questions[{{ $index }}][id]" value="{{ $question->id }}">

                    <!-- Soal -->
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Pertanyaan</label>
                    <textarea name="questions[{{ $index }}][question]" class="form-textarea w-full rounded-lg border-gray-300 focus:ring-green-500 focus:border-green-500" rows="2" required>{{ old("questions.$index.question", $question->question) }}</textarea>

                    <!-- Pilihan -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
                        <div>
                            <label class="text-sm font-medium text-gray-600">Pilihan A</label>
                            <input type="text" name="questions[{{ $index }}][option_a]" value="{{ old("questions.$index.option_a", $question->option_a) }}" class="form-input w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-600">Pilihan B</label>
                            <input type="text" name="questions[{{ $index }}][option_b]" value="{{ old("questions.$index.option_b", $question->option_b) }}" class="form-input w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-600">Pilihan C</label>
                            <input type="text" name="questions[{{ $index }}][option_c]" value="{{ old("questions.$index.option_c", $question->option_c) }}" class="form-input w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-600">Pilihan D</label>
                            <input type="text" name="questions[{{ $index }}][option_d]" value="{{ old("questions.$index.option_d", $question->option_d) }}" class="form-input w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                    </div>

                    <!-- Jawaban Benar -->
                    <div class="mt-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Jawaban Benar</label>
                        <select name="questions[{{ $index }}][correct_answer]" class="form-select w-full rounded-lg border-gray-300 focus:ring-green-500 focus:border-green-500" required>
                            <option value="a" {{ $question->correct_answer == 'a' ? 'selected' : '' }}>A</option>
                            <option value="b" {{ $question->correct_answer == 'b' ? 'selected' : '' }}>B</option>
                            <option value="c" {{ $question->correct_answer == 'c' ? 'selected' : '' }}>C</option>
                            <option value="d" {{ $question->correct_answer == 'd' ? 'selected' : '' }}>D</option>
                        </select>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Tombol Simpan -->
            <div class="flex justify-between items-center pt-4 border-t">
                <a href="{{ url()->previous() }}" class="text-gray-600 hover:text-green-600 flex items-center">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali
                </a>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2.5 rounded-lg shadow">
                    <i class="fas fa-save mr-2"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
