<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class , 'login']);
Route::post('/', [AuthController::class , 'auth_login']);
Route::get('/logout', [AuthController::class , 'logout']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('auth/google', [SocialiteController::class , 'googleLogin'])->name('auth.google');
Route::get('auth/google/callback', [SocialiteController::class , 'googleAuthentication'])->name('auth.google-callback');

Route::get('auth/facebook', [SocialiteController::class, 'facebookLogin'])->name('auth.facebook');
Route::get('auth/facebook-callback', [SocialiteController::class, 'facebookAuthentication'])->name('auth.facebook-callback');

Route::get('auth/whatsapp', [SocialiteController::class, 'showWhatsAppForm'])->name('auth.whatsapp');
Route::post('auth/whatsapp', [SocialiteController::class, 'WhatsAppLogin'])->name('auth.whatsapp.post');
require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
