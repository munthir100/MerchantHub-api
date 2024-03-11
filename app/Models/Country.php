<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'currency_id', 'language_id'];

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function stores()
    {
        return $this->belongsToMany(Store::class, 'store_countries');
    }
}
