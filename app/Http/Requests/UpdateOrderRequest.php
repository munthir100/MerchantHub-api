<?php

// app/Http/Requests/UpdateOrderRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'customer_id' => 'sometimes|integer',
            'shipping_method_id' => 'sometimes|integer',
            'coupon_id' => 'sometimes|integer',
            'note' => 'sometimes|string',
            'status_id' => 'sometimes|integer',
        ];
    }
}
