<?php

// app/Http/Requests/UpdateCouponRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCouponRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'promocode' => 'sometimes|string',
            'discount_type' => 'sometimes|string|in:fixed,percentage',
            'value' => 'sometimes|numeric',
            'end_date' => 'sometimes|date',
            'is_except_discounted_products' => 'sometimes|boolean',
            'less_products_number' => 'sometimes|integer',
            'max_usage_times' => 'sometimes|integer',
            'max_usage_per_customer' => 'sometimes|integer',
            'status_id' => 'sometimes|integer',
        ];
    }
}
