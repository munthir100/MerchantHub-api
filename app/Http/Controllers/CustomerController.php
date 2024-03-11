<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = Customer::forAuthMerchantStore()->get();
        return $this->responseSuccess(null, CustomerResource::collection($customers));
    }

    public function store(CreateCustomerRequest $request)
    {
        $customer = Customer::create($request->validated());
        return $this->responseCreated(null, new CustomerResource($customer));
    }

    public function show(Customer $customer)
    {
        return $this->responseSuccess(null, new CustomerResource($customer));
    }

    public function update(CreateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated());
        return $this->responseSuccess(null, new CustomerResource($customer));
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return $this->responseDeleted();
    }
}
