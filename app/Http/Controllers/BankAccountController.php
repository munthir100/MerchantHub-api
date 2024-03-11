<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBankAccountRequest;
use App\Http\Resources\BankAccountResource;
use App\Models\BankAccount;

class BankAccountController extends Controller
{

    public function index()
    {
        $bankAccounts = BankAccount::all();

        return $this->responseSuccess('Bank accounts retrieved successfully', BankAccountResource::collection($bankAccounts));
    }

    public function store(CreateBankAccountRequest $request)
    {
        $bankAccount = BankAccount::create($request->validated());

        return $this->responseCreated('Bank account created successfully', new BankAccountResource($bankAccount));
    }

    public function show(BankAccount $bankAccount)
    {
        return $this->responseSuccess('Bank account retrieved successfully', new BankAccountResource($bankAccount));
    }

    public function update(CreateBankAccountRequest $request, BankAccount $bankAccount)
    {
        $bankAccount->update($request->validated());

        return $this->responseSuccess('Bank account updated successfully', new BankAccountResource($bankAccount));
    }

    public function destroy(BankAccount $bankAccount)
    {
        $bankAccount->delete();

        return $this->responseDeleted();
    }
}
