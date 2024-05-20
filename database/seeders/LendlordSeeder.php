<?php

namespace Database\Seeders;

use App\Models\Lendlord;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LendlordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lendlord::factory()->has(User::factory())->count(6)->create();
    }
}
