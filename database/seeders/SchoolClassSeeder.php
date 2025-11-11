<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SchoolClass;

class SchoolClassSeeder extends Seeder
{
    public function run(): void
    {
        SchoolClass::create(['name' => 'XII-Rekayasa Perangkat Lunak', 'jurusan_id' => 1]);
        SchoolClass::create(['name' => 'XII-Desain Komunikasi Visual', 'jurusan_id' => 2]);
        SchoolClass::create(['name' => 'XII-Teknik Komputer Jaringan', 'jurusan_id' => 3]);
        SchoolClass::create(['name' => 'XII-Teknik Otomasi Industri', 'jurusan_id' => 4]);
        SchoolClass::create(['name' => 'XII-Manajemen Perkantoran dan Layanan Bisnis', 'jurusan_id' => 5]);
    }
}
