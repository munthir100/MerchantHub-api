<?php

namespace App\Models;

use App\Traits\HasRelatedToMerchantStore;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    use HasFactory,HasRelatedToMerchantStore;

    protected $fillable = [
        'facebook',
        'instagram',
        'twitter',
        'tiktok',
        'whatsapp',
        'snapchat',
        'x_platform',
        'telegram',
        'google_play',
        'app_store',
        'store_id'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
