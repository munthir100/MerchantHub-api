<?php

// app/Http/Requests/UpdateOrderItemRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderItemRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'product_id' => 'sometimes|integer',
            'order_id' => 'sometimes|integer',
            'quantity' => 'sometimes|integer',
            'options' => 'sometimes|array',
            'price' => 'sometimes|numeric',
        ];
    }
}
