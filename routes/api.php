<?php

use App\Http\Controllers\FirebasePushController;
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
    Route::put('profile/device',  [\App\Http\Controllers\AuthController::class, 'device'])->name('profile-device');
    Route::get('schools', [\App\Http\Controllers\SchoolController::class, 'index'])->name('schools');
    Route::get('schools/{id}', [\App\Http\Controllers\SchoolController::class, 'show'])->name('school');
    Route::get('students', [\App\Http\Controllers\StudentController::class, 'index'])->name('students');
    Route::get('students/{id}', [\App\Http\Controllers\StudentController::class, 'show'])->name('student');
    Route::get('daily/{date}', [\App\Http\Controllers\DailyController::class, 'daily'])->name('daily');
    Route::get('daily-all/{year}-{month}', [\App\Http\Controllers\DailyController::class, 'dailyAll'])->name('daily.all');
    Route::post('daily/{id}', [\App\Http\Controllers\DailyController::class, 'approve'])->name('daily.approve');
    Route::get('announcements', [\App\Http\Controllers\AnnouncementController::class, 'index'])->name('announcements');
    Route::get('announcements/{id}', [\App\Http\Controllers\AnnouncementController::class, 'show'])->name('announcement');
    Route::get('foods', [\App\Http\Controllers\FoodMenuController::class, 'index'])->name('food-menu');
    Route::get('foods/{date}', [\App\Http\Controllers\FoodMenuController::class, 'show'])->name('food-menu.date');
    Route::get('school-bus', [\App\Http\Controllers\BusController::class, 'index'])->name('buses');
    Route::get('school-bus/{time}', [\App\Http\Controllers\BusController::class, 'index'])->name('buses.time');
    Route::get('messages/school', [\App\Http\Controllers\MessageController::class, 'school'])->name('messages.school');
    Route::get('messages/teacher', [\App\Http\Controllers\MessageController::class, 'teacher'])->name('messages.teacher');
    Route::post('messages/school', [\App\Http\Controllers\MessageController::class, 'schoolStore'])->name('messages.school.store');
    Route::post('messages/teacher', [\App\Http\Controllers\MessageController::class, 'teacherStore'])->name('messages.teacher.store');
    Route::get('pdfs/parent', [\App\Http\Controllers\FilesController::class, 'parent'])->name('pdfs.parent');
    Route::get('pdfs/group', [\App\Http\Controllers\FilesController::class, 'group'])->name('pdfs.group');
    Route::get('media', [\App\Http\Controllers\MediaController::class, 'index'])->name('media');
    Route::get('media/{id}', [\App\Http\Controllers\MediaController::class, 'show'])->name('media.show');

    Route::post('setToken', [FirebasePushController::class, 'setToken'])->name('firebase.token');
    Route::post('notification', [FirebasePushController::class, 'notification'])->name('firebase.notification');

    /*    Route::group(['middleware' => 'role:100'], function () {
            Route::resource('users', \App\Http\Controllers\UserController::class);
            Route::resource('company', \App\Http\Controllers\CompanyController::class);
            Route::post('company/{id}/users', [\App\Http\Controllers\CompanyController::class, 'userAdd'])->name('user-add');
            Route::post('schools/{id}/users', [\App\Http\Controllers\SchoolController::class, 'userAdd'])->name('user-add');
        });*/
    Route::group([
        'middleware' => 'role:50',
        'prefix' => 'admin',
        'as' => 'admin.',
    ], function () {
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        Route::resource('schools', \App\Http\Controllers\Admin\SchoolController::class);
        Route::post('schools/{id}/users', [\App\Http\Controllers\Admin\SchoolController::class, 'userAdd'])->name('user-add');
    });
});



/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
