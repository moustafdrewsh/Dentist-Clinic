<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first(); 
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
            'twilio_phone_number' => 'required|string',  
            'slack_webhook_url' => 'required|string',
            'pusher_app_id' => 'required|string',
            'pusher_app_key' => 'required|string',
            'pusher_app_secret' => 'required|string',
            'pusher_app_cluster' => 'required|string',
        ]);

        $settings = Setting::updateOrCreate(
            ['id' => 1], 
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
                'twilio_phone_number',
                'slack_webhook_url',
                'pusher_app_id',
                'pusher_app_key',
                'pusher_app_secret',
                'pusher_app_cluster',
            ])
        );

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
            'TWILIO_PHONE_NUMBER' => $settings->twilio_phone_number, 
            'SLACK_WEBHOOK_URL' => $settings->slack_webhook_url,
            'PUSHER_APP_ID' => $settings->pusher_app_id,
            'PUSHER_APP_KEY' => $settings->pusher_app_key,
            'PUSHER_APP_SECRET' => $settings->pusher_app_secret,
            'PUSHER_APP_CLUSTER' => $settings->pusher_app_cluster,
        ]);

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully!');
    }

    private function updateEnv(array $data)
    {
        $envPath = base_path('.env');

        $envContents = file_get_contents($envPath);

        foreach ($data as $key => $value) {
            $envContents = preg_replace(
                "/^{$key}=.*/m", 
                "{$key}={$value}", 
                $envContents
            );
        }

        file_put_contents($envPath, $envContents);
    }
}
