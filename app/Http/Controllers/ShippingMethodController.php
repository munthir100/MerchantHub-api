<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateShippingMethodRequest;
use App\Http\Resources\ShippingMethodResource;
use App\Models\ShippingMethod;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;

class ShippingMethodController extends Controller
{

    public function index()
    {
        $shippingMethods = ShippingMethod::forAuthMerchantStore()->get();
        return $this->responseSuccess(null, ShippingMethodResource::collection($shippingMethods));
    }

    public function store(CreateShippingMethodRequest $request)
    {
        $shippingMethod = ShippingMethod::create($request->validated());
        return $this->responseCreated(null, new ShippingMethodResource($shippingMethod));
    }

    public function show(ShippingMethod $shippingMethod)
    {
        return $this->responseSuccess(null, new ShippingMethodResource($shippingMethod));
    }

    public function update(CreateShippingMethodRequest $request, ShippingMethod $shippingMethod)
    {
        $shippingMethod->update($request->validated());
        return $this->responseSuccess(null, new ShippingMethodResource($shippingMethod));
    }

    public function destroy(ShippingMethod $shippingMethod)
    {
        $shippingMethod->delete();
        return $this->responseDeleted();
    }
}
