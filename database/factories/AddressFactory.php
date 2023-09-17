<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'addressable_type'=>'Company',
            'addressable_id' => Company::factory(),
            'cep' => '88317-200',
            'road' => 'Rua tal de tal',
            'number' => '1442',
            'neighborhood' =>'Judas Perdeu as Botas',
            'city' => fake()->city(),
            'state'=> fake()->state(),
        ];
    }
}
