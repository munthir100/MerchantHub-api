<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::forAuthMerchantStore()->get();
        return $this->responseSuccess(data: OrderResource::collection($orders));
    }

    public function store(CreateOrderRequest $request)
    {
        $order = Order::create($request->validated());
        return $this->responseCreated(data: new OrderResource($order));
    }

    public function show(Order $order)
    {
        return $this->responseSuccess(data: new OrderResource($order));
    }

    public function update(CreateOrderRequest $request, Order $order)
    {
        $order->update($request->validated());
        return $this->responseSuccess(data: new OrderResource($order));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return $this->responseDeleted();
    }
}
