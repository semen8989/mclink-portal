<?php

use App\Http\Controllers\AnnouncementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DepartmentController;

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
    return view('dashboard')->with('title',__('label.home'));
})->middleware('auth');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Resource Controllers
Route::resources([
    'companies' => CompanyController::class,
    'departments' => DepartmentController::class,
    'announcements' => AnnouncementController::class
]);
//Department Data
Route::post('/announcements/fetch_department', [AnnouncementController::class,'fetch_department'])->name('fetch_department');