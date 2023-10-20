<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AboutMe>
 */
class AboutMeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=> User::factory(),
            'aboutMe' => fake()->word(),
            'skills' => fake()->word(),
            'schooling' => fake()->word(),
            'institution' => fake()->word(),
        ];
    }
}
