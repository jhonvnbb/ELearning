<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use Illuminate\Support\Facades\Auth;

class ClassContentController extends Controller
{
    public function show($id)
    {
        $class = ClassModel::with('materials')->findOrFail($id);

        // Pastikan user sudah tergabung dengan kelas tersebut
        if (!Auth::user()->classes->contains($id)) {
            abort(403, 'Anda belum tergabung dengan kelas ini.');
        }

        return view('siswa.class-content', compact('class'));
    }
}
