<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price','status_id'];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function features()
    {
        return $this->hasMany(SubscriptionPlanFeature::class);
    }

    public function stores()
    {
        return $this->hasMany(Store::class);
    }
}
