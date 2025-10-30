<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Teacher;

class StudentTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua ID siswa dan guru
        $studentIds = Student::pluck('id')->all();
        $teacherIds = Teacher::pluck('id')->all();

        // Pastikan ada data siswa & guru sebelum membuat relasi
        if (empty($studentIds) || empty($teacherIds)) {
            $this->command->warn('⚠️ Jalankan StudentSeeder & TeacherSeeder terlebih dahulu.');
            return;
        }

        // Hubungkan setiap siswa dengan 1–3 guru secara acak
        foreach ($studentIds as $studentId) {
            $randomTeachers = array_rand($teacherIds, rand(1, min(3, count($teacherIds))));

            // Ubah menjadi array jika hanya 1 guru
            if (!is_array($randomTeachers)) {
                $randomTeachers = [$randomTeachers];
            }

            foreach ($randomTeachers as $teacherKey) {
                DB::table('student_teacher')->insert([
                    'student_id' => $studentId,
                    'teacher_id' => $teacherIds[$teacherKey],
                ]);
            }
        }
    }
}
