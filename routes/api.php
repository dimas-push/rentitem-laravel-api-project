<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserVerificationController;
use App\Http\Controllers\AuthController;

// Routes untuk item
Route::get('/items', [ItemController::class, 'index']);

// Routes untuk verifikasi user
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/verifikasi', [UserVerificationController::class, 'store']);
    Route::post('/verifikasi/{id}/admin', [UserVerificationController::class, 'verify']); // untuk admin
});

// Auth routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes menggunakan JWT
Route::middleware(['jwt.auth'])->group(function () {
    Route::get('/user-data', function (Request $request) {
        $userId = $request->get('jwt_user_id');
        $user = \App\Models\User::find($userId);
        return response()->json($user);
    });
});
