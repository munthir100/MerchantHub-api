<?php

namespace App\Models;

use App\Traits\HasRelatedToMerchantStore;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory,HasRelatedToMerchantStore;

    protected $fillable = [
        'promocode',
        'discount_type',
        'value',
        'end_date',
        'is_except_discounted_products',
        'less_products_number',
        'max_usage_times',
        'max_usage_per_customer',
        'status_id',
        'store_id'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function stores()
    {
        return $this->hasMany(Store::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
