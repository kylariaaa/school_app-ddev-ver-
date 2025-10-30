<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreStudentRequest;
use App\Http\Requests\Api\UpdateStudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\JsonResponse;

class StudentController extends Controller
{
    /**
     * Tampilkan semua data siswa
     */
    public function index()
    {
        // Disarankan menggunakan pagination untuk API besar
        $students = Student::with('schoolClass')->paginate(10);

        return StudentResource::collection($students);
    }

    /**
     * Simpan data siswa baru
     */
    public function store(StoreStudentRequest $request)
    {
        $student = Student::create($request->validated());

        return new StudentResource($student->load('schoolClass'));
    }

    /**
     * Tampilkan detail siswa
     */
    public function show(Student $student)
    {
        return new StudentResource($student->load('schoolClass'));
    }

    /**
     * Update data siswa
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->validated());

        return new StudentResource($student->load('schoolClass'));
    }

    /**
     * Hapus data siswa
     */
    public function destroy(Student $student): JsonResponse
    {
        $student->delete();

        return response()->json([
            'message' => 'Data siswa berhasil dihapus'
        ], 204);
    }
}
