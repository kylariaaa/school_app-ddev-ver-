<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\SchoolClass;

class StudentController extends Controller
{
    // READ: Menampilkan semua data siswa
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    // CREATE: Menampilkan form tambah data
    public function create()
    {
        $classes = SchoolClass::all();

        return view('students.create', compact('classes'));
    }
    // CREATE: Menyimpan data baru dari form
    public function store(Request $request)
    {
        Student::create($request->all());
        return redirect('/students')
            ->with('success', 'Data siswa berhasil ditambahkan!');
    }

    // UPDATE: Menampilkan form edit
    public function edit(Student $student)
    {
        $classes = SchoolClass::all();
        return view('students.edit', compact('student', 'classes'));
    }
    // UPDATE: Memperbarui data yang ada
    public function update(Request $request, Student $student)
    {
        $student->update($request->all());

        return redirect('/students')
            ->with('success', 'Data siswa berhasil diperbarui!');
    }

    // DELETE: Menghapus data
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect('/students')
            ->with('success', 'Data siswa berhasil dihapus!');
    }
}
