<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\SocialiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthApiController::class, 'registerApi']);
Route::post('/login', [AuthApiController::class, 'loginApi']);
Route::post('/logout', [AuthApiController::class, 'logoutApi']);
Route::get('/profile', [AuthApiController::class, 'profileApi']);
Route::put('/profile', [AuthApiController::class, 'updateProfileApi']);
Route::post('/password/email', [AuthApiController::class, 'sendResetPasswordEmail']);
Route::post('/password/reset', [AuthApiController::class, 'resetPassword']);

Route::get('/auth/google', [SocialiteController::class, 'googleLogin']);
Route::get('/auth/google/callback', [SocialiteController::class, 'googleAuthentication']);
Route::get('/auth/facebook', [SocialiteController::class, 'facebookLogin']);
Route::get('/auth/facebook/callback', [SocialiteController::class, 'facebookAuthentication']);

Route::post('/auth/whatsapp', [SocialiteController::class, 'WhatsAppLogin']);
