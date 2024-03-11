<?php

namespace App\Models;

use App\Traits\HasRelatedToMerchantStore;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreCountry extends Model
{
    use HasFactory,HasRelatedToMerchantStore;

    protected $fillable = ['store_id', 'country_id','is_default'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
