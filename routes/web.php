<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClassJoinController;
use App\Http\Controllers\ClassContentController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AdminController;

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

Route::middleware('auth', 'role:siswa')->group(function () {
    Route::get('/siswa/dashboard', function () {
        return view('siswa.dashboard');
    })->name('siswa.dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/join-class', [ClassJoinController::class, 'showForm'])->name('join.class.form');
    Route::post('/join-class', [ClassJoinController::class, 'join'])->name('join.class');

    Route::get('/kelas/{id}', [ClassContentController::class, 'show'])->name('siswa.class-content');
});

Route::middleware(['auth', 'role:guru'])->group(function () {
    Route::get('/guru/dashboard', [GuruController::class, 'dashboard'])->name('guru.dashboard');

    Route::get('/kelas/{id}/materi', [GuruController::class, 'classContent'])->name('guru.class-content');

    // Route::get('/kelas/{class_id}/materi/create', [MaterialController::class, 'create'])->name('guru.materials.create');
    // Route::get('/kelas/{class_id}/materi/{id}/edit', [MaterialController::class, 'edit'])->name('guru.materials.edit');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});


require __DIR__.'/auth.php';
