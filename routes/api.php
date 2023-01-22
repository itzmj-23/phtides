<?php

use App\Http\Controllers\DownloadablesController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PredictedHourlyHeightsController;
use App\Http\Controllers\PredictedHiLowController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// ------------- PREDICTED HOURLY HEIGHTS ---------------
Route::get('/predicted_hourly_heights/{id}', [PredictedHourlyHeightsController::class, 'apiPredictedHourlyHeightsByLocation']);
Route::get('/predicted_hourly_heights/export/{id}', [PredictedHourlyHeightsController::class, 'apiTestExport']);

// ------------- PREDICTED HI AND LOWS -----------------
Route::get('/predicted_hi_lows/{id}', [PredictedHiLowController::class, 'apiPredictedHiLowsByLocation']);

// ------------- DOWNLOADABLE RESOURCES ----------------
Route::get('/downloads/{id}', [DownloadablesController::class, 'download']);

// ------------- LOCATION --------------------
Route::get('/locations', [LocationController::class, 'apiLocation']);
