<?php
// File: app/Models/Teacher.php (Revisi)

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama',
        'email',
        'bidang_studi'
    ];

    /**
     * Relasi Many-to-Many:
     * Seorang guru bisa mengajar banyak siswa
     */
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'student_teacher');
    }
}
