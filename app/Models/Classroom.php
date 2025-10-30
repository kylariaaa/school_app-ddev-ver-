<?php
// File: app/Models/Classroom.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'class_code'];

    /**
     * Relasi One-to-Many: Satu kelas memiliki banyak siswa
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
