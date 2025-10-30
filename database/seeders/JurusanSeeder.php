<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jurusan;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jurusan::create(['name' => 'Rekayasa perangkat Lunak']);
        Jurusan::create(['name' => 'Desain Komunikasi Visual']);
        Jurusan::create(['name' => 'Teknik komputer dan jaringan']);
        Jurusan::create(['name' => 'Teknik Otomasi industri']);
        Jurusan::create(['name' => 'Layanan Perbankan']);
    }
}
