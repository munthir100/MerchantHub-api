<?php

namespace App\Observers;

use App\Models\ShippingMethod;

class ShippingMethodObserver
{
    public function saving(ShippingMethod $shippingMethod)
    {
        $shippingMethod->cities = json_encode($shippingMethod->cities);
    }
}
