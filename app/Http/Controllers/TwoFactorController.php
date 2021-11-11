<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\VerifyTwoFactorRequest;

class TwoFactorController extends Controller
{
    public function showTwoFactorForm()
    {
        return view('auth.two_factor');
    }

    public function verifyTwoFactor(VerifyTwoFactorRequest $request)
    {
        $validated = $request->validated();
        $user = Auth::user();

        if ($validated['token_2fa'] == $user->token_2fa && Carbon::now()->lt($user->token_2fa_expiry)) { 
            $user->token_2fa = null;
            $user->token_2fa_expiry = Carbon::now()->addMinutes(config('session.lifetime'));
            $user->save();

            return redirect('/');
        } else {
            return redirect()->back()->with('token_error', __('label.auth.response.error.token_error'));
        }
    }
}
