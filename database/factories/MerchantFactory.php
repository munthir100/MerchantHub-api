<?php

namespace Database\Factories;

use App\Models\Store;
use App\Models\Status;
use App\Models\Country;
use App\Models\Merchant;
use Illuminate\Database\Eloquent\Factories\Factory;

class MerchantFactory extends Factory
{
    protected $model = Merchant::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'password' => 12345678,
            'country_id' => Country::factory(),
            'store_id' => null,
            'status_id' => Status::ACTIVE,
        ];
    }
}