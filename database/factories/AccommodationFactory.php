<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Accommodation>
 */
class AccommodationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = faker::create();

        return [
            'name' => "Hotel $faker->name",
            'room_bed' => $faker->randomElement(['1/1', '1/2', '1/3', '1/2+1', '1/3+1', '1/4']),
            'rating' => $faker->numberBetween(1,5),
            'internet' => $faker->randomElement(['1', '0']),
            'tv' => $faker->randomElement(['1', '0']),
            'ac' => $faker->randomElement(['1', '0']),
            'fridge' => $faker->randomElement(['1', '0'])
            //treba i slike da se dodaju znaci izabere 6 od 30 i spakuje tamo gde vec spakuje
        ];
    }
}
