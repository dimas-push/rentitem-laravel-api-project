<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Firebase\JWT\JWT;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'phone_number' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Membuat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'status' => 'unverified',
        ]);

        $payload = [
            "sub" => $user['id'],
            "iat" => now()->timestamp,
            "exp" => now()->timestamp + 7200
        ];

        $token = JWT::encode($payload,env('JWT_SECRET_KEY'),'HS256');

        // Kembalikan response
        return response()->json(['message' => 'User registered successfully', 'user' => $user, 'token' => $token], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Email atau password salah.'
            ], 401);
        }

        $payload = [
            "sub" => $user->id,
            "iat" => now()->timestamp,
            "exp" => now()->timestamp + 7200
        ];
    
        $token = JWT::encode($payload, env('JWT_SECRET_KEY'), 'HS256');
    
        return response()->json([
            'message' => 'Login berhasil.',
            'token' => $token,
            'user' => $user,
        ]);
    }
}