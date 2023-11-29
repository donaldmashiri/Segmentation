<?php

namespace App\Http\Controllers\Auth;

//namespace App\Http\Controllers;
//use App\Http\Controllers\Controller;
//use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{


    use AuthenticatesUsers;
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $email = $user->email;
        $allowedDomain = '@gmail.com';

        if (strpos($email, $allowedDomain) === false) {
            // Redirect or show an error message for unauthorized email domain
            return redirect()->route('login')->withErrors(['email' => 'Invalid Email Address']);
        }

        $existingUser = User::where('email', $email)->first();

        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $email,
                'password' => bcrypt('password'),
            ]);

            Auth::login($newUser);
        }

        return redirect('/profile');
    }
}
