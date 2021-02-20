<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FetchController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\OfficeShiftController;
use App\Http\Controllers\AnnouncementController;

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
    return view('dashboard')->with('title',__('label.dashboard'));
})->middleware('auth');

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
//Basic Routes
Route::post('/fetch_department', [FetchController::class,'fetch_department'])->name('fetch_department');
Route::post('/fetch_user', [FetchController::class,'fetch_user'])->name('fetch_user');
Route::get('/expenses/downloadFile/{expense}', [ExpenseController::class,'downloadFile'])->name('downloadFile');