<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Exception;

class JwtMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $authHeader = $request->header('Authorization');

        if (!$authHeader || !str_starts_with($authHeader, 'Bearer ')) {
            return response()->json(['message' => 'Token tidak ditemukan'], 401);
        }

        $token = substr($authHeader, 7); // hapus "Bearer "

        try {
            $decoded = JWT::decode($token, new Key(env('JWT_SECRET_KEY'), 'HS256'));
            $request->attributes->add(['jwt_user_id' => $decoded->sub]);
        } catch (Exception $e) {
            return response()->json(['message' => 'Token tidak valid: ' . $e->getMessage()], 401);
        }

        return $next($request);
    }
}
