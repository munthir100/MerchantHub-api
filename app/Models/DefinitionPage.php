<?php

namespace App\Models;

use App\Traits\HasRelatedToMerchantStore;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefinitionPage extends Model
{
    use HasFactory,HasRelatedToMerchantStore;

    protected $fillable = ['title', 'details', 'status_id'];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
