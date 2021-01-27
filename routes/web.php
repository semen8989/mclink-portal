<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServiceFormController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

Route::middleware(['auth'])->group(function () {
    // Service Form Routes
    Route::get('/service-forms', [ServiceFormController::class, 'index']);
    Route::get('/service-forms/create', [ServiceFormController::class, 'create']);
    Route::post('/service-forms', [ServiceFormController::class, 'store']);

    // Customer Routes
    Route::get('/get/customers/typeahead', [CustomerController::class, 'get']);
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
