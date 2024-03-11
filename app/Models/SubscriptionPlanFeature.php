<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlanFeature extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'subscription_plan_id', 'status_id'];

    public function subscriptionPlan()
    {
        return $this->belongsTo(SubscriptionPlan::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
