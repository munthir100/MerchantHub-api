<?php

namespace App\Models;

use App\Traits\HasRelatedToMerchantStore;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreSetting extends Model
{
    use HasFactory,HasRelatedToMerchantStore;

    protected $fillable = ['settings', 'store_id'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
