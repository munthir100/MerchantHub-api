<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Merchant;
use App\Models\Store;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request): JsonResponse
    {

        $merchant = Merchant::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country_id' => $request->country_id,
            'password' => Hash::make($request->password),
        ]);
        $store = Store::create([
            'name' => $request->store_name,
            'link' => $request->store_link,
            'language_id' => $request->language_id,
            'owner_id' => $merchant->id,
        ]);
        $merchant->store_id = $store->id;
        $merchant->save();

        event(new Registered($merchant));

        $token = $merchant->createToken('auth_token')->plainTextToken;

        return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);
    }
}
