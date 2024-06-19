<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Get authenticated user
     * @return \Illuminate\Http\JsonResponse
     */
    public function me(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'user' => Auth::user(),
        ]);
    }

    /**
     * Login user
     *
     * @unauthenticated
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            Auth::user()->tokens()->delete();
            return response()->json([
                'token' => Auth::user()->createToken('token-name')->plainTextToken,
            ]);
        }

        return response()->json([
            'message' => 'Unauthorized',
        ], 401);
    }
}
