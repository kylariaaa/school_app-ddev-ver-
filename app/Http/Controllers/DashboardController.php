<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\SchoolClass;
use App\Models\Jurusan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudents = Student::count();
        $totalTeachers = Teacher::count();
        $totalClasses  = SchoolClass::count();
        $totalJurusans = Jurusan::count();

        // Data untuk grafik
        $jurusans = Jurusan::all();
        $chartLabels = [];
        $chartData = [];

        foreach ($jurusans as $jurusan) {
            $chartLabels[] = $jurusan->name;
            $chartData[] = Student::whereHas('schoolClass', function ($query) use ($jurusan) {
                $query->where('jurusan_id', $jurusan->id);
            })->count();
        }

        // Data terbaru
        $latestStudents = Student::latest()->take(5)->get();
        $latestTeachers = Teacher::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalStudents',
            'totalTeachers',
            'totalClasses',
            'totalJurusans',
            'chartLabels',
            'chartData',
            'latestStudents',
            'latestTeachers'
        ));
    }
}
