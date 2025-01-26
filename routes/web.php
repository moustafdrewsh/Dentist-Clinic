<?php

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


