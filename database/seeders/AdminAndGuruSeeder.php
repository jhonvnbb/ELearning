<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminAndGuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Rita Irma Yani',
            'email' => 'coc51536@gmail.com',
            'password' => Hash::make('gurusmansa'),
            'role' => 'guru',
        ]);
        
        User::create([
            'name' => 'Ratna Dewi',
            'email' => 'ratna.dewi@gmail.com',
            'password' => Hash::make('gurusmansa'),
            'role' => 'guru',
        ]);
        
        User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi.santoso@gmail.com',
            'password' => Hash::make('gurusmansa'),
            'role' => 'guru',
        ]);
        
        User::create([
            'name' => 'Siti Aminah',
            'email' => 'siti.aminah@gmail.com',
            'password' => Hash::make('gurusmansa'),
            'role' => 'guru',
        ]);
        
        User::create([
            'name' => 'Dewi Lestari',
            'email' => 'dewi.lestari@gmail.com',
            'password' => Hash::make('gurusmansa'),
            'role' => 'guru',
        ]);
        
        User::create([
            'name' => 'Rizky Pratama',
            'email' => 'rizky.pratama@gmail.com',
            'password' => Hash::make('gurusmansa'),
            'role' => 'guru',
        ]);
        
    }
}
