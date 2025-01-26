<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first(); // الحصول على أول إعداد (إذا كان موجودًا)
        return view('admin.setting.notifactions-settings.index', compact('settings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mail_mailer' => 'required|string',
            'mail_host' => 'required|string',
            'mail_port' => 'required|integer',
            'mail_username' => 'required|string',
            'mail_password' => 'required|string',
            'mail_from_address' => 'required|email',
            'mail_from_name' => 'required|string',
            'twilio_sid' => 'required|string',
            'twilio_auth_token' => 'required|string',
            'twilio_phone_number' => 'required|string',  // تأكد من أن قيمة Twilio هي قيمة مرنة
        ]);

        $settings = Setting::updateOrCreate(
            ['id' => 1], // إذا كان لديك فقط سجل واحد
            $request->only([
                'mail_mailer',
                'mail_host',
                'mail_port',
                'mail_username',
                'mail_password',
                'mail_from_address',
                'mail_from_name',
                'twilio_sid',
                'twilio_auth_token',
                'twilio_phone_number'
            ])
        );

        // تحديث قيم ملف .env بناءً على الإعدادات
        $this->updateEnv([
            'MAIL_MAILER' => $settings->mail_mailer,
            'MAIL_HOST' => $settings->mail_host,
            'MAIL_PORT' => $settings->mail_port,
            'MAIL_USERNAME' => $settings->mail_username,
            'MAIL_PASSWORD' => $settings->mail_password,
            'MAIL_FROM_ADDRESS' => $settings->mail_from_address,
            'MAIL_FROM_NAME' => $settings->mail_from_name,
            'TWILIO_SID' => $settings->twilio_sid,
            'TWILIO_AUTH_TOKEN' => $settings->twilio_auth_token,
            'TWILIO_PHONE_NUMBER' => $settings->twilio_phone_number,  // تحديث رقم الهاتف من قاعدة البيانات
        ]);

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully!');
    }

    // تعريف دالة تحديث .env
    private function updateEnv(array $data)
    {
        $envPath = base_path('.env');

        // قراءة محتويات ملف .env
        $envContents = file_get_contents($envPath);

        foreach ($data as $key => $value) {
            // البحث عن السطر الذي يحتوي على المفتاح المطلوب
            $envContents = preg_replace(
                "/^{$key}=.*/m", 
                "{$key}={$value}", 
                $envContents
            );
        }

        // كتابة البيانات الجديدة في ملف .env
        file_put_contents($envPath, $envContents);
    }
}
