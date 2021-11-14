<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\VerifyTwoFactorRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class TwoFactorController extends Controller
{
    use AuthenticatesUsers;

    public function showTwoFactorForm()
    {
        return view('auth.two_factor');
    }

    public function verifyTwoFactor(VerifyTwoFactorRequest $request)
    {
        $validated = $request->validated();
        $cookieName = md5($validated['token_2fa']);
        $user = null;

        if ($cookieVal = $request->cookie($cookieName)) {
            $user = User::find($cookieVal)->first();
        }

        if (!empty($user) && Carbon::now()->lt($user->token_2fa_expiry)) {
            $user->timestamps = false;
            $user->token_2fa_expiry = null;

            if ($user->save()) {
                cookie()->forget($cookieName);
                
                Auth::login($user);
            }    

            return redirect('/');
        } else {
            return redirect()->back()->with('token_error', __('label.auth.response.error.token_error'));
        }
    }
}
