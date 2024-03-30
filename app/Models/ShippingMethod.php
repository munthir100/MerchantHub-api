<?php

namespace App\Models;

use App\Traits\HasRelatedToMerchantStore;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingMethod extends Model
{
    use HasFactory,HasRelatedToMerchantStore;

    protected $fillable = [
        'name',
        'shipping_cost',
        'has_cash_on_delivery',
        'cash_on_delivery_cost',
        'excepted_delivery_time',
        'cities',
        'store_id',
    ];

    public function stores()
    {
        return $this->belongsTo(Store::class);
    }
    
    public function cities()
    {
        $cityIds = json_decode($this->cities, true); // Assuming cities is a JSON array of city IDs
        return City::whereIn('id', $cityIds)->get();
    }
}
