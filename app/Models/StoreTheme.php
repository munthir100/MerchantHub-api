<?php

namespace App\Models;

use App\Traits\HasRelatedToMerchantStore;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreTheme extends Model
{
    use HasFactory,HasRelatedToMerchantStore;
    const DEFAULT = 1;
    protected $fillable = ['name', 'status_id', 'is_default'];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function stores()
    {
        return $this->hasMany(Store::class);
    }
}
