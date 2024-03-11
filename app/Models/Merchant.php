<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Merchant extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $fillable = ['name', 'email', 'phone', 'password', 'country_id', 'store_id', 'status_id'];

    protected $casts = [
        'password' => 'hashed',
    ];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function bankAccount()
    {
        return $this->hasMany(BankAccount::class);
    }
}
