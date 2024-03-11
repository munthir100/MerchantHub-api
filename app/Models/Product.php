<?php

namespace App\Models;

use App\Traits\HasRelatedToMerchantStore;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model 
{
    use HasFactory,HasRelatedToMerchantStore;

    protected $fillable = [
        'title', 'price', 'cost', 'sku', 'quantity', 'is_unlimited', 'weight',
        'is_discounted', 'price_after_discount', 'shortcut_description', 'description',
        'options', 'store_id', 'category_id', 'brand_id', 'status_id',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

}
