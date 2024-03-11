<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCouponRequest;
use App\Http\Resources\CouponResource;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;

class CouponController extends Controller
{

    public function index()
    { 
        $coupons = Coupon::forAuthMerchantStore()->get();
        return $this->responseSuccess(null, CouponResource::collection($coupons));
    }

    public function store(CreateCouponRequest $request)
    {
        $coupon = Coupon::create($request->validated());
        return $this->responseCreated(null, new CouponResource($coupon));
    }

    public function show(Coupon $coupon)
    {
        return $this->responseSuccess(null, new CouponResource($coupon));
    }

    public function update(CreateCouponRequest $request, Coupon $coupon)
    {
        $coupon->update($request->validated());
        return $this->responseSuccess(null, new CouponResource($coupon));
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return $this->responseDeleted();
    }
}
