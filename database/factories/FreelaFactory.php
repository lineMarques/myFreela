<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Freela>
 */
class FreelaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'company_id' => Company::factory(),
            'dataFreela'=> fake()->date(),
            'horaInicio'=> fake()->time(),
            'horaFinal' => fake()->time(),
            'cargo'=>'chapeiro',
            'observacao' => 'levar Unifome',
            'valorFreela' =>'2,00',
            'status' => true,
        ];
    }
}
