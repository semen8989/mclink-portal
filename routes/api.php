<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MainKpiController;
use App\Http\Controllers\Api\KpiRatingController;
use App\Http\Controllers\Api\VariableKpiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Api auth
Route::post('login', [AuthController::class, 'login']);

//Main KPI
Route::middleware('auth:api')->prefix('v1/')->group(function () {
    Route::apiResource('mains', MainKpiController::class);
    Route::put('mains/rating/{kpiMain}', [KpiRatingController::class, 'update']);

    Route::apiResource('variables', VariableKpiController::class);
});
