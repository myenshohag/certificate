<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;

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

Auth::routes();
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::get('user-login', [LoginController::class, 'userLogin'])->name('user-login');



// admin panel 

Route::group([
    'middleware' => ['auth']
], function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('home');
    Route::get('/footer', [App\Http\Controllers\Admin\DashboardController::class, 'footer'])->name('basicSettings');
    Route::get('/basic-settings', [App\Http\Controllers\Admin\DashboardController::class, 'basicSettings'])->name('basicSettings');
    Route::post('/update-settings', [App\Http\Controllers\Admin\BasicSettingsController::class, 'updateSettings'])->name('basicSetting.update');
    Route::get('/student-management', [App\Http\Controllers\Admin\StudentController::class, 'student'])->name('student');
    Route::get('/new-student', [App\Http\Controllers\Admin\StudentController::class, 'createNewStudent'])->name('student.create');
    Route::post('/store-new-student', [App\Http\Controllers\Admin\StudentController::class, 'storeNewStudent'])->name('student.store');
    Route::get('/delete-student/{student}', [App\Http\Controllers\Admin\StudentController::class, 'deleteStudent'])->name('delete.student');
});
