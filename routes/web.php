<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServiceFormController;
use App\Http\Controllers\AcknowledgementFormController;

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

Route::middleware(['auth'])->group(function () {
    // Dashboard Route
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // Service Form Routes
    Route::prefix('service-forms')->group(function () {
        Route::get('/', [ServiceFormController::class, 'index'])->name('service.form.index');
        Route::get('/create', [ServiceFormController::class, 'create'])->name('service.form.create');
        Route::post('/', [ServiceFormController::class, 'store'])->name('service.form.store');
    });

    // Typeahead Routes
    Route::prefix('get')->group(function () {
        // Customer Route
        Route::get('/customers/typeahead', [CustomerController::class, 'get'])->name('get.customers');

        // User Route
        Route::get('/engineers/typeahead', [UserController::class, 'getEngineers'])->name('get.engineers');
    }); 
});

// Guest Routes

// Service Form Routes
Route::prefix('service-form/acknowledgement')->group(function () {
    Route::get('/{serviceRequest}/create', [AcknowledgementFormController::class, 'create'])->name('service.form.acknowledgment.create');
    Route::post('/{serviceRequest}', [AcknowledgementFormController::class, 'store'])->name('service.form.acknowledgment.store');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
