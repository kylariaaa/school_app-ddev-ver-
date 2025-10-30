<?php
// File: database/seeders/ClassroomSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classrooms')->insert([
            ['name' => 'XII RPL 1', 'class_code' => 'RPL1'],
            ['name' => 'XII RPL 2', 'class_code' => 'RPL2'],
            ['name' => 'XII RPL 3', 'class_code' => 'RPL3'],
        ]);
    }
}
