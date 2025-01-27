<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialiteSetting;

class SocialiteSettingController extends Controller
{
    public function index()
    {
        $settings = SocialiteSetting::first();
        return view('admin.setting.socialite.index', compact('settings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'google_client_id' => 'required|string',
            'google_client_secret' => 'required|string',
            'google_callback_redirect' => 'required|url',
            'facebook_client_id' => 'required|string',
            'facebook_client_secret' => 'required|string',
            'facebook_callback_redirect' => 'required|url',
        ]);

        $settings = SocialiteSetting::updateOrCreate(
            ['id' => 1],
            $request->only([
                'google_client_id',
                'google_client_secret',
                'google_callback_redirect',
                'facebook_client_id',
                'facebook_client_secret',
                'facebook_callback_redirect',
            ])
        );

        $this->updateEnv([
            'GOOGLE_CLIENT_ID' => $settings->google_client_id,
            'GOOGLE_CLIENT_SECRET' => $settings->google_client_secret,
            'GOOGLE_CALLBACK_REDIRECTS' => $settings->google_callback_redirect,
            'FACEBOOK_CLIENT_ID' => $settings->facebook_client_id,
            'FACEBOOK_CLIENT_SECRET' => $settings->facebook_client_secret,
            'FACEBOOK_CALLBACK_REDIRECT' => $settings->facebook_callback_redirect,
        ]);

        return redirect()->route('admin.socialite-settings.index')->with('success', 'Settings updated successfully!');
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
