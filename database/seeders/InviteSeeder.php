<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class InviteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invites')->insert([
            'user' => Auth::id(1),
            'company' => Company::pluck('id'),
            'confirmacao' => true,
        ]);
    }
}
