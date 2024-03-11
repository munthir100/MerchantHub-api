<?php

namespace App\Models;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BankAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_id',
        'merchant_id',
        'holder_name',
        'details',
        'iban',
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}
