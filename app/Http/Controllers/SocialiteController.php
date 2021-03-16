<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }
        return Socialite::driver('google')->redirect();
    }

    public function callBack()
    {
        $userGoogle = Socialite::driver('google')->stateless()->user();
        
        $users = User::where('email', $userGoogle->getEmail())->first();

        if ($users) {
            //if found redirect to home
            Auth::login($users);
            return redirect()->route('home');
        } else {
            //create new user
            $user = User::create([
                'name' => $userGoogle->getName(),
                'email' => $userGoogle->getEmail(),
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'avatar' => "https://ui-avatars.com/api/?name={$userGoogle->getName()}&size=96&background=random&length=2&color=fff"
            ]);
            //assign role
            $user->assignRole('Employee');
            //sign in user
            Auth::login($user);
            //redirect to home
            return redirect()->route('home');
        }
    }
}
