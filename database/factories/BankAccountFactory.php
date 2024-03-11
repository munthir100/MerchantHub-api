<?php

namespace Database\Factories;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BankAccount>
 */
class BankAccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bank_id' => null,
            'merchant_id' => null,
            'holder_name' => null,
            'details' => $this->faker->text,
            'iban' => $this->faker->iban('NL'), // Adjust the country code as needed
        ];
    }
}
