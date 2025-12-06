<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\AdminController;

Route::controller(MasterController::class)->group(function () {

    Route::get('/store-user', 'storeUser')->name('auth.register');
    Route::post('/store-login', 'Userlogin')->name('auth.login');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/', 'index')->name('/');

});

Route::controller(AdminController::class)->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/partners', 'dashboard0')->name('admin.partners');
        Route::get('/programs', 'dashboard2')->name('admin.programs');
        Route::get('/partners', 'dashboard3')->name('admin.partners');
        Route::get('/volunteers', 'dashboard4')->name('admin.volunteers');
        Route::get('/blogs', 'dashboard5')->name('admin.blogs');

        // users admin
        Route::post('/users/update', 'update')->name('admin.users.update');
        Route::post('/users/store', 'store')->name('admin.users.store');
        Route::get('/users/delete/{id}', 'destroy');

        // events admin
        Route::post('/events/store', 'storeEvent')->name('admin.events.store');
        Route::post('/events/update', 'updateEvent')->name('admin.events.update');
        Route::get('/events/delete/{id}', 'deleteEvent')->name('events.delete');

        Route::post('/volunteer/store', 'storeVolunteer')->name('volunteer.store');

    
    });

    Route::get('/users', 'adminUsers')->name('admin.users');
    Route::get('/events-admin', 'adminEvents')->name('admin.events');
    Route::get('/dashboard', 'dashboard')->name('admin.dashboard');

});

Route::get('/{page}', [MasterController::class, 'load'])
    ->where('page', '.*');

