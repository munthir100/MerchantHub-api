<?php

namespace App\Models;

use App\Traits\HasRelatedToMerchantStore;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory,HasRelatedToMerchantStore;

    protected $fillable = ['name', 'category_id','store_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
