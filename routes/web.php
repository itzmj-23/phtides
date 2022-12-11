<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\TidePredictionController;
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

// TIDE PREDICTION ROUTE
Route::get('tide-prediction', [TidePredictionController::class, 'index'])->name('tide_prediction.index');
Route::get('tide-prediction/create', [TidePredictionController::class, 'create'])->name('tide_prediction.create');
Route::post('tide-prediction', [TidePredictionController::class, 'store'])->name('tide_prediction.store');

// LOCATION ROUTE
Route::get('location', [LocationController::class, 'index'])->name('location.index');
Route::get('location/create', [LocationController::class, 'create'])->name('location.create');
Route::post('location', [LocationController::class, 'store'])->name('location.store');
Route::get('location/{id}', [LocationController::class, 'show'])->name('location.show');
Route::put('location/{id}', [LocationController::class, 'update'])->name('location.update');

// API DOC ROUTE
Route::get('api-doc-v1/', [APIController::class, 'index'])->name('api_doc.index');
