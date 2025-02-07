<?php

namespace Database\Seeders;

use App\Models\BidangMataLomba;
use App\Models\Guru;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password')
        ]);

        Sekolah::factory()->create(
            [
                'npsn' => '30404271',
                'nama_sekolah' => 'SMKS TI Airlangga',
                'email' => 'smktiairlangga@gmail.com',
                'password' => Hash::make('password')
            ],
        );
        Sekolah::factory()->create(
            [
                'npsn' => '30403017',
                'nama_sekolah' => 'SMK NEGERI 7 SAMARINDA',
                'email' => 'smk7smd@gmail.com',
                'password' => Hash::make('password')
            ],
        );
        Sekolah::factory()->create(
            [
                'npsn' => '30401089',
                'nama_sekolah' => 'SMK Negeri 1 Samarinda',
                'email' => 'smk1smd@gmail.com',
                'password' => Hash::make('password')
            ],
        );
        Sekolah::factory()->create(
            [
                'npsn' => '30401517',
                'nama_sekolah' => 'SMKS AIRLANGGA BALIKPAPAN',
                'email' => 'smksairlangga@gmail.com',
                'password' => Hash::make('password')
            ],
        );
        Sekolah::factory()->create(
            [
                'npsn' => '30401520',
                'nama_sekolah' => 'SMKN 2 BALIKPAPAN',
                'email' => 'smk2bpp@gmail.com',
                'password' => Hash::make('password')
            ],
        );
        Sekolah::factory()->create(
            [
                'npsn' => '30409918',
                'nama_sekolah' => 'SMKN 6 Balikpapan',
                'email' => 'smk6bpp@gmail.com',
                'password' => Hash::make('password')
            ]
        );

        $all_id_sekolah = Sekolah::all()->pluck('id');

        foreach ($all_id_sekolah as $id_sekolah) {
            for ($i = 0; $i < 2; $i++) {
                Guru::factory()->create(
                    [
                        'id_sekolah' => $id_sekolah,
                    ]
                );
            }
            for ($i = 0; $i < 5; $i++) {
                Siswa::factory()->create(
                    [
                        'id_sekolah' => $id_sekolah,
                    ]
                );
            }
        }

        $allBidangMataLomba = ['Teknologi Informasi', 'Piranti Lunak untuk Bisnis', 'Teknologi Informasi Sistem Administrasi Jaringan', 'Komputasi Awan', 'Teknologi Keamanan Siber', 'Teknik Desain Laman', 'Kabel Jaringan Komputer Informasi'];

        foreach ($allBidangMataLomba as $bidangMataLomba) {
            BidangMataLomba::factory()->create(
                [
                    'nama_bidang_mata_lomba' => $bidangMataLomba
                ]
            );
        }
    }
}
