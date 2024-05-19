<?php

namespace Database\Seeders;

use App\Models\PropertyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PropertyType::factory()
            ->count(5)
            ->sequence(
                ['type' => 'Apartment'],
                ['type' => 'Single-Family Home'],
                ['type' => 'Multi-Family Home'],
                ['type' => 'Condo'],
                ['type' => 'Townhouse'],
            )->create();
    }
}
