<?php

// app/Http/Requests/UpdateShoppingCartItemRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShoppingCartItemRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'product_id' => 'sometimes|integer',
            'shopping_cart_id' => 'sometimes|integer',
            'quantity' => 'sometimes|integer',
            'options' => 'nullable|array',
        ];
    }
}
