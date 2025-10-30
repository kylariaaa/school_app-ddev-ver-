<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    /**
     * Menampilkan daftar semua kelas beserta siswa (Eager Loading).
     */
    public function index()
    {
        $classrooms = Classroom::with('students')->get();

        return view('classrooms.index', compact('classrooms'));
    }
}
