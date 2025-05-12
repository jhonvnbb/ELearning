<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClassJoinController;
use App\Http\Controllers\ClassContentController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\QuizController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role === 'guru') {
        return redirect()->route('guru.dashboard');
    } elseif ($user->role === 'siswa') {
        return redirect()->route('siswa.dashboard');
    } else {
        abort(403, 'Akses ditolak.');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:siswa,guru'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth', 'role:siswa')->group(function () {
    Route::get('/siswa/dashboard', function () {
        return view('siswa.dashboard');
    })->name('siswa.dashboard');


    Route::get('/join-class', [ClassJoinController::class, 'showForm'])->name('join.class.form');
    Route::post('/join-class', [ClassJoinController::class, 'join'])->name('join.class');

    Route::get('/kelas/{id}', [ClassContentController::class, 'show'])->name('siswa.class-content');

    Route::get('/siswa/quiz-show/{id}', [QuizController::class, 'show'])->name('siswa.quiz.show');
    Route::post('/siswa/quiz-submit/{id}', [QuizController::class, 'submit'])->name('siswa.quiz.submit');

});

Route::middleware(['auth', 'role:guru'])->group(function () {
    Route::get('/guru/dashboard', [GuruController::class, 'dashboard'])->name('guru.dashboard');

    Route::get('/kelas/{id}/materi', [GuruController::class, 'classContent'])->name('guru.class-content');
    
    // Materi
    Route::resource('materi', MaterialController::class)->only(['store']);
    Route::get('/materi/{id}/edit', [MaterialController::class, 'edit'])->name('materi.edit');
    Route::put('/materi/{id}', [MaterialController::class, 'update'])->name('materi.update');
    Route::delete('/materi/{id}', [MaterialController::class, 'destroy'])->name('materi.destroy');
    
    // Kuis
    Route::post('/quizzes', [QuizController::class, 'store'])->name('quizzes.store');
    Route::resource('quizzes', QuizController::class);
    Route::get('/quizzes/{id}/edit', [QuizController::class, 'edit'])->name('quizzes.edit');
    Route::put('/quizzes/{id}', [QuizController::class, 'update'])->name('quizzes.update');
    Route::delete('/quizzes/{id}', [QuizController::class, 'destroy'])->name('quizzes.destroy');

});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});


require __DIR__.'/auth.php';
