<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="text-3xl font-bold text-gray-800 leading-tight flex items-center gap-2">
                📚 Kelas: {{ $class->name }}
            </h2>
            @if($guruList->count())
                <p class="text-sm text-gray-600 mt-1">
                    👨‍🏫 Guru Pengampu: {{ $guruList->pluck('name')->join(', ') }}
                </p>
            @endif
        </div>
    </x-slot>

    <div class="py-10 bg-gradient-to-b from-gray-50 to-white min-h-screen">
        <div class="max-w-5xl mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-800 mb-10 text-center">📘 Materi & Kuis Pembelajaran</h1>

            <div class="space-y-10">
                @for ($i = 1; $i <= 16; $i++)
                    @php
                        $material = $class->materials->firstWhere('pertemuan', $i);
                        $quiz = $class->quizzes->firstWhere('pertemuan', $i);
                    @endphp

                    <div class="bg-white shadow-lg rounded-xl p-6 border-l-4 border-blue-500">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-1">📖 Pertemuan {{ $i }}</h3>
                        <p class="text-sm text-gray-500 mb-4">Materi & kuis pembelajaran sesi ke-{{ $i }}</p>

                        {{-- Materi --}}
                        <div class="mb-6">
                            <h4 class="text-lg font-semibold text-gray-700 mb-2">📄 Materi:</h4>
                            @if ($material)
                                <div class="bg-gray-100 p-4 rounded-md shadow-sm space-y-2">
                                    <p class="font-medium text-gray-800">{{ $material->title }}</p>
                                    <p class="text-sm text-gray-600">{{ Str::limit($material->content, 100) }}</p>
                                    
                                    @if ($material->file_path)
                                        <div class="mt-4">
                                            <iframe 
                                                src="{{ asset('storage/' . $material->file_path) }}" 
                                                width="100%" 
                                                height="500" 
                                                class="border rounded-md shadow-md"
                                                loading="lazy">
                                            </iframe>
                                        </div>
                                    @endif
                                </div>
                            @else
                                <p class="italic text-sm text-gray-400">Belum ada materi.</p>
                            @endif
                        </div>

                        {{-- Kuis --}}
                        <div>
                            <h4 class="text-lg font-semibold text-gray-700 mb-2">📝 Kuis:</h4>
                            @if ($quiz)
                                <div class="bg-green-50 p-4 rounded-md border shadow-sm">
                                    <p class="text-sm text-gray-800 font-medium">Judul: {{ $quiz->title }}</p>
                                    <a href="{{ url('/siswa/quiz-show/' . $quiz->id) }}"
                                       class="mt-3 inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 text-sm font-semibold rounded-md transition">
                                        🎯 Kerjakan Kuis
                                    </a>
                                </div>
                            @else
                                <p class="italic text-sm text-gray-400">Belum ada kuis.</p>
                            @endif
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</x-app-layout>
