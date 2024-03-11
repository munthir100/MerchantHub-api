<?php

namespace App\Http\Requests;

use App\Models\Country;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    protected $country;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $this->country = Country::findOrFail((int)$this->input('country_id'));

        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:merchants',
            'country_id' => 'required|integer|max:255',
            'phone' => [
                'required',
                'string',
                'starts_with:' . $this->country->phone_code,
                'size:' . (strlen($this->country->phone_code) + $this->country->phone_digits_number),
                'unique:merchants'
            ],
            'password' => 'required|string|min:6|confirmed',
            'store_name' => 'required|string|max:255',
            'store_link' => 'required|string|max:255|unique:stores,link',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // Set the language_id in the validated data
            $this->merge([
                'language_id' => $this->country->language_id,
            ]);
        });
    }

    public function messages()
    {
        return [
            'phone.size' => 'The phone must start with ' . $this->country->phone_code . ' and have ' . $this->country->phone_digits_number . ' digits.',
        ];
    }
}
