<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ClassModel;
use App\Models\User;

class ClassGuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guruKelasMap = [
            'coc51536@gmail.com'        => ['TOKEN_IPA2324', 'TOKEN_IPA2425'],
            'ratna.dewi@gmail.com'       => ['TOKEN_IPS2324', 'TOKEN_IPS2425'],
            'budi.santoso@gmail.com'     => ['TOKEN_BHS2324', 'TOKEN_BHS2425'],
            'siti.aminah@gmail.com'      => ['TOKEN_BI2324', 'TOKEN_BI2425'],
            'dewi.lestari@gmail.com'     => ['TOKEN_BI2526', 'TOKEN_BHS2526'],
            'rizky.pratama@gmail.com'    => ['TOKEN_IPA2526', 'TOKEN_IPS2526'],
        ];

        foreach ($guruKelasMap as $email => $tokenList) {
            $guru = User::where('email', $email)->first();

            if ($guru) {
                foreach ($tokenList as $token) {
                    $kelas = ClassModel::where('token', $token)->first();
                    if ($kelas) {
                        $guru->kelasDiajar()->syncWithoutDetaching($kelas->id);
                    }
                }
            }
        }
    }
}
