<?php

namespace App\Http\Requests;

use App\Models\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Adjust authorization logic as needed
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'sometimes|string',
            'link' => 'sometimes|string|unique:stores,link,' . request()->user('merchant')->store_id,
            'description' => 'nullable|string',
            'images' => 'array',
            'images.logo' => 'nullable|string',
            'images.icon' => 'nullable|string',
            'city_id' => 'sometimes|exists:cities,id', // soon
            'language_id' => 'sometimes|exists:languages,id',
        ];
    }
}
