<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\User;

class ClassJoinController extends Controller
{
    public function showForm()
{
    $classes = ClassModel::all();
    return view('siswa.join-class', compact('classes'));
}

public function join(Request $request)
{
    $request->validate([
        'class_id' => 'required|exists:classes,id',
        'token' => 'required'
    ]);

    $class = ClassModel::find($request->class_id);

    if ($class->token !== $request->token) {
        return back()->withErrors(['token' => 'Token salah.']);
    }

    $user = Auth::user(); // pastikan pakai use Auth;

    if (!$user->classes->contains($class->id)) {
        $user->classes()->attach($class->id);
    }

    return redirect()->route('dashboard')->with('success', 'Berhasil bergabung dengan kelas!');
}


}
