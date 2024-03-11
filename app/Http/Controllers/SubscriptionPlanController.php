<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPlan;
use App\Http\Resources\SubscriptionPlanResource;

class SubscriptionPlanController extends Controller
{
    public function index()
    {
        $subscriptionPlans = SubscriptionPlan::all();
        return $this->responseSuccess(data: SubscriptionPlanResource::collection($subscriptionPlans));
    }

    public function show(subscriptionPlan $subscriptionPlan)
    {
        $subscriptionPlan->load('features');
        return $this->responseSuccess(data: new SubscriptionPlanResource($subscriptionPlan));
    }
}
