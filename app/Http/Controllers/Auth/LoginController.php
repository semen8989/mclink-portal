<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $title = __('label.login');
        return view('auth.login',compact('title'));
    }

    public function authenticated()
    {
        $user = Auth::user();
        $user->token_2fa = mt_rand(100000,999999);
        $user->token_2fa_expiry = Carbon::now()->addMinutes(15);
        $user->save();

        return redirect('/2fa');
    }
}
