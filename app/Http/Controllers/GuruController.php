<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function dashboard()
    {
        $guru = Auth::user();
        $kelas = $guru->kelasDiajar()
            ->withCount(['materials', 'quizzes'])
            ->with('siswa') 
            ->get();
        $jumlahKelas = $kelas->count();

        $jumlahSiswa = $kelas->flatMap->siswa->pluck('id')->unique()->count();

        return view('guru.dashboard', compact('kelas','jumlahKelas', 'jumlahSiswa'));
    }

    public function classContent($id)
    {
        $class = ClassModel::with(['guru'])->findOrFail($id);

        $guruList = $class->guru;

        $materis = \App\Models\Materi::where('class_id', $id)->get();
        $quizzes = \App\Models\Quiz::with('questions')->where('class_id', $id)->get();

        return view('guru.class-content', compact('class', 'guruList', 'materis', 'quizzes'));
    }

}
