<?php

use App\Http\Controllers\Api\HelperController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\Api\RegisterController;
  
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
  
Route::post('signup_account', [RegisterController::class, 'signup_account']);
Route::post('login', [RegisterController::class, 'login']);
Route::post('forgot-password', [RegisterController::class, 'changePassword']);

Route::get('upazilas', [HelperController::class, 'upazilas']);
Route::post('get-unions/', [HelperController::class, 'unions']);
Route::get('designations', [HelperController::class, 'designations']);

Route::middleware('auth:api')->group( function () {
    Route::post('edit/profile', [RegisterController::class, 'updateProfile'])->name('updateProfile');
    Route::get('check-attendance', [RegisterController::class, 'todaysAttendance'])->name('todaysAttendance');
    Route::get('punch/success ', [RegisterController::class, 'storeAttendance'])->name('storeAttendance');
});