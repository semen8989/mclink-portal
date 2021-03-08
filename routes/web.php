<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KpiMaingoalController;
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

    // OKR KPI Maingoal Routes
    Route::prefix('performance/okr/kpi-maingoals')->group(function () {
        Route::get('/', [KpiMaingoalController::class, 'index'])->name('performance.okr.kpi-maingoals.index');
        Route::get('/create', [KpiMaingoalController::class, 'create'])->name('performance.okr.kpi-maingoals.create');
        Route::post('/', [KpiMaingoalController::class, 'store'])->name('performance.okr.kpi-maingoals.store');
        Route::get('/{kpiMain}', [KpiMaingoalController::class, 'show'])->name('performance.okr.kpi-maingoals.show');
        Route::get('/{kpiMain}/edit', [KpiMaingoalController::class, 'edit'])->name('performance.okr.kpi-maingoals.edit');
        Route::put('/{kpiMain}', [KpiMaingoalController::class, 'update'])->name('performance.okr.kpi-maingoals.update');
        Route::delete('/{kpiMain}', [KpiMaingoalController::class, 'destroy'])->name('performance.okr.kpi-maingoals.destroy');
    });

    // OKR KPI Variable Routes
    Route::prefix('performance/okr/kpi/variable')->group(function () {
        Route::get('/', [KpiMaingoalController::class, 'index'])->name('performance.okr.kpi.variable.index');
    });

    // OKR KPI Objective Routes
    Route::prefix('performance/okr/kpi/objective')->group(function () {
        Route::get('/', [KpiMaingoalController::class, 'index'])->name('performance.okr.kpi.objective.index');
    });

    // Ajax Routes
    Route::prefix('get')->group(function () {
        // Customer Route
        Route::get('/customers/typeahead', [CustomerController::class, 'get'])->name('get.customers');

        // User Route
        Route::get('/engineers/typeahead', [UserController::class, 'getEngineers'])->name('get.engineers');

        // KPI Main Rating Route
        Route::get('/kpi-maingoals/{kpiMain}/rating', [KpiMaingoalController::class, 'getRating'])->name('get.kpimain.rating');
    }); 
});

// Guest Routes

// Acknowledgement Routes
Route::prefix('service-form/acknowledgement')->group(function () {
    Route::get('/{serviceReport}/sign', [AcknowledgementFormController::class, 'sign'])->name('service.form.acknowledgment.sign');
    Route::post('/{serviceReport}', [AcknowledgementFormController::class, 'store'])->name('service.form.acknowledgment.store');
    Route::get('/feedback', [AcknowledgementFormController::class, 'feedback'])->name('service.form.acknowledgment.feedback');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
