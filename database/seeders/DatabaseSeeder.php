<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            StudentSeeder::class,
            TeacherSeeder::class,
            StudentTeacherSeeder::class,
            JurusanSeeder::class,
            SchoolClassSeeder::class,
            TeacherSeeder::class, // Seeder untuk pivot
        ]);
    }
}
