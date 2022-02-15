<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $tokenInstance = Auth::user()->tokens()->where('name', 'api')->first();
            if (!$tokenInstance) {
                Auth::user()->createToken('api');
                $tokenInstance = Auth::user()->tokens()->where('name', 'api')->first();
            }

            return response()->json([
                'success' => true,
                'token' => $tokenInstance->token,
            ]);
        }

        return response()->json([
            'success' => false,
            'errors' => 'The provided credentials do not match our records.',
        ]);
    }
}
