<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $title = "Teachers";
        $teachers = Teacher::with('subject')->get();
        $subjects = Subject::all();

        return view('admin.teacher.index', compact(
            'title',
            'teachers',
            'subjects'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'niy' => 'required|numeric|unique:teachers,niy',
            'subject_id' => 'required|exists:subjects,id',
            'start_date' => 'required|date',
        ], [
            'name.required' => 'Nama guru wajib diisi.',
            'niy.required' => 'NIY wajib diisi.',
            'niy.numeric' => 'NIY harus berupa angka.',
            'niy.unique' => 'NIY sudah digunakan.',
            'subject_id.required' => 'Mata pelajaran wajib dipilih.',
            'subject_id.exists' => 'Mata pelajaran tidak ditemukan.',
            'start_date.required' => 'Tanggal mulai mengajar wajib diisi.',
        ]);

        Teacher::create($validated);

        return redirect()
            ->route('admin.teacher.index')
            ->with('success', 'Data guru berhasil ditambahkan.');
    }
}
