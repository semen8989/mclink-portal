<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email:filter',
            'password' => 'required|string'
        ]);
 
        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('MclinkPortalAuthApp')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => '401 Unauthorized'], 401);
        }
    }   
}
