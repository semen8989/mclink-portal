<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FetchController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HrCalendarController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\OfficeShiftController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServiceFormController;
use App\Http\Controllers\AcknowledgementFormController;


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
    Route::get('/{serviceReport}/sign', [AcknowledgementFormController::class, 'sign'])->name('service.form.acknowledgment.sign');
    Route::post('/{serviceReport}', [AcknowledgementFormController::class, 'store'])->name('service.form.acknowledgment.store');
    Route::get('/feedback', [AcknowledgementFormController::class, 'feedback'])->name('service.form.acknowledgment.feedback');
});

Route::prefix('auth')->group(function () {
    Route::get('/google', [SocialiteController::class, 'index'])->name('socialite.index');
    Route::get('/callback', [socialiteController::class, 'callBack']);
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Resource Controllers
Route::prefix('organizations')->group(function () {
    Route::resources([
        'companies' => CompanyController::class,
        'departments' => DepartmentController::class,
        'designations' => DesignationController::class,
        'announcements' => AnnouncementController::class,
        'policies' => PolicyController::class,
        'holidays' => HolidayController::class,
        'locations' => LocationController::class,
        'office_shifts' => OfficeShiftController::class,
        'expenses' => ExpenseController::class
    ]); 
});
//HR Calendar Events Route
Route::prefix('hr_calendar')->group(function (){
    Route::get('/',[HrCalendarController::class, 'index'])->name('hr_calendar');
    Route::get('/fetch_events',[HrCalendarController::class,'fetch_events'])->name('hr_calendar.fetch_events');
    Route::post('/store_event',[HrCalendarController::class, 'store_event'])->name('hr_calendar.store_event');
    Route::post('/view_event/{event}',[HrCalendarController::class, 'view_event'])->name('hr_calendar.view_event');
});

Route::post('/fetch_department', [FetchController::class,'fetch_department'])->name('fetch_department');
Route::get('/expenses/downloadFile/{expense}', [ExpenseController::class,'downloadFile'])->name('downloadFile');
//Basic Routes
Route::post('/fetch_department', [FetchController::class,'fetch_department'])->name('fetch_department');
Route::post('/fetch_user', [FetchController::class,'fetch_user'])->name('fetch_user');
Route::get('/expenses/downloadFile/{expense}', [ExpenseController::class,'downloadFile'])->name('downloadFile');
