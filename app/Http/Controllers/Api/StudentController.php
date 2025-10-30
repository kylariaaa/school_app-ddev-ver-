<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('schoolClass')->get();
        return response()->json($students);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|unique:students',
            'nama' => 'required|string|max:255',
            'school_class_id' => 'required|exists:school_classes,id',
            'tanggal_lahir' => 'required|date',
            'gender' => 'required|in:L,P',
            'alamat' => 'required|string',
            'email' => 'required|email|unique:students'
        ]);

        $student = Student::create($validated);

        return response()->json([
            'message' => 'Student created successfully',
            'data' => $student
        ], 201);
    }

    public function show(Student $student)
    {
        $student->load('schoolClass');
        return response()->json($student);
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'school_class_id' => 'required|exists:school_classes,id',
            'tanggal_lahir' => 'required|date',
            'gender' => 'required|in:L,P',
            'alamat' => 'required|string',
            'email' => [
                'required',
                'email',
                Rule::unique('students')->ignore($student->id),
            ],
        ]);

        $student->update($validated);

        return response()->json([
            'message' => 'Student updated successfully',
            'data' => $student
        ]);
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json([
            'message' => 'Student deleted successfully'
        ], 204);
    }
}
