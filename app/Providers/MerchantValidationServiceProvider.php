<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class MerchantValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        // Custom validation rule: exists_in_merchant_store
        Validator::extend('exists_in_merchant_store', function ($attribute, $value, $parameters, $validator) {
            $merchantStoreId = auth()->user('merchant')->store_id;

            // Adjust the logic based on your actual model and column names
            $tableName = $parameters[0] ?? null;
            $column = $parameters[1] ?? 'id';

            if ($tableName) {
                return DB::table($tableName)->where($column, $value)
                    ->where('store_id', $merchantStoreId)
                    ->exists();
            }

            return false;
        });

        Validator::replacer('exists_in_merchant_store', function ($message, $attribute, $rule, $parameters) {
            $customMessage = __('The selected :attribute is invalid for the merchant store.');
            return str_replace(':attribute', $attribute, $customMessage);
        });

        // Custom validation rule: unique_in_merchant_store
        Validator::extend('unique_in_merchant_store', function ($attribute, $value, $parameters, $validator) {
            $merchantStoreId = auth()->user('merchant')->store_id;

            // Adjust the logic based on your actual model and column names
            $tableName = $parameters[0] ?? null;
            $column = $parameters[1] ?? $attribute;
            $exceptId = $parameters[2] ?? null;
            if ($tableName) {
                $query = DB::table($tableName)->where($column, $value)
                    ->where('store_id', $merchantStoreId);
                if (!is_null($exceptId)) {
                    $query->where('id', '!=', $exceptId);
                }

                return !$query->exists();
            }

            return false;
        });


        Validator::replacer('unique_in_merchant_store', function ($message, $attribute, $rule, $parameters) {
            $customMessage = __('The :attribute has already been taken for the merchant store.');
            return str_replace(':attribute', $attribute, $customMessage);
        });
    }
}
