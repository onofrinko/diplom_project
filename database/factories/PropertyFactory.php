<?php

namespace Database\Factories;

use App\Models\Lendlord;
use App\Models\PropertyType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $propertyTypes = PropertyType::all();
        $lendlords = Lendlord::all();
        return [
            'lendlord_id' => $lendlords->random()->lendlord_id,
            'cost' => $this->faker->numberBetween(100000, 1000000),
            'total_area' => $this->faker->numberBetween(500, 5000),
            'pub_date' => $this->faker->date(),
            'property_status' => $this->faker->randomElement(['available', 'sold', 'pending']),
            'property_type_id' => $propertyTypes->random()->property_type_id,
            'property_details' => [
                'address' => [
                    'city' => $this->faker->city(),
                    'building' => $this->faker->buildingNumber(),
                    'street' => $this->faker->streetAddress(),
                    'zip' => $this->faker->postcode(),
                ],
                'bedrooms' => $this->faker->numberBetween(1, 5),
                'bathrooms' => $this->faker->numberBetween(1, 5),
                'floors' => $this->faker->numberBetween(1, 3),
                'garage' => $this->faker->boolean(),
                'pool' => $this->faker->boolean(),
                'description' => $this->faker->sentence(),
            ]
        ];
    }
}
