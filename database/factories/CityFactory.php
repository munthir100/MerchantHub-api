<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->city,
            'country_id' => Country::factory(),
        ];
    }
}
