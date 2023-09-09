<?php

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
Route::group(['middleware' => 'throttle:5'], function () {
    Route::get('test',  [\App\Http\Controllers\AuthController::class, 'test']);
    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');
    Route::post('reset-password', [\App\Http\Controllers\AuthController::class, 'resetPassword'])->name('password.reset');
    Route::get('reset-password-confirm', [\App\Http\Controllers\AuthController::class, 'resetPasswordConfirm']);
    Route::post('reset-password-confirm', [\App\Http\Controllers\AuthController::class, 'resetPasswordConfirm']);
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('profile',  [\App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
    Route::put('profile',  [\App\Http\Controllers\AuthController::class, 'update'])->name('profile-update');
    Route::resource('schools', \App\Http\Controllers\SchoolController::class);
    Route::post('schools/{id}/users', [\App\Http\Controllers\SchoolController::class, 'userAdd'])->name('user-add');

    Route::group(['middleware' => 'role:admin'], function () {
        Route::resource('users', \App\Http\Controllers\UserController::class);
        Route::resource('company', \App\Http\Controllers\CompanyController::class);
        Route::post('company/{id}/users', [\App\Http\Controllers\CompanyController::class, 'userAdd'])->name('user-add');
    });
});


/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
