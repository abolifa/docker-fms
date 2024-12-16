<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Authenticate the user and return a token.
     */
    public function login(Request $request)
    {
        // Validate the request
        $credentials = $request->validate([
            'email_or_username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Find the user by email or username
        $user = User::where('email', $credentials['email_or_username'])
            ->orWhere('username', $credentials['email_or_username'])
            ->first();

        if (!$user || !Auth::attempt(['email' => $user->email, 'password' => $credentials['password']])) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        // Generate a token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'username' => $user->username,
                'role' => $user->role,
            ],
        ]);
    }

    /**
     * Logout the user (invalidate the token).
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully',
        ]);
    }
}
