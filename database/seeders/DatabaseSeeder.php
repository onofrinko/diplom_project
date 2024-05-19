<?php

namespace Database\Seeders;

use App\Models\Lendlord;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LendlordSeeder::class,
//            PropertyTypeSeeder::class,
//            PropertyDetailSeeder::class,
//            PropertySeeder::class,
        ]);

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
    }
}
