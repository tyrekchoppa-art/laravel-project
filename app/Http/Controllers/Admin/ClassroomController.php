<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        $title = "Classroom Data";
        $classrooms = Classroom::all();

        return view('admin.classroom.index', compact(
            'title',
            'classrooms'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:classrooms,name',
            'major' => 'required|string|max:255',
        ], [
            'name.required' => 'Nama kelas wajib diisi.',
            'name.unique' => 'Nama kelas sudah ada.',
            'major.required' => 'Jurusan wajib diisi.',
        ]);

        Classroom::create($validated);

        return redirect()
            ->route('admin.classroom.index')
            ->with('success', 'Data kelas berhasil ditambahkan.');
    }
}
