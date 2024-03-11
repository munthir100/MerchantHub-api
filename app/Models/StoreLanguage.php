<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreLanguage extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'language_id',
    ];

    function store()
    {
        return $this->belongsTo(Store::class);
    }

    function language()
    {
        return $this->belongsTo(Language::class);
    }
}
