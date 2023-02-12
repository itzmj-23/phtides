<?php

use App\Http\Controllers\DownloadablesController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PredictedHourlyHeightsController;
use App\Http\Controllers\PredictedHiLowController;
use App\Http\Controllers\SunriseSunsetController;
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
Route::get('/downloads/locations/hourly-heights/primary', [DownloadablesController::class, 'primaryHourlyHeightsLoc']);
Route::get('/downloads/locations/hourly-heights/secondary', [DownloadablesController::class, 'secondaryHourlyHeightsLoc']);
Route::get('/downloads/locations/hi-low/primary', [DownloadablesController::class, 'primaryHiLowLoc']);
Route::get('/downloads/locations/hi-low/secondary', [DownloadablesController::class, 'secondaryHiLowLoc']);
Route::get('/downloads/locations/{id}/{collection_name}', [DownloadablesController::class, 'locationDownloadables']);

Route::get('/downloads/locations/astronomical', [DownloadablesController::class, 'astronomical']);

Route::get('/downloads/{id}/{collection_name}/{timeframe}', [DownloadablesController::class, 'download'])->name('downloads');

// ------------- LOCATION --------------------
Route::get('/locations', [LocationController::class, 'apiLocation']);
Route::get('/locations/{id}', [LocationController::class, 'apiLocationByID']);


// ------------- SUNRISE SUNSET --------------------
Route::get('/sunrise-sunset/{id}', [SunriseSunsetController::class, 'apiSunriseSunsetByLocation']);
