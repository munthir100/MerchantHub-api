<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ProductOptionsRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!is_array($value)) {
            $fail("The $attribute must be an array.");
            return;
        }

        $totalQuantity = 0; // Initialize total quantity

        foreach ($value as $option) {
            if (!isset($option['name']) || !isset($option['values'])) {
                $fail("Each option must have a 'name' and 'values'.");
                return;
            }

            foreach ($option['values'] as $value) {
                if (!isset($value['name']) || !isset($value['quantity']) || !isset($value['additional_price'])) {
                    $fail("Each value must have 'name', 'quantity', and 'additional_price'.");
                    return;
                }

                $totalQuantity += $value['quantity']; // Add quantity of each value to the total
            }
        }

        if (isset($value['is_unlimited_quantity']) && $value['is_unlimited_quantity']) {
            // If is_unlimited_quantity is true, no need to check the total quantity
        } elseif (request()->quantity && $totalQuantity != request()->quantity) {
            $fail("The total quantity of values for '$attribute' does not match the specified quantity.");
            return;
        }
    }
}
