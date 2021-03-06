<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\VerifyTwoFactorRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class TwoFactorController extends Controller
{
    use AuthenticatesUsers;

    public function showTwoFactorForm()
    {
        $title = __('label.auth.title.otp_form');

        return view('auth.two_factor', compact('title'));
    }

    public function verifyTwoFactor(VerifyTwoFactorRequest $request)
    {
        $validated = $request->validated();
        $cookieName = md5($validated['token_2fa']);
        $user = null;

        if ($cookieVal = $request->cookie($cookieName)) {
            $user = User::find($cookieVal);
        }

        if (!empty($user)) {
            cookie()->forget($cookieName);
            
            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->intended($this->redirectPath());
        } else {
            return redirect()->back()->with('token_error', __('label.auth.response.error.token_error'));
        }
    }
}
