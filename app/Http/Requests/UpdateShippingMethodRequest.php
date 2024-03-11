<?php

// app/Http/Requests/UpdateShippingMethodRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShippingMethodRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|string',
            'shipping_cost' => 'sometimes|numeric',
            'has_cash_on_delivery' => 'sometimes|boolean',
            'cash_on_delivery_cost' => 'sometimes|numeric',
            'excepted_delivery_time' => 'sometimes|string',
            'cities' => 'sometimes|array',
        ];
    }
}
