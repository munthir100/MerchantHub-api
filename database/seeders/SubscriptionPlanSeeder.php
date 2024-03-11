<?php

namespace Database\Seeders;

use App\Models\SubscriptionPlan;
use App\Models\SubscriptionPlanFeature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubscriptionPlan::factory(10)->create()->each(function ($SubscriptionPlan) {
            SubscriptionPlanFeature::factory(rand(20, 50))->create(['subscription_plan_id' => $SubscriptionPlan->id]);
        });
    }
}
