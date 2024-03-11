<?php

namespace Database\Factories;

use App\Models\Currency;
use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->country,
            'phone_code' => $this->faker->numerify('+###'), // Change ### as needed
            'phone_digits_number' => 9,
            'currency_id' => Currency::factory(),
            'language_id' => Language::factory(),
        ];
    }
}
