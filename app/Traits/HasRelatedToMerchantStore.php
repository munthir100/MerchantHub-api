<?php

namespace App\Traits;

trait HasRelatedToMerchantStore
{
    protected static function bootHasRelatedToMerchantStore()
    {
        static::creating(function ($model) {
            $model->store_id = request()->user('merchant')->store_id;
        });
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where('store_id', request()->user('merchant')->store_id)->findOrFail($value);
    }

    public function scopeforAuthMerchantStore($query)
    {
        return $query->where('store_id', request()->user('merchant')->store_id);
    }
}
