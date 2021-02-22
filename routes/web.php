<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialiteController;


Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

Route::prefix('auth')->group(function () {
    Route::get('/google', [SocialiteController::class, 'index'])->name('socialite.index');
    Route::get('/callback', [socialiteController::class, 'callBack']);
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
