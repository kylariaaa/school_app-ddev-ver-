<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman utama (Beranda)
     */
    public function index()
    {
        $totalStudents = Student::count();
        $totalTeachers = Teacher::count();

        return view('home', [
            'total_students' => $totalStudents,
            'total_teachers' => $totalTeachers,
        ]);
    }

    /**
     * Tampilkan halaman Tentang Sekolah
     */
    public function about()
    {
        return view('about');
    }
}
 //dadadd
 //daddadadad
