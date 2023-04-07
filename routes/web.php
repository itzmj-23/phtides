<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\DownloadablesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PredictedHiLowController;
use App\Http\Controllers\PredictedHourlyHeightsController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\SunriseSunsetController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DateRangeController;
use App\Http\Controllers\UserManualController;

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

// ----------------- AUTH ROUTES ------------------------------

Auth::routes(['verify' => true]);

// -------------------------------------------------------------------


//Route::get('/', [HomeController::class, 'index']);
Route::get('/', function () {
    return view('index');
})->middleware(['auth', 'verified']);


// PREDICTED HOURLY HEIGHTS
Route::get('predicted-hourly-heights', [PredictedHourlyHeightsController::class, 'index'])->name('predicted_hourly_heights.index');
Route::get('predicted-hourly-heights/create', [PredictedHourlyHeightsController::class, 'create'])->name('predicted_hourly_heights.create');
Route::post('predicted-hourly-heights', [PredictedHourlyHeightsController::class, 'store'])->name('predicted_hourly_heights.store');
Route::match(['get', 'post'],'predicted-hourly-heights/removal-data', [PredictedHourlyHeightsController::class, 'removalData'])->name('predicted_hourly_heights.removalData');
Route::post('predicted-hourly-heights/submit-removal-data', [PredictedHourlyHeightsController::class, 'submitRemovalData'])->name('predicted_hourly_heights.submitRemovalData');

// PREDICTED HI & LOW WATERS
Route::get('predicted-hi-lows', [PredictedHiLowController::class, 'index'])->name('predicted_hi_lows.index');
Route::get('predicted-hi-lows/create', [PredictedHiLowController::class, 'create'])->name('predicted_hi_lows.create');
Route::post('predicted-hi-lows', [PredictedHiLowController::class, 'store'])->name('predicted_hi_lows.store');
Route::get('predicted-hi-lows/{id}/edit', [PredictedHiLowController::class, 'edit'])->name('predicted_hi_lows.edit');
Route::put('predicted-hi-lows/{id}', [PredictedHiLowController::class, 'update'])->name('predicted_hi_lows.update');
Route::delete('predicted-hi-lows/{id}', [PredictedHiLowController::class, 'destroy'])->name('predicted_hi_lows.destroy');
Route::match(['get', 'post'],'predicted-hi-lows/removal-data', [PredictedHiLowController::class, 'removalData'])->name('predicted_hi_lows.removalData');
Route::post('predicted-hi-lows/submit-removal-data', [PredictedHiLowController::class, 'submitRemovalData'])->name('predicted_hi_lows.submitRemovalData');

// LOCATION ROUTE
Route::get('location', [LocationController::class, 'index'])->name('location.index');
Route::get('location/create', [LocationController::class, 'create'])->name('location.create');
Route::post('location', [LocationController::class, 'store'])->name('location.store');
Route::get('location/{id}', [LocationController::class, 'show'])->name('location.show');
Route::put('location/{id}', [LocationController::class, 'update'])->name('location.update');
Route::delete('location/{id}', [LocationController::class, 'destroy'])->name('location.destroy');

// SUNRISE SUNSET ROUTE
Route::get('sunrise-sunset', [SunriseSunsetController::class, 'index'])->name('sunrise-sunset.index');
Route::get('sunrise-sunset/create', [SunriseSunsetController::class, 'create'])->name('sunrise-sunset.create');
Route::post('sunrise-sunset', [SunriseSunsetController::class, 'store'])->name('sunrise-sunset.store');
Route::match(['get', 'post'], 'sunrise-sunset/removal-data', [SunriseSunsetController::class, 'removalData'])->name('sunrise-sunset.removalData');
Route::post('sunrise-sunset/submit-removal-data', [SunriseSunsetController::class, 'submitRemovalData'])->name('sunrise-sunset.submitRemovalData');

// DATE RANGE
Route::get('date-range/', [DateRangeController::class, 'index'])->name('date-range.index');
Route::post('date-range/', [DateRangeController::class, 'update'])->name('date-range.update');

// USER MANUAL
Route::get('user-manual/', [UserManualController::class, 'index'])->name('userManual.index');
Route::get('user-manual/create', [UserManualController::class, 'create'])->name('userManual.create');
Route::post('user-manual/', [UserManualController::class, 'store'])->name('userManual.store');
Route::get('user-manual/{id}', [UserManualController::class, 'show'])->name('userManual.show');
Route::get('user-manual/{id}/edit', [UserManualController::class, 'edit'])->name('userManual.edit');
Route::post('user-manual/{id}', [UserManualController::class, 'update'])->name('userManual.update');
Route::delete('user-manual/{id}', [UserManualController::class, 'destroy'])->name('userManual.destroy');

// PRIVACY POLICY
Route::get('privacy-policy', [PrivacyPolicyController::class, 'index'])->name('privacyPolicy.index');
Route::get('privacy-policy/create', [PrivacyPolicyController::class, 'create'])->name('privacyPolicy.create');
Route::post('privacy-policy', [PrivacyPolicyController::class, 'store'])->name('privacyPolicy.store');
Route::get('privacy-policy/{id}/edit', [PrivacyPolicyController::class, 'edit'])->name('privacyPolicy.edit');
Route::post('privacy-policy/{id}', [PrivacyPolicyController::class, 'update'])->name('privacyPolicy.update');


// DOWNLOADABLES ROUTE
Route::get('downloads', [DownloadablesController::class, 'index'])->name('downloads.index');
Route::get('downloads/create', [DownloadablesController::class, 'create'])->name('downloads.create');
Route::post('downloads', [DownloadablesController::class, 'store'])->name('downloads.store');
Route::get('downloads/{id}/show', [DownloadablesController::class, 'show'])->name('downloads.show');
Route::get('downloads/{id}/edit', [DownloadablesController::class, 'edit'])->name('downloads.edit');
Route::get('downloads/{id}/edit/show-uploaded-pdf', [DownloadablesController::class, 'showUploadedPDF'])->name('downloads.edit.showUploadedPDF');
Route::put('downloads/{id}', [DownloadablesController::class, 'update'])->name('downloads.update');
Route::delete('downloads/{id}', [DownloadablesController::class, 'destroy'])->name('downloads.destroy');

Route::get('downloads/{id}', [DownloadablesController::class, 'download'])->name('downloads.resources');

// API DOC ROUTE
Route::get('api-doc-v1/', [APIController::class, 'index'])->name('api_doc.index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
