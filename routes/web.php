<?php

use App\Http\Controllers\TradeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::inertia('/','Dashboard')->name('dashboard');
    Route::inertia('/settings','Settings')->name('settings');
    Route::post('/settings/update/avatar',[UserController::class,'updateAvatar'])->name('settings.update.avatar');
    Route::post('settings/update/balance',[UserController::class,'updateBalance'])->name('settings.update.balance');
    Route::post('logout',[UserController::class,'logout'])->name('logout');

    //trade routes
    Route::get('/trades/show',[TradeController::class,'show'])->name('trades.show');
});

Route::group(['middleware' => ['guest']], function () {

    Route::inertia('/register','Auth/Register')->name('register');
    Route::post('/register',[UserController::class, 'register']);

    Route::inertia('/login','Auth/Login')->name('login');
    Route::post('/login',[UserController::class, 'login']);

});
