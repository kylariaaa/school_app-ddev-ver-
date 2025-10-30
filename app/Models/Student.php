<?php
// File: app/Models/Student.php (Revisi)
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'nama',
        'tanggal_lahir',
        'gender',
        'alamat',
        'email',
        'school_class_id',
];

    /**
     * Relasi One-to-Many (inverse): Seorang siswa dimiliki oleh satu kelas
     */
    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }

    /**
     * Relasi Many-to-Many: Siswa bisa punya banyak guru
     */
    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class, 'student_teacher');
    }

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class);
    }
}
