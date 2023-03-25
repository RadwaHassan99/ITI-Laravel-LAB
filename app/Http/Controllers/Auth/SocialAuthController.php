<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();

        $user = User::updateOrCreate(
            ['email' => $socialUser->email],
            [
                'name' => $socialUser->name,
                'password' => Hash::make(Str::random(24)),
                "{$provider}_id" => $socialUser->id,
                "{$provider}_token" => $socialUser->token,
                "{$provider}_refresh_token" => $socialUser->refreshToken,
            ]
        );

        Auth::login($user);

        return redirect()->route('posts.index');
    }
}
