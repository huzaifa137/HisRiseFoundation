<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\AdminController;

Route::controller(MasterController::class)->group(function () {

    Route::post('/store-login', 'Userlogin')->name('auth.login');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/', 'index')->name('/');
});

Route::controller(AdminController::class)->group(function () {

    Route::group(['middleware' => ['AdminAuth']], function () {
        
        Route::prefix('admin')->group(function () {

            Route::post('/users/update', 'update')->name('admin.users.update');
            Route::post('/users/store', 'store')->name('admin.users.store');
            Route::get('/users/delete/{id}', 'destroy');

            Route::post('/events/store', 'storeEvent')->name('admin.events.store');
            Route::post('/events/update', 'updateEvent')->name('admin.events.update');
            Route::post('/volunteer/store', 'storeVolunteer')->name('volunteer.store');
            Route::post('/partner/store', 'storePartner')->name('partner.store');

            Route::get('/volunteers/delete/{id}', 'deleteVolunteer');
            Route::get('/partners/delete/{id}', 'deletePartner');
            Route::get('/events/delete/{id}', 'deleteEvent')->name('events.delete');


            Route::post('/programs/store', 'storePrograms')->name('admin.programs.store');
            Route::post('/programs/update', 'updatePrograms')->name('admin.programs.update');
            Route::get('/programs/delete/{id}', 'deletePrograms')->name('admin.programs.delete');

        });

        Route::get('/dashboard', 'dashboard')->name('admin.dashboard');
        Route::get('/users', 'adminUsers')->name('admin.users');
        Route::get('/volunteers-admin', 'adminVolunteers')->name('admin.volunteers');
        Route::get('/partners-admin', 'adminPartners')->name('admin.partners');
        Route::get('/events-admin', 'adminEvents')->name('admin.events');
        Route::get('/programs-admin', 'adminPrograms')->name('admin.programs');
        Route::get('/blogs-admin', 'adminBlogs')->name('admin.blogs');

        Route::post('/program', action: 'programDetails')
            ->name('program.details');

        Route::post('/blog', 'blogDetails')
            ->name('blog.details');

        Route::post('/blog-details', action: 'blogDetails')
            ->name('blog.details');

        Route::post('/blogs/store', 'storeBlog')->name('admin.blogs.store');
        Route::post('/blogs/update', 'updateBlog')->name('admin.blogs.update');
        Route::get('/blogs/delete/{id}', 'deleteBlog')->name('admin.blogs.delete');

    });
});

Route::get('/{page}', [MasterController::class, 'load'])
    ->where('page', '.*');

