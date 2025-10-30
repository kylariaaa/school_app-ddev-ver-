<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Tentukan apakah user diizinkan melakukan request ini.
     */
    public function authorize(): bool
    {
        return true; // izinkan semua request (bisa diganti sesuai kebutuhan auth)
    }

    /**
     * Aturan validasi untuk membuat data siswa baru.
     *
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'nis'             => 'required|unique:students,nis',
            'nama'            => 'required|string|max:255',
            'email'           => 'required|email|unique:students,email',
            'school_class_id' => 'required|exists:school_classes,id',
            'gender'          => 'required|in:L,P', // contoh: L = Laki-laki, P = Perempuan
            'alamat'          => 'required|string',
            'tanggal_lahir'   => 'required|date',
        ];
    }
}
