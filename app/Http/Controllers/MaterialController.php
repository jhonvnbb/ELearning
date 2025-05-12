<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'pertemuan' => 'required|integer|min:1|max:16',
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'file' => 'nullable|mimes:pdf|max:2048'
        ]);

        $path = $request->file('file')?->store('materi', 'public');

        Materi::create([
            'class_id' => $request->class_id,
            'pertemuan' => $request->pertemuan,
            'title' => $request->title,
            'content' => $request->content,
            'file_path' => $path
        ]);

        return back()->with('success', 'Materi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $materi = Materi::findOrFail($id);
        return view('guru.edit-materi', compact('materi'));
    }

    public function update(Request $request, $id)
    {
        $materi = Materi::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'file' => 'nullable|mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('materi', 'public');
            $materi->file_path = $path;
        }

        $materi->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('guru.class-content', ['id' => $materi->class_id])
                        ->with('success', 'Materi berhasil diperbarui');
    }


    public function destroy($id)
    {
        $materi = Materi::findOrFail($id);
        $materi->delete();
        return back()->with('success', 'Materi berhasil dihapus');
    }

}
