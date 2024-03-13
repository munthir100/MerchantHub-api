<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    const NEW = 1;
    const ACTIVE = 2;
    const NOT_ACTIVE = 3;
    const COMPLETED = 4;
    const CANCELED = 5;
    const DELIVERED = 6;
    const PENDING = 7;
    const BLOCKED = 8;
    const MAINTENANCE = 9;
    const PAID = 10;
    const IN_PROGRESS = 11;
    public function storeThemes()
    {
        return $this->hasMany(StoreTheme::class);
    }

    public function subscriptionPlanFeatures()
    {
        return $this->hasMany(SubscriptionPlanFeature::class);
    }

    public function merchants()
    {
        return $this->hasMany(Merchant::class);
    }

    public function stores()
    {
        return $this->hasMany(Store::class);
    }

    public function subscriptionPlans()
    {
        return $this->hasMany(SubscriptionPlan::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function definitionPages()
    {
        return $this->hasMany(DefinitionPage::class);
    }

    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
