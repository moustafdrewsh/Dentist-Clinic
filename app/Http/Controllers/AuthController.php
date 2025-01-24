<?php

namespace App\Http\Controllers;
use Auth;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    public function login(){
        // dd(Hash::make(123456));
        if(!empty(Auth::check())){
            return redirect('panel/dashboard');

        }
 return view('auth.login');
    }


public function auth_login(Request $request){
    
  $remember = !empty($request->remember) ? true : false;
  if(Auth::attempt(['email' => $request->email, 'password' => $request->password] , $remember)){
    return redirect('panel/dashboard');
  } else{
    return redirect()->back()->with('error' , "please enter currect email and password");
  }


       }



       public function logout(){
        Auth::logout();
        return  redirect(url(''));
       }
   
    }