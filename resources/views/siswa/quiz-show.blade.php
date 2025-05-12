<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-gray-800 leading-tight">
            📝 Kuis: {{ $quiz->title }}
        </h2>
        <p class="text-sm text-gray-600 mt-1">Pertemuan ke-{{ $quiz->pertemuan }}</p>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 bg-white rounded-xl shadow-md p-6">
            <form method="POST" action="{{ route('siswa.quiz.submit', $quiz->id) }}">
                @csrf

                @foreach ($quiz->questions as $index => $question)
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">
                            {{ $index + 1 }}. {{ $question->question }}
                        </h3>

                        <div class="space-y-2">
                            @foreach (['A', 'B', 'C', 'D'] as $option)
                                <label class="flex items-center gap-2 text-gray-700">
                                    <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option }}"
                                           class="text-blue-600 focus:ring-blue-500 border-gray-300 rounded" required>
                                    <span>{{ $option }}. {{ $question->{'option_' . strtolower($option)} }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <div class="text-center">
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg transition">
                        ✅ Submit Jawaban
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
