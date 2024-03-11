<?php

// app/Http/Requests/UpdateShoppingCartRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShoppingCartRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'customer_id' => 'sometimes|integer',
        ];
    }
}
