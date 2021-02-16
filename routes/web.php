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
    Route::prefix('service-forms')->group(function () {
        Route::get('/', [ServiceFormController::class, 'index'])->name('service.form.index');
        Route::get('/create', [ServiceFormController::class, 'create'])->name('service.form.create');
        Route::post('/', [ServiceFormController::class, 'store'])->name('service.form.store');
        Route::get('/{serviceReport:csr_no}', [ServiceFormController::class, 'show'])->name('service.form.show');
        Route::get('/{serviceReport:csr_no}/edit', [ServiceFormController::class, 'edit'])->name('service.form.edit');
        Route::put('/{serviceReport:csr_no}', [ServiceFormController::class, 'update'])->name('service.form.update');
        Route::delete('/{serviceReport:csr_no}', [ServiceFormController::class, 'destroy'])->name('service.form.destroy');

        Route::get('/{serviceReport:csr_no}/download', [ServiceFormController::class, 'download'])->name('service.form.download');
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

// Acknowledgement Routes
Route::prefix('service-form/acknowledgement')->group(function () {
    Route::get('/{serviceReport}/create', [AcknowledgementFormController::class, 'create'])->name('service.form.acknowledgment.create');
    Route::post('/{serviceReport}', [AcknowledgementFormController::class, 'store'])->name('service.form.acknowledgment.store');
    Route::get('/feedback', [AcknowledgementFormController::class, 'feedback'])->name('service.form.acknowledgment.feedback');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
