<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBankAccountRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'bank_id' => 'required|exists:banks,id',
            'holder_name' => 'required|string',
            'details' => 'required|string',
            'iban' => 'required|string',
        ];
    }
}
