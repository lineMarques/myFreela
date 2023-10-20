<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create();
        \App\Models\Company::factory()->create();
        \App\Models\Address::factory()->create();
        \App\Models\Freela::factory()->create();
        \App\Models\Invite::factory()->create();
        \App\Models\PersonalData::factory()->create();
        \App\Models\AboutMe::factory()->create();
        \App\Models\Experience::factory()->create();


    }
}
