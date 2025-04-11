<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::inertia('/','Dashboard')->name('dashboard');
    Route::inertia('/settings','Settings')->name('settings');
    Route::post('/settings/updateAvatar',[UserController::class,'updateAvatar'])->name('settings.updateAvatar');

    Route::post('logout',[UserController::class,'logout'])->name('logout');
});

Route::group(['middleware' => ['guest']], function () {

    Route::inertia('/register','Auth/Register')->name('register');
    Route::post('/register',[UserController::class, 'register']);

    Route::inertia('/login','Auth/Login')->name('login');
    Route::post('/login',[UserController::class, 'login']);

});
