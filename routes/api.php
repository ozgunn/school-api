<?php

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

    Route::group(['middleware' => 'role:admin'], function () {
        Route::resource('users', \App\Http\Controllers\UserController::class);
    });
});


/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
