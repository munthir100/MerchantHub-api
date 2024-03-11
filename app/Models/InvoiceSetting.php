<?php

namespace App\Models;

use App\Traits\HasRelatedToMerchantStore;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceSetting extends Model
{
    use HasFactory,HasRelatedToMerchantStore;

    protected $fillable = ['settings', 'invoice_id', 'store_id'];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
