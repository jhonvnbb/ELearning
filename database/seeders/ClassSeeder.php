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
            // ['name' => 'Ilmu Pengetahuan Alam[2024-2025]', 'token' => 'TOKEN_IPA2425'],
            // ['name' => 'Ilmu Pengetahuan Sosial[2024-2025]', 'token' => 'TOKEN_IPS2425'],
            // ['name' => 'Bahasa Indonesia[2024-2025]', 'token' => 'TOKEN_BHS2425'],
            ['name' => 'Bahasa Inggris[2023-2024]', 'token' => 'TOKEN_BI2324'],
            ['name' => 'Bahasa Inggris[2024-2025]', 'token' => 'TOKEN_BI2425'],
            ['name' => 'Bahasa Inggris[2025-2026]', 'token' => 'TOKEN_BI2526'],

            ['name' => 'Ilmu Pengetahuan Alam[2023-2024]', 'token' => 'TOKEN_IPA2324'],
            ['name' => 'Ilmu Pengetahuan Sosial[2023-2024]', 'token' => 'TOKEN_IPS2324'],
            ['name' => 'Bahasa Indonesia[2023-2024]', 'token' => 'TOKEN_BHS2324'],
            ['name' => 'Ilmu Pengetahuan Alam[2025-2026]', 'token' => 'TOKEN_IPA2526'],
            ['name' => 'Ilmu Pengetahuan Sosial[2025-2026]', 'token' => 'TOKEN_IPS2526'],
            ['name' => 'Bahasa Indonesia[2025-2026]', 'token' => 'TOKEN_BHS2526'],
        ]);
    }

}
