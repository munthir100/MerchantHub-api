<?php

namespace App\Models;

use App\Models\StoreSetting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'link',
        'description',
        'images',
        'city_id',
        'theme_id',
        'language_id',
        'owner_id',
        'status_id'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function theme()
    {
        return $this->belongsTo(StoreTheme::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function owner()
    {
        return $this->belongsTo(Merchant::class, 'owner_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function socialLinks()
    {
        return $this->hasOne(SocialLink::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function brands()
    {
        return $this->hasMany(Brand::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function shoppingCarts()
    {
        return $this->hasMany(ShoppingCart::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function shippingMethods()
    {
        return $this->hasMany(ShippingMethod::class);
    }

    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function definitionPages()
    {
        return $this->hasMany(DefinitionPage::class);
    }

    public function storeCountries()
    {
        return $this->belongsToMany(Country::class, 'store_countries');
    }

    public function storeSettings()
    {
        return $this->hasMany(StoreSetting::class);
    }
}
