<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateShippingMethodRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'shipping_cost' => 'required|numeric',
            'has_cash_on_delivery' => 'required|boolean',
            'cash_on_delivery_cost' => 'required|numeric',
            'excepted_delivery_time' => 'required|string',
            'cities' => 'required|array|exists:cities,id', // comming soon
        ];
    }
}
