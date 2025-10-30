<?php
// File: database/seeders/StudentSeeder.php (Revisi)

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Classroom;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $classroomIds = Classroom::pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) {
            Student::create([
                'nis'           => '1210' . str_pad($i + 1, 3, '0', STR_PAD_LEFT),
                'nama'          => $faker->name,
                'tanggal_lahir' => $faker->date(),
                'gender'        => $faker->randomElement(['L', 'P']),
                'alamat'        => $faker->address,
                'email'         => $faker->unique()->safeEmail,
                'classroom_id'  => $faker->randomElement($classroomIds),
            ]);
        }
    }
}
