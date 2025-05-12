@php
    $totalQuestions = $quiz->questions->count();
@endphp

<x-app-layout>
    <!-- Header -->
<x-slot name="header">
    <h2 class="text-2xl md:text-3xl font-extrabold text-gray-800">📝 {{ $quiz->title }}</h2>
    <div class="flex justify-between items-center flex-wrap gap-4">
        <div>
            <p class="text-sm text-gray-500">📚 Pertemuan ke-{{ $quiz->pertemuan }}</p>
        </div>
        <div class="flex items-center space-x-4">
            <div id="countdown" class="text-lg font-bold text-red-600 bg-red-100 px-3 py-1 rounded-full shadow-inner"></div>
        </div>
    </div>
    <div class="mt-8 w-full bg-gray-200 rounded-full h-2 overflow-hidden">
        <div id="progress-bar" class="bg-indigo-500 h-full transition-all duration-500 ease-in-out" style="width: 0%"></div>
    </div>
</x-slot>

<!-- Layout -->
<div class="flex flex-col md:flex-row gap-6 p-4 sm:p-6 bg-gradient-to-b from-gray-50 to-gray-100 min-h-screen">
    <!-- Sidebar Navigasi -->
    <aside class="md:w-1/4 bg-white rounded-2xl shadow-lg p-6 sticky top-24 self-start">
        <h3 class="text-lg font-bold text-indigo-700 mb-4">🧭 Navigasi Soal</h3>
        <div class="grid grid-cols-5 md:grid-cols-3 gap-3">
            @foreach ($quiz->questions as $index => $q)
                <button type="button"
                    class="question-nav w-10 h-10 rounded-full border border-indigo-400 text-sm font-semibold text-indigo-600 hover:bg-indigo-100 transition-all ring-offset-2 focus:outline-none focus:ring"
                    data-index="{{ $index }}"
                    id="nav-{{ $index }}">
                    {{ $index + 1 }}
                </button>
            @endforeach
        </div>
    </aside>

    <!-- Soal & Form -->
    <main class="md:flex-1 space-y-6">
        <form method="POST" action="{{ route('siswa.quiz.submit', $quiz->id) }}">
            @csrf

            <div id="question-container">
                @foreach ($quiz->questions as $index => $question)
                    <div class="question-item hidden transition duration-300 ease-in-out" data-index="{{ $index }}">
                        <div class="bg-white rounded-2xl shadow-md p-6 ring-1 ring-gray-200">
                            <h3 class="text-lg md:text-xl font-semibold text-gray-800 mb-4">
                                {{ $index + 1 }}. {{ $question->question }}
                            </h3>

                            <div class="space-y-3">
                                @foreach (['A', 'B', 'C', 'D'] as $option)
                                    <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl hover:bg-indigo-50 transition cursor-pointer">
                                        <input type="radio"
                                            name="answers[{{ $question->id }}]"
                                            value="{{ $option }}"
                                            class="text-indigo-600 focus:ring-indigo-500"
                                            required>
                                        <span class="font-medium">{{ $option }}. {{ $question->{'option_' . strtolower($option)} }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Navigation Button -->
            <div class="flex justify-between items-center mt-6">
                <button type="button" id="prev-btn"
                    class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg text-sm font-semibold disabled:opacity-40 transition-all">
                    ⬅️ Sebelumnya
                </button>
                <button type="button" id="next-btn"
                    class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-semibold disabled:opacity-40 transition-all">
                    Selanjutnya ➡️
                </button>
            </div>

            <!-- Submit Button -->
            <div class="mt-10 text-center">
                <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white font-bold px-8 py-3 rounded-full shadow-md hidden"
                    id="submit-btn">
                    ✅ Selesai & Submit
                </button>
            </div>
        </form>
    </main>
</div>


    <!-- Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const questions = document.querySelectorAll('.question-item');
            const navButtons = document.querySelectorAll('.question-nav');
            const nextBtn = document.getElementById('next-btn');
            const prevBtn = document.getElementById('prev-btn');
            const submitBtn = document.getElementById('submit-btn');
            const progressBar = document.getElementById('progress-bar');
            let current = 0;

            function updateProgress(index) {
                let progress = ((index + 1) / questions.length) * 100;
                progressBar.style.width = progress + '%';
            }

            function showQuestion(index) {
                questions.forEach(q => q.classList.add('hidden'));
                questions[index].classList.remove('hidden');

                navButtons.forEach(btn => btn.classList.remove('bg-indigo-600', 'text-white'));
                document.getElementById(`nav-${index}`).classList.add('bg-indigo-600', 'text-white');

                prevBtn.disabled = index === 0;
                nextBtn.disabled = index === questions.length - 1;
                submitBtn.classList.toggle('hidden', index !== questions.length - 1);

                updateProgress(index);
            }

            navButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    current = parseInt(btn.dataset.index);
                    showQuestion(current);
                });
            });

            nextBtn.addEventListener('click', () => {
                if (current < questions.length - 1) {
                    current++;
                    showQuestion(current);
                }
            });

            prevBtn.addEventListener('click', () => {
                if (current > 0) {
                    current--;
                    showQuestion(current);
                }
            });

            // Tandai soal yang sudah dijawab
            document.querySelectorAll('input[type="radio"]').forEach(radio => {
                radio.addEventListener('change', function () {
                    const questionIndex = this.closest('.question-item').dataset.index;
                    document.getElementById(`nav-${questionIndex}`).classList.add('ring', 'ring-green-400');
                });
            });

            // Countdown Timer
            let duration = 60 * 5; // 5 minutes
            const countdownEl = document.getElementById("countdown");

            function updateCountdown() {
                const minutes = Math.floor(duration / 60);
                const seconds = duration % 60;
                countdownEl.textContent = `⏱️ ${minutes}:${seconds.toString().padStart(2, '0')}`;

                if (duration === 0) {
                    alert("Waktu habis! Jawaban akan disubmit.");
                    document.querySelector('form').submit();
                } else {
                    duration--;
                    setTimeout(updateCountdown, 1000);
                }
            }

            updateCountdown();
            showQuestion(current);
        });
    </script>
</x-app-layout>
