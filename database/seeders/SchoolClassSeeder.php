<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SchoolClass;

class SchoolClassSeeder extends Seeder
{
    public function run(): void
    {
        SchoolClass::create(['name' => 'XII-RPL', 'jurusan_id' => 1]);
        SchoolClass::create(['name' => 'XII-DKV', 'jurusan_id' => 2]);
        SchoolClass::create(['name' => 'XII-TKJ', 'jurusan_id' => 3]);
        SchoolClass::create(['name' => 'XII-TOI', 'jurusan_id' => 4]);
        SchoolClass::create(['name' => 'XII-LPB', 'jurusan_id' => 5]);
    }
}
