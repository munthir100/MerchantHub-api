<?php

// app/Http/Requests/UpdateCustomerLocationRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerLocationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'type' => 'sometimes|string',
            'phone' => 'sometimes|string',
            'city_id' => 'sometimes|integer',
            'address' => 'sometimes|string',
            'is_default' => 'sometimes|boolean',
            'longitude' => 'sometimes|numeric',
            'latitude' => 'sometimes|numeric',
        ];
    }
}
