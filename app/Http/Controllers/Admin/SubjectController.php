<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $title = "Subject";
        $subjects = Subject::with('teacher')->get();

        return view('admin.subject.index', compact(
            'title',
            'subjects'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:subjects,name',
        ], [
            'name.required' => 'Nama mata pelajaran wajib diisi.',
            'name.unique' => 'Mata pelajaran sudah ada.',
        ]);

        Subject::create($validated);

        return redirect()
            ->route('admin.subject.index')
            ->with('success', 'Data mata pelajaran berhasil ditambahkan.');
    }
}
