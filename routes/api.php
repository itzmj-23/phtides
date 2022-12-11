<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\TidePredictionController;
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


// ------------- TIDE PREDICTION ---------------
Route::get('/tide_predictions', [TidePredictionController::class, 'apiTidePrediction']);
Route::get('/tide_predictions/{id}', [TidePredictionController::class, 'apiTidePredictionByLocation']);

// ------------- LOCATION --------------------
Route::get('/locations', [LocationController::class, 'apiLocation']);
