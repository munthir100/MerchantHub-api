<?php
// app/Http/Requests/CreateShoppingCartRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateShoppingCartRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'customer_id' => 'required|integer',
        ];
    }
}
