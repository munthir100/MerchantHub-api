<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    public const SAUDI_ARABIA = 'SAR';
    public const UNITED_ARAB_EMIRATES = 'AED';
    public const QATAR = 'QAR';
    public const KUWAIT = 'KWD';
    public const BAHRAIN = 'BHD';
    public const OMAN = 'OMR';
    public const UNITED_STATES = 'USD';
    public const SUDAN = 'SDG';
    
    protected $fillable = ['name', 'shortcut'];

    public function countries()
    {
        return $this->hasMany(Country::class);
    }

    public function stores()
    {
        return $this->hasMany(Store::class);
    }
}
