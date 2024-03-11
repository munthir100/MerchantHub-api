<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::forAuthMerchantStore();
        return $this->responseSuccess(null, OrderResource::collection($orders));
    }

    public function store(CreateOrderRequest $request)
    {
        $order = Order::create($request->validated());
        return $this->responseCreated(null, new OrderResource($order));
    }

    public function show(Order $order)
    {
        return $this->responseSuccess(null, new OrderResource($order));
    }

    public function update(CreateOrderRequest $request, Order $order)
    {
        $order->update($request->validated());
        return $this->responseSuccess(null, new OrderResource($order));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return $this->responseDeleted();
    }
}
