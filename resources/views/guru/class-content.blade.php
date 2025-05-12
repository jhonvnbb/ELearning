@extends('layouts.guru')

@section('content')

<div class="max-w-6xl mx-auto px-4 py-8">
    <!-- Judul Kelas -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-800 flex items-center gap-2">
            <i class="fas fa-book mr-2 text-blue-600"></i> Kelas: {{ $class->name }}
        </h2>
        @if($guruList->count())
            <p class="text-sm text-gray-600 mt-1">
                <i class="fas fa-chalkboard-teacher"></i> Guru Pengampu: {{ $guruList->pluck('name')->join(', ') }}
            </p>
        @endif
    </div>

    <!-- Heading -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-extrabold text-blue-800">
            <i class="fas fa-layer-group"></i> Materi & Kuis Pembelajaran
        </h1>
        <p class="text-gray-500 mt-2 text-sm">Daftar materi dan kuis berdasarkan pertemuan mingguan.</p>
    </div>

    <!-- List Pertemuan dalam Accordion -->
    <div class="space-y-6">
        @for ($i = 1; $i <= 16; $i++)
        <div class="border rounded-xl shadow">
            <button onclick="toggleAccordion({{ $i }})" class="w-full flex justify-between items-center p-4 bg-blue-100 text-blue-900 font-semibold rounded-t-xl">
                <span><i class="fas fa-book-open mr-2"></i>Pertemuan {{ $i }}</span>
                <i class="fas fa-chevron-down transform transition-transform duration-200" id="icon-{{ $i }}"></i>
            </button>
            <div id="accordion-body-{{ $i }}" class="p-6 hidden bg-white">

                <div class="flex justify-end gap-3 mb-4">
                    <button onclick="toggleForm({{ $i }}, 'materi')" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-1.5 rounded-lg text-sm font-medium shadow">
                        <i class="fas fa-plus-circle mr-1"></i> Materi
                    </button>
                    <button onclick="toggleForm({{ $i }}, 'quiz')" class="bg-green-600 hover:bg-green-700 text-white px-4 py-1.5 rounded-lg text-sm font-medium shadow">
                        <i class="fas fa-plus-circle mr-1"></i> Kuis
                    </button>
                </div>

                @php
                    $materiPertemuan = $materis->where('pertemuan', $i);
                    $quizPertemuan = $quizzes->where('pertemuan', $i);
                @endphp

                <h4 class="text-lg font-semibold text-gray-700 mb-3"><i class="fas fa-file-alt mr-1"></i> Materi:</h4>
                @forelse($materiPertemuan as $materi)
                    <div class="bg-gray-50 border border-gray-200 p-4 rounded-lg mb-3 shadow-sm">
                        <div class="text-base font-semibold">{{ $materi->title }}</div>
                        <div class="text-sm text-gray-600 mt-1">{{ $materi->content }}</div>
                        @if($materi->file_path)
                            <a href="{{ asset('storage/'.$materi->file_path) }}" target="_blank" class="text-blue-600 text-sm underline mt-2 inline-block">
                                <i class="fas fa-paperclip"></i> Lihat PDF
                            </a>
                        @endif
                        <div class="flex gap-4 mt-3 text-sm">
                            <a href="{{ route('materi.edit', $materi->id) }}" class="text-yellow-500 hover:underline">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('materi.destroy', $materi->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus materi ini?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline"><i class="fas fa-trash"></i> Hapus</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-gray-500 italic">Belum ada materi ditambahkan.</p>
                @endforelse

                <h4 class="text-lg font-semibold text-gray-700 mt-6 mb-3"><i class="fas fa-clipboard-list mr-1"></i> Kuis:</h4>
                @forelse($quizPertemuan as $quiz)
                    <div class="bg-green-50 border border-green-200 p-4 rounded-lg mb-3 shadow-sm">
                        <div class="font-semibold">{{ $quiz->title }}</div>
                        <ol class="list-decimal ml-5 text-sm mt-2 space-y-2">
                            @foreach($quiz->questions as $q)
                                <li>
                                    <div>{{ $q->question }}</div>
                                    <div class="ml-3 text-gray-600">
                                        A. {{ $q->option_a }}<br>
                                        B. {{ $q->option_b }}<br>
                                        C. {{ $q->option_c }}<br>
                                        D. {{ $q->option_d }}<br>
                                        <span class="text-green-700 font-semibold">
                                            <i class="fas fa-check-circle"></i> Jawaban: {{ strtoupper($q->correct_answer) }}
                                        </span>
                                    </div>
                                </li>
                            @endforeach
                        </ol>
                        <div class="flex gap-4 mt-3 text-sm">
                            <a href="{{ route('quizzes.edit', $quiz->id) }}" class="text-yellow-500 hover:underline">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('quizzes.destroy', $quiz->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kuis ini?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline"><i class="fas fa-trash"></i> Hapus</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-gray-500 italic">Belum ada kuis ditambahkan.</p>
                @endforelse

                <!-- Form Tambah Materi -->
                <div id="form-materi-{{ $i }}" class="mt-6 hidden">
                    <form action="{{ route('materi.store') }}" method="POST" enctype="multipart/form-data" class="bg-blue-50 border border-blue-200 p-5 rounded-lg space-y-4">
                        @csrf
                        <input type="hidden" name="class_id" value="{{ $class->id }}">
                        <input type="hidden" name="pertemuan" value="{{ $i }}">
                        <div>
                            <label class="text-sm font-medium">Judul Materi</label>
                            <input type="text" name="title" required class="w-full mt-1 rounded-md border-gray-300 shadow-sm">
                        </div>
                        <div>
                            <label class="text-sm font-medium">File PDF (opsional)</label>
                            <input type="file" name="file" class="w-full mt-1">
                        </div>
                        <div>
                            <label class="text-sm font-medium">Konten Materi</label>
                            <textarea name="content" rows="3" class="w-full rounded-md border-gray-300 shadow-sm"></textarea>
                        </div>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-md font-medium shadow">
                            <i class="fas fa-save mr-1"></i> Simpan Materi
                        </button>
                    </form>
                </div>

                <!-- Form Tambah Kuis -->
                <div id="form-quiz-{{ $i }}" class="mt-6 hidden">
                    <form action="{{ route('quizzes.store') }}" method="POST" class="bg-green-50 border border-green-200 p-5 rounded-lg space-y-4">
                        @csrf
                        <input type="hidden" name="class_id" value="{{ $class->id }}">
                        <input type="hidden" name="pertemuan" value="{{ $i }}">
                        <div>
                            <label class="text-sm font-medium">Judul Kuis</label>
                            <input type="text" name="title" required class="w-full mt-1 rounded-md border-gray-300 shadow-sm">
                        </div>
                        <div id="quiz-question-list-{{ $i }}">
                            @include('components.question-item', ['index' => 0, 'pertemuan' => $i])
                        </div>
                        <button type="button" onclick="addQuestion({{ $i }})" class="text-sm text-green-600 font-medium mt-1">
                            <i class="fas fa-plus-circle mr-1"></i> Tambah Soal
                        </button>
                        <div>
                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-md font-medium shadow">
                                <i class="fas fa-check mr-1"></i> Simpan Kuis
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endfor
    </div>
</div>

<!-- Script -->
<script>
    function toggleAccordion(i) {
        const body = document.getElementById(`accordion-body-${i}`);
        const icon = document.getElementById(`icon-${i}`);
        body.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
    }

    function toggleForm(i, type) {
        const materi = document.getElementById(`form-materi-${i}`);
        const quiz = document.getElementById(`form-quiz-${i}`);
        if (type === 'materi') {
            materi.classList.toggle('hidden');
            quiz.classList.add('hidden');
        } else {
            quiz.classList.toggle('hidden');
            materi.classList.add('hidden');
        }
    }

    function addQuestion(pertemuan) {
        const container = document.getElementById(`quiz-question-list-${pertemuan}`);
        const index = container.children.length;

        const html = `
            <div class="mb-6 p-6 bg-white rounded-2xl shadow-md border border-gray-200">
                <!-- Pertanyaan -->
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    <i class="fas fa-question-circle text-blue-500 mr-1"></i> Pertanyaan
                </label>
                <input type="text" name="questions[${index}][question]" class="form-input w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan pertanyaan..." required>

                <!-- Pilihan Jawaban -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label class="text-sm font-medium text-gray-600">
                            Pilihan A
                        </label>
                        <input type="text" name="questions[${index}][option_a]" class="form-input w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="A" required>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-600">
                            Pilihan B
                        </label>
                        <input type="text" name="questions[${index}][option_b]" class="form-input w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="B" required>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-600">
                            Pilihan C
                        </label>
                        <input type="text" name="questions[${index}][option_c]" class="form-input w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="C" required>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-600">
                            Pilihan D
                        </label>
                        <input type="text" name="questions[${index}][option_d]" class="form-input w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="D" required>
                    </div>
                </div>

                <!-- Dropdown Jawaban Benar -->
                <div class="mt-5">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        <i class="fas fa-check-circle text-green-500 mr-1"></i> Jawaban Benar
                    </label>
                    <select name="questions[${index}][correct_answer]" class="form-select w-full rounded-lg border-gray-300 focus:ring-green-500 focus:border-green-500" required>
                        <option value="" disabled selected>-- Pilih jawaban benar --</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                </div>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', html);
    }

</script>
@endsection