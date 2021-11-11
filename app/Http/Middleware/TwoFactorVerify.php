<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (Carbon::now()->lt($user->token_2fa_expiry) && $user->token_2fa == null){
            $user->token_2fa_expiry = Carbon::now()->addMinutes(config('session.lifetime'));
            $user->save();

            return $next($request);
        } else {
            $request->session()->invalidate();

            return redirect('/login');
        }
    }
}
