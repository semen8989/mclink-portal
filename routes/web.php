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

    // Service Report Routes
    Route::get('/service-forms/{serviceReport:csr_no}/download', [ServiceFormController::class, 'download'])->name('service-forms.download');  
    Route::resource('service-forms', ServiceFormController::class)->parameters([
        'service-forms' => 'serviceReport:csr_no'
    ]);

    // Typeahead Routes
    Route::prefix('get')->group(function () {
        // Customer Route
        Route::get('/customers/typeahead', [CustomerController::class, 'get'])->name('get.customers');

        // User Route
        Route::get('/engineers/typeahead', [UserController::class, 'getEngineers'])->name('get.engineers');
    });
});

// Guest Routes

// Acknowledgement Routes
Route::prefix('service-form/acknowledgement')->group(function () {
    Route::get('/{serviceReport}/sign', [AcknowledgementFormController::class, 'sign'])->name('service-form.acknowledgment.sign');
    Route::post('/{serviceReport}', [AcknowledgementFormController::class, 'store'])->name('service-form.acknowledgment.store');
    Route::get('/feedback', [AcknowledgementFormController::class, 'feedback'])->name('service-form.acknowledgment.feedback');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
