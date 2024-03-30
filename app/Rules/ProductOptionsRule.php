<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ProductOptionsRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        
        $totalQuantity = 0; // Initialize total quantity

        foreach ($value as $option) {
            foreach ($option['values'] as $value) {
                $totalQuantity += $value['quantity']; // Add quantity of each value to the total
            }
        }

        if (request()->is_unlimited == false) {
            if (request()->quantity && $totalQuantity != request()->quantity) {
                $fail("The total quantity of values for '$attribute' does not match the specified quantity.");
                return;
            }
        }
    }
}
