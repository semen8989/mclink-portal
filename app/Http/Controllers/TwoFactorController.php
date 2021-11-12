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
        $token = 'token_' . $validated['token_2fa'];
        $user = null;

        if (session()->has($token)) {
            $userId = session()->get($token);
            $user = User::find($userId)->first();
        }

        if (!empty($user) && Carbon::now()->lt($user->token_2fa_expiry)) {
            $user->token_2fa_expiry = null;

            if ($user->save()) {
                session()->forget($token);
                
                Auth::login($user);
            }    

            return redirect('/');
        } else {
            return redirect()->back()->with('token_error', __('label.auth.response.error.token_error'));
        }
    }
}
