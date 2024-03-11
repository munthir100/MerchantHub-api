<?php

namespace Database\Factories;

use App\Models\Status;
use App\Models\SubscriptionPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubscriptionPlanFeature>
 */
class SubscriptionPlanFeatureFactory extends Factory
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
            'subscription_plan_id' => SubscriptionPlan::factory(),
            'status_id' => Status::ACTIVE,
        ];
    }
}
