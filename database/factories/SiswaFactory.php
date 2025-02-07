<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nisn' => fake()->randomNumber(9, true),
            'nama_siswa' => fake()->name(),
            'id_sekolah' => fake()->numberBetween(1, 6),
            'program_keahlian' => fake()->word(),
            'email' => fake()->safeEmail(),
            'nomor_hp' => fake()->phoneNumber()
        ];
    }
}
