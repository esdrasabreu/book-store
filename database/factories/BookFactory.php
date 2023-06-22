<?php

namespace Database\Factories;
use Faker\Factory as Faker;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create();
        return [
            'Name' => $faker->sentence(3),
            'ISBN' => $faker->numerify('#############'),
            'Value' => $faker->randomFloat(2, 0, 100),
        ];
    }
}
