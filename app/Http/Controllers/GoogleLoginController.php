<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    //
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
        $googleUser = Socialite::driver('google')->stateless()->user();

        $findUser = User::where('google_id',$googleUser->id)->first();
        if($findUser){
            Auth:login($findUser);
            return redirect(route('welcome'));
        }else{
            $newUser = User::create([
                'name'=>$googleUser->name,
                'email'=>$googleUser->email,
                'google_id'=>$googleUser->id,
                'password'=>encrypt('')
            ]);
            Auth::login($newUser);
            return redirect(route('welcome'));
        }
    }
}
