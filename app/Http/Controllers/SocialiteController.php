<?php

namespace App\Http\Controllers;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
class SocialiteController extends Controller
{
     // google
     public function googleLogin(){
        return Socialite::driver('google')->redirect();
    }

    public function googleAuthentication(){

        try{

        $googleUser = Socialite::driver('google')->user();
        $user = User::where('google_id' , $googleUser->id)->first();

        if($user){
            Auth::login($user);
            return redirect()->route('dashboard');
        }else{
            $userData = User::create([
                'name' => $googleUser->name ,
                'email' => $googleUser->email  , 
                'password' => Hash::make('Password@1234') ,
                'google_id' => $googleUser->id ,
            ]);

            if ($userData){
                Auth::login($userData);
                return redirect()->route('dashboard');
            }
        }
        } catch (Exception $e){
        //  dd($e->getMessage());
        }
        
    }

    // facebook

    public function facebookLogin()
{
    return Socialite::driver('facebook')->redirect();
}

public function facebookAuthentication()
{
    try {
        $facebookUser = Socialite::driver('facebook')->user();
        $user = User::where('facebook_id', $facebookUser->id)->first();

        if ($user) {
            Auth::login($user);
            return redirect()->route('dashboard');
        } else {
            $userData = User::create([
                'name' => $facebookUser->name,
                'email' => $facebookUser->email,
                'password' => Hash::make('Password@1234'),
                'facebook_id' => $facebookUser->id,
            ]);

            if ($userData) {
                Auth::login($userData);
                return redirect()->route('dashboard');
            }
        }
    } catch (Exception $e) {
        dd($e->getMessage()); 
    }
}


// WhatsApp
public function showWhatsAppForm()
{
    return view('auth.whatsapp-login');
}

public function WhatsAppLogin(Request $request)
{
    // dd($request->all());
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

    return redirect('/dashboard')->with('success', 'تم تسجيل الدخول عبر WhatsApp!');
}
}
