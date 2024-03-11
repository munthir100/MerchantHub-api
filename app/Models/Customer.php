<?php

namespace App\Models;

use App\Traits\HasRelatedToMerchantStore;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory,HasRelatedToMerchantStore;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'birth_date',
        'city_id',
        'gender',
        'description',
        'store_id'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function customerLocations()
    {
        return $this->hasMany(CustomerLocation::class);
    }

    public function shoppingCarts()
    {
        return $this->hasMany(ShoppingCart::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
