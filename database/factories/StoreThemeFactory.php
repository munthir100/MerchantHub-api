<?php

namespace Database\Factories;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreThemeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'status_id' => Status::where('name', 'NOT_ACTIVE')->first()->id,
            'is_default' => false,
        ];
    }

    /**
     * Indicate that one theme should be the default.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function isDefault(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'is_default' => true,
            ];
        });
    }
}
