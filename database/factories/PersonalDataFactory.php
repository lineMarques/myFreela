<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PersonalData>
 */
class PersonalDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'name' =>fake()->name(),
            'cpf' => null,
            'age' => '30',
            'sexo' =>'feminino',
            'photo' => null,
            'pcd' => 'nao',
        ];
    }
}
