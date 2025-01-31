<?php

use App\Http\Controllers\Admin\RolePermissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationSettingController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SocialiteSettingController;

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('roles', [RolePermissionController::class, 'index'])->name('admin.roles.index');
    Route::get('roles/create', [RolePermissionController::class, 'createRole'])->name('admin.roles.create');
    Route::post('roles/store', [RolePermissionController::class, 'storeRole'])->name('admin.roles.store');
    Route::get('roles/{id}/edit', [RolePermissionController::class, 'editRole'])->name('admin.roles.edit');
    Route::put('roles/{id}/update', [RolePermissionController::class, 'updateRole'])->name('admin.roles.update');
    Route::delete('roles/{id}/delete', [RolePermissionController::class, 'destroyRole'])->name('admin.roles.destroy');

    Route::get('permissions', [RolePermissionController::class, 'permissions'])->name('admin.permissions.index');
    Route::post('permissions/store', [RolePermissionController::class, 'storePermission'])->name('admin.permissions.store');



    Route::get('/notifications', [NotificationSettingController::class, 'index'])->name('admin.notifications.index');
    Route::put('/notifications/update', [NotificationSettingController::class, 'update'])->name('admin.notifications.update');
   // test
    Route::get('/notifications/test', [NotificationSettingController::class, 'test'])->name('admin.notifications.test');
    Route::get('/notifications/testsms', [NotificationSettingController::class, 'testsms'])->name('admin.notifications.testsms');
    Route::get('/notifications/testslack', [NotificationSettingController::class, 'testslack'])->name('admin.notifications.testslack');
    Route::get('/notifications/testpusher', [NotificationSettingController::class, 'testpusher'])
    ->name('admin.notifications.testpusher');
  


    // settings
    Route::get('settings', [SettingController::class, 'index'])->name('admin.settings.index');
    Route::post('settings/update', [SettingController::class, 'store'])->name('admin.settings.store');
  
    // socialite-settings
    Route::get('socialite-settings', [SocialiteSettingController::class, 'index'])->name('admin.socialite-settings.index');
    Route::post('socialite-settings/store', [SocialiteSettingController::class, 'store'])->name('admin.socialite-settings.store');

    
    
});

// use App\Services\NotificationService;
// use App\Models\NotificationSetting;

// $user = auth()->user();
// $setting = NotificationSetting::where('user_id', $user->id)
//     ->where('notification_type', 'email')
//     ->first();

// if ($setting && $setting->enabled) {
//     NotificationService::sendEmailNotification($user, 'Your custom message here.');
// }
