<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    // Google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Google callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $this->_registerOrLogin($user);
        // Return home after login success
        return redirect('/');
    }

    protected function _registerOrLogin($data)
    {
        $user = User::where('email', '=', $data->email)->first();

        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->firstname = $data->user['given_name'];
            $user->lastname = $data->user['family_name'];
            $user->profile_photo_path = $data->avatar;
            $user->email = $data->email;
            $user->google_id = $data->id;
            $user->password = Hash::make(Str::random(16));
            $user->save();
        }

        Auth::login($user);
    }
}
