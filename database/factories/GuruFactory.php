<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guru>
 */
class GuruFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_guru' => fake()->name(),
            'id_sekolah' => fake()->numberBetween(1, 6),
            'email' => fake()->safeEmail(),
            'nomor_hp' => fake()->phoneNumber()
        ];
    }
}
