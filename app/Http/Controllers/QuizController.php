<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_id' => 'required|exists:classes,id',
            'pertemuan' => 'required|integer|min:1',
            'title' => 'required|string|max:255',
            'questions' => 'required|array|min:1',
            'questions.*.question' => 'required|string',
            'questions.*.option_a' => 'required|string',
            'questions.*.option_b' => 'required|string',
            'questions.*.option_c' => 'required|string',
            'questions.*.option_d' => 'required|string',
            'questions.*.correct_answer' => 'required|string|in:A,B,C,D',
        ]);

        $quiz = Quiz::where('class_id', $validated['class_id'])
                    ->where('pertemuan', $validated['pertemuan'])
                    ->first();

        if (!$quiz) {
            $quiz = Quiz::create([
                'class_id' => $validated['class_id'],
                'pertemuan' => $validated['pertemuan'],
                'title' => $validated['title'],
            ]);
        }

        foreach ($validated['questions'] as $q) {
            $quiz->questions()->create([
                'question' => $q['question'],
                'option_a' => $q['option_a'],
                'option_b' => $q['option_b'],
                'option_c' => $q['option_c'],
                'option_d' => $q['option_d'],
                'correct_answer' => strtoupper($q['correct_answer']),
            ]);
        }

        return redirect()->back()->with('success', 'Kuis berhasil disimpan!');
    }


    public function edit($id)
    {
        $quiz = Quiz::with('questions')->findOrFail($id);
        return view('guru.edit-quiz', compact('quiz'));
    }

    public function update(Request $request, $id)
    {
        $quiz = Quiz::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'questions' => 'required|array|min:1',
            'questions.*.id' => 'required|exists:quiz_questions,id',
            'questions.*.question' => 'required|string',
            'questions.*.option_a' => 'required|string',
            'questions.*.option_b' => 'required|string',
            'questions.*.option_c' => 'required|string',
            'questions.*.option_d' => 'required|string',
            'questions.*.correct_answer' => 'required|in:a,b,c,d',
        ]);

        $quiz->update([
            'title' => $request->title,
        ]);

        foreach ($request->questions as $q) {
            $question = QuizQuestion::findOrFail($q['id']);

            $question->update([
                'question' => $q['question'],
                'option_a' => $q['option_a'],
                'option_b' => $q['option_b'],
                'option_c' => $q['option_c'],
                'option_d' => $q['option_d'],
                'correct_answer' => $q['correct_answer'],
            ]);
        }

        return redirect()->route('guru.class-content', ['id' => $quiz->class_id])
                    ->with('success', 'Kuis berhasil diperbarui');

    }


    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->questions()->delete();
        $quiz->delete();
        return back()->with('success', 'Kuis berhasil dihapus');
    }

    public function show($id)
    {
        $quiz = Quiz::with('questions')->findOrFail($id);
        return view('siswa.quiz-show', compact('quiz'));
    }

    public function submit(Request $request, $id)
    {
        $quiz = Quiz::with('questions')->findOrFail($id);
        $answers = $request->input('answers', []);

        $score = 0;
        foreach ($quiz->questions as $question) {
            $correct = $question->correct_answer;
            $studentAnswer = $answers[$question->id] ?? null;

            if ($studentAnswer === $correct) {
                $score++;
            }
        }

        // Simpan nilai (opsional)
        Auth::user()->quizResults()->create([
            'quiz_id' => $quiz->id,
            'score' => $score,
            'total' => $quiz->questions->count(),
        ]);

        return redirect()->route('siswa.quiz.show', $quiz->id)->with('success', "Kuis berhasil dikumpulkan! Nilai Anda: $score / " . $quiz->questions->count());
    }

}
