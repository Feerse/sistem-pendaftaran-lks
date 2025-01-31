<?php

namespace Database\Seeders;

use App\Models\Sekolah;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        Sekolah::factory()->create([
            'npsn' => '30404271',
            'nama_sekolah' => 'SMKS TI Airlangga',
            'email' => 'smktiairlangga@gmail.com',
            'password' => Hash::make('password')
        ]);
    }
}
