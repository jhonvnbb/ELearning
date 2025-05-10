<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\ClassModel;

use Illuminate\Http\Request;

class GuruController extends Controller
{

public function dashboard()
{
    $guru = Auth::user();
    $kelas = $guru->kelasDiajar;
    $jumlahKelas = $kelas->count();

    // Hitung jumlah total siswa dari seluruh kelas yang diajar guru
    $jumlahSiswa = $kelas->flatMap->siswa->pluck('id')->unique()->count();


    return view('guru.dashboard', compact('kelas','jumlahKelas', 'jumlahSiswa'));
}

public function classContent($id)
{
    $class = CLassModel::with(['materials', 'guru'])->findOrFail($id);

    $guruList = $class->guru; // Pastikan relasi 'guru' sudah ada di model Kelas

    return view('guru.class-content', compact('class', 'guruList'));
}
}
