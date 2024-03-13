<?php

namespace App\Http\Requests;

use App\Models\Status;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customer_id' => 'required|integer|exists_in_merchant_store,customers,id',
            'shipping_method_id' => 'required|integer|exists_in_merchant_store,shiping_methods,id',
            'coupon_id' => 'integer|exists_in_merchant_store,coupons,id',
            'note' => 'required|string',
            'status_id' => [
                'required',
                'integer',
                Rule::in(
                    Status::CANCELED,
                    Status::DELIVERED,
                    Status::PENDING,
                    Status::PAID,
                    Status::IN_PROGRESS,
                )
            ],
        ];
    }
}
