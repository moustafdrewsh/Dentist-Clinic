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

Route::group(['middleware', 'useradmin' ] ,function(){

    Route::get('/panel/dashboard', [DashboardController::class , 'dashboard']);
    // Role
    Route::get('/panel/role', [RoleController::class , 'list']);
    Route::get('/panel/role/add', [RoleController::class , 'add']);
    Route::post('/panel/role/add', [RoleController::class , 'insert']);
    Route::get('/panel/role/edit/{id}', [RoleController::class , 'edit']);
    Route::post('/panel/role/edit/{id}', [RoleController::class , 'update']);
    Route::get('/panel/role/delete/{id}', [RoleController::class , 'delete']);

    // user
    Route::get('/panel/user', [UserController::class , 'list']);
    Route::get('/panel/user/add', [UserController::class , 'add']);
    Route::post('/panel/user/add', [UserController::class , 'insert']);
    Route::get('/panel/user/edit/{id}', [UserController::class , 'edit']);
    Route::post('/panel/user/edit/{id}', [UserController::class , 'update']);
    Route::get('/panel/user/delete/{id}', [UserController::class , 'delete']);

    Route::prefix('languages')->group(function () {
        Route::get('/', [LanguageController::class, 'index'])->name('languages.index');
        Route::get('/create', [LanguageController::class, 'create'])->name('languages.create');
        Route::post('/', [LanguageController::class, 'store'])->name('languages.store');
        Route::get('/{id}/edit', [LanguageController::class, 'edit'])->name('languages.edit');
        Route::put('/{language}', [LanguageController::class, 'update'])->name('languages.update');
        Route::delete('/{language}', [LanguageController::class, 'destroy'])->name('languages.destroy');
    });

    Route::get('/languages', [LanguageController::class, 'fetchLanguages'])->name('languages.fetch.user');
    Route::get('/language/{languageCode}', [LanguageController::class, 'setLanguage'])->name('language.set-current.user');


    Route::resource('/panel/permissions', PermissionController::class);
});


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
