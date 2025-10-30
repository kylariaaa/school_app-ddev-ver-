<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    // READ: Menampilkan semua data guru
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    // CREATE: Menampilkan form tambah data
    public function create()
    {
        return view('teachers.create');
    }

    // CREATE: Menyimpan data baru
    public function store(Request $request)
    {
        Teacher::create($request->all());

        return redirect('/teachers')
            ->with('success', 'Data guru berhasil ditambahkan!');
    }

    // UPDATE: Menampilkan form edit
    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    // UPDATE: Memperbarui data yang ada
    public function update(Request $request, Teacher $teacher)
    {
        $teacher->update($request->all());

        return redirect('/teachers')
            ->with('success', 'Data guru berhasil diperbarui!');
    }

    // DELETE: Menghapus data
    public function destroy(Teacher $teacher)
    {
        $teacher->delete(); 

        return redirect('/teachers')
            ->with('success', 'Data guru berhasil dihapus!');
    }
}
