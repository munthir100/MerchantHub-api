<?php

// app/Http/Requests/UpdateWishlistRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWishlistRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'product_id' => 'sometimes|integer',
            'customer_id' => 'sometimes|integer',
        ];
    }
}
