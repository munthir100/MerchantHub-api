<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBankAccountRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'bank_id' => 'sometimes|required|exists:banks,id',
            'holder_name' => 'sometimes|required|string',
            'details' => 'sometimes|required|string',
            'iban' => 'sometimes|required|string',
        ];
    }
}
