<?php

// app/Http/Requests/CreateCustomerLocationRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerLocationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'type' => 'required|string',
            'phone' => 'required|string',
            'city_id' => 'required|integer',
            'address' => 'required|string',
            'is_default' => 'boolean',
            'longitude' => 'numeric',
            'latitude' => 'numeric',
        ];
    }
}
