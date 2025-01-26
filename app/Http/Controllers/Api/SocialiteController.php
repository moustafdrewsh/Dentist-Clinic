<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function googleLogin()
    {
        try {
            $googleUrl = Socialite::driver('google')->stateless()->redirect()->getTargetUrl();
            return response()->json(['url' => $googleUrl], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error during Google login redirect: ' . $e->getMessage()], 500);
        }
    }


    // Google Authentication Callback API
    public function googleAuthentication(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            $user = User::where('google_id', $googleUser->id)->first();

            if ($user) {
                Auth::login($user);
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()->json(['access_token' => $token, 'token_type' => 'Bearer', 'user' => $user], 200);
            } else {
                $userData = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => Hash::make('Password@1234'),
                    'google_id' => $googleUser->id,
                ]);

                Auth::login($userData);
                $token = $userData->createToken('auth_token')->plainTextToken;

                return response()->json(['access_token' => $token, 'token_type' => 'Bearer', 'user' => $userData], 201);
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'Google authentication failed: ' . $e->getMessage()], 500);
        }
    }


    // Facebook Login API
    public function facebookLogin()
    {
        try {
            $facebookUrl = Socialite::driver('facebook')->stateless()->redirect()->getTargetUrl();
            return response()->json(['url' => $facebookUrl], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error during Facebook login redirect: ' . $e->getMessage()], 500);
        }
    }

    // Facebook Authentication Callback API
    public function facebookAuthentication(Request $request)
    {
        try {
            $facebookUser = Socialite::driver('facebook')->stateless()->user();
            $user = User::where('facebook_id', $facebookUser->id)->first();

            if ($user) {
                Auth::login($user);
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()->json(['access_token' => $token, 'token_type' => 'Bearer', 'user' => $user], 200);
            } else {
                $userData = User::create([
                    'name' => $facebookUser->name,
                    'email' => $facebookUser->email,
                    'password' => Hash::make('Password@1234'),
                    'facebook_id' => $facebookUser->id,
                ]);

                Auth::login($userData);
                $token = $userData->createToken('auth_token')->plainTextToken;

                return response()->json(['access_token' => $token, 'token_type' => 'Bearer', 'user' => $userData], 201);
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'Facebook authentication failed: ' . $e->getMessage()], 500);
        }
    }


    // WhatsApp Login API
    public function WhatsAppLogin(Request $request)
    {
        $request->validate([
            'whatsapp_number' => 'required|numeric|unique:users,whatsapp_number',
        ]);

        $user = User::where('whatsapp_number', $request->whatsapp_number)->first();

        if (!$user) {
            $user = User::create([
                'name' => 'User:' . $request->whatsapp_number,
                'whatsapp_number' => $request->whatsapp_number,
                'password' => bcrypt('password'),
            ]);
        }

        Auth::login($user);
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ], 201);
    }
}
