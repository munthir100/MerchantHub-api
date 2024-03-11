<?php

namespace Database\Factories;

use App\Models\Bank;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class BankFactory extends Factory
{
    protected $model = Bank::class;

    public function definition()
    {
        $countryId = Country::inRandomOrder()->first()->id;

        return [
            'name' => $this->faker->company,
            'country_id' => $countryId,
        ];
    }
}
