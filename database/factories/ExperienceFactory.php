<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Experience;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    protected $model = Experience::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'jobTitle' => 'chapeiro',
            'company' => Company::factory(),
            'companyEmail' => fake()->email(),
            'companyContact' => fake()->phoneNumber(),
            'xp' => 'iniciante',
            'assignments' => 'aashajshdka',
        ];
    }
}
