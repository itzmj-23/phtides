<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\DownloadablesController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PredictedHiLowController;
use App\Http\Controllers\PredictedHourlyHeightsController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});

// PREDICTED HOURLY HEIGHTS
Route::get('predicted-hourly-heights', [PredictedHourlyHeightsController::class, 'index'])->name('predicted_hourly_heights.index');
Route::get('predicted-hourly-heights/create', [PredictedHourlyHeightsController::class, 'create'])->name('predicted_hourly_heights.create');
Route::post('predicted-hourly-heights', [PredictedHourlyHeightsController::class, 'store'])->name('predicted_hourly_heights.store');

// PREDICTED HI & LOW WATERS
Route::get('predicted-hi-lows', [PredictedHiLowController::class, 'index'])->name('predicted_hi_lows.index');
Route::get('predicted-hi-lows/create', [PredictedHiLowController::class, 'create'])->name('predicted_hi_lows.create');
Route::post('predicted-hi-lows', [PredictedHiLowController::class, 'store'])->name('predicted_hi_lows.store');

// LOCATION ROUTE
Route::get('location', [LocationController::class, 'index'])->name('location.index');
Route::get('location/create', [LocationController::class, 'create'])->name('location.create');
Route::post('location', [LocationController::class, 'store'])->name('location.store');
Route::get('location/{id}', [LocationController::class, 'show'])->name('location.show');
Route::put('location/{id}', [LocationController::class, 'update'])->name('location.update');

// DOWNLOADABLES ROUTE
Route::get('downloads', [DownloadablesController::class, 'index'])->name('downloads.index');
Route::get('downloads/create', [DownloadablesController::class, 'create'])->name('downloads.create');
Route::post('downloads', [DownloadablesController::class, 'store'])->name('downloads.store');

// API DOC ROUTE
Route::get('api-doc-v1/', [APIController::class, 'index'])->name('api_doc.index');
