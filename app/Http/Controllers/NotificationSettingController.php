<?php

namespace App\Http\Controllers;
use Tests\TestCase;

use Illuminate\Http\Request;
use App\Models\NotificationSetting;
use App\Models\NotificationType;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Auth;

class NotificationSettingController extends Controller
{
    public function __construct()
    {
        
        if (!Auth::user() || !Auth::user()->hasRole('admin')) {
            abort(403, 'Unauthorized');
        }
    }

    public function index()
    {
        $notificationTypes = NotificationType::with('notificationSettings')->get();
        return view('admin.setting.notifications.index', compact('notificationTypes'));
    }
    public function update(Request $request)
    {
        if ($request->has('notifications')) {
            foreach ($request->notifications as $type => $enabled) {
                NotificationSetting::updateOrCreate(
                    ['notification_type_id' => $type],
                    ['enabled' => $enabled == '1' ? true : false]
                );
            }

            return redirect()->back()->with('success', 'تم تحديث الإعدادات بنجاح.');
        } else {
            return redirect()->back()->with('error', 'لم يتم تحديد أي إعدادات للإشعارات.');
        }
    }

  

    public function test()
    {
        // $user = Auth::user();
        NotificationService::cheackNotfication('login-email', 'email', 'لقد قمت بتسجيل الدخول بنجاح!');
    }

    public function testsms()
    {
        NotificationService::cheackNotfication('login-sms', 'sms', 'لقد قمت بتسجيل الدخول بنجاح!');
    }

    public function testslack()
    {
        NotificationService::cheackNotfication('app-slack', 'slack', 'لقد قمت بتسجيل الدخول بنجاح!');
    }

   
    public function testpusher()
    {
        NotificationService::cheackNotfication('app-pusher', 'pusher', 'لقد قمت بتسجيل الدخول بنجاح!');
        return redirect()->route('admin.notifications.index');

    }
}
