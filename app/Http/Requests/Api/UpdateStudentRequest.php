<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Ambil ID student dari route parameter
        $studentId = $this->route('student')->id ?? null;

        return [
            'nis' => [
                'sometimes',
                'required',
                Rule::unique('students', 'nis')->ignore($studentId),
            ],
            'nama' => 'sometimes|required|string|max:255',
            'email' => [
                'sometimes',
                'required',
                'email',
                Rule::unique('students', 'email')->ignore($studentId),
            ],
            'school_class_id' => 'sometimes|required|exists:school_classes,id',
            'gender' => 'sometimes|required',
            'alamat' => 'sometimes|required',
            'tanggal_lahir' => 'sometimes|required|date',
        ];
    }
}
