<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
|
*/

// Authentication
Route::group(['prefix' => 'auth', 'namespace' => 'Auth', 'as' => 'auth.'], function() {
    // Login
    Route::get('/', 'LoginController@login')->name('login');
    Route::post('/', 'LoginController@logar')->name('logar');

    // Logout
    Route::get('/logout', 'LoginController@logout')->name('logout');

    // Forgot Password
    Route::group(['prefix' => 'forgot-password'], function() {
        Route::get('/', 'ForgotPasswordController@passwordResets')->name('forgot-password');
        Route::post('/', 'ForgotPasswordController@sendPasswordResets')->name('forgot-password');

        Route::get('/reset', 'ForgotPasswordController@resetPassword')->name('password_resets.with_token');
        Route::post('/reset', 'ForgotPasswordController@storeResetPassword')->name('password_resets.with_token');
    });
});


// Admin
Route::group(['as' => 'admin.', 'middleware' => 'auth'], function() {

    Route::redirect('/', '/admin/users', 301);

    // Users
    Route::resource('/users', UserController::class);
});
