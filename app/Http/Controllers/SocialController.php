<?php

namespace App\Http\Controllers;

use App\Models\User;
use Faker\Generator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\Token;

class SocialController extends Controller
{
    public function redirect($service)
    {
        return Socialite::driver($service)->redirect();
    }
    public function callback($service)
    {
        $user = Socialite::driver($service)->stateless()->user();
        $userrev = User::where('email', $user->email);
        $new_user = $userrev->first() ; 
        if ($userrev->count() and $new_user->name != $user->name) {
            $userrev->update(['name' => $user->name]);
        } elseif(!$userrev->count()) {
            $new_user = User::create([

                'name' => $user->name,
                'email' => $user->email,
                'remember_token' => md5(rand(1, 10) . microtime()),
                'email_verified_at' => now(),
                'password' => Hash::make('01202590154'),
            ]);
        }
        Auth::login($new_user);
        return redirect(route('home'));
    }
}
