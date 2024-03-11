<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $merchant = Merchant::whereEmail($request->email)->first();
        if (!$merchant || !Hash::check($request->password, $merchant->password)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $merchant->tokens()->delete();
        return response()->json([
            'token' => $merchant->createToken('authToken', ['merchant'])->plainTextToken,
        ]);
    }
    public function logout()
    {
        request()->user('merchant')->tokens()->delete();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
