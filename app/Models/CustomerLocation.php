<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'phone',
        'city_id',
        'address',
        'is_default',
        'longitude',
        'latitude',
        'customer_id'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
