<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            JurusanSeeder::class,
            SchoolClassSeeder::class,
            TeacherSeeder::class,
            StudentSeeder::class,
            UserSeeder::class,
        ]);
    }
}
