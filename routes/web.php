<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController;


Route::controller(MasterController::class)->group(function () {

    Route::get('/user-registration', 'storeUser')->name('auth.register');
    Route::post('/store-login', 'Userlogin')->name('auth.login');
    Route::post('/logout', 'logout')->name('logout');

    Route::get('/dashboard', 'dashboard')->name('admin.dashboard');
    Route::get('/', 'index')->name('/');


});

Route::get('/{page}', [MasterController::class, 'load'])
    ->where('page', '.*');

