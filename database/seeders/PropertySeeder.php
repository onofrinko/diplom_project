<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Property::factory()
            ->sequence(
                [
                    'property_type_id' => 3,
                    'image' => urldecode('multi-family/multi-family%20home%20(1).jpeg')
                ],
                [
                    'property_type_id' => 3,
                    'image' => urldecode('multi-family/multi-family%20home%20(1).jpg')
                ],
                [
                    'property_type_id' => 3,
                    'image' => urldecode('multi-family/multi-family%20home%20(1).webp')
                ],
                [
                    'property_type_id' => 3,
                    'image' => urldecode('multi-family/multi-family%20home%20(2).jpeg')
                ],
                [
                    'property_type_id' => 3,
                    'image' => urldecode('multi-family/multi-family%20home%20(2).jpg')
                ],
                [
                    'property_type_id' => 3,
                    'image' => urldecode('multi-family/multi-family%20home%20(2).webp')
                ],
                [
                    'property_type_id' => 3,
                    'image' => urldecode('multi-family/multi-family%20home%20(3).jpg')
                ],
                [
                    'property_type_id' => 3,
                    'image' => urldecode('multi-family/multi-family%20home%20(4).jpg')
                ],
                [
                    'property_type_id' => 3,
                    'image' => urldecode('multi-family/multi-family%20home%20(5).jpg')
                ],
                [
                    'property_type_id' => 3,
                    'image' => urldecode('multi-family/multi-family%20home%20(6).jpg')
                ],
                [
                    'property_type_id' => 3,
                    'image' => urldecode('multi-family/multi-family%20home%20(7).jpg')
                ],
                [
                    'property_type_id' => 3,
                    'image' => urldecode('multi-family/multi-family%20home%20(8).jpg')
                ],
                [
                    'property_type_id' => 3,
                    'image' => urldecode('multi-family/multi-family%20home%20(9).jpg')
                ])
            ->count(12)
            ->create();

        Property::factory()
            ->count(15)
            ->create();
    }
}
