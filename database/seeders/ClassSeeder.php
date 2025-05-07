<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\ClassModel::insert([
            ['name' => 'Ilmu Pengetahuan Alam[2024-2025]', 'token' => 'TOKEN_IPA2425'],
            ['name' => 'Ilmu Pengetahuan Sosial[2024-2025]', 'token' => 'TOKEN_IPS2425'],
            ['name' => 'Bahasa Indonesia[2024-2025]', 'token' => 'TOKEN_BHS2425'],
        ]);
    }

}
