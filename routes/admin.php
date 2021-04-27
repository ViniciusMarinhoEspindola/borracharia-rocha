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

    Route::redirect('/', '/admin/users', 301)->name('index');


    // Imagem Pneus
    Route::put('/images-pneus/reorder', 'ImagemPneuController@reorder')->name('imagem-pneus.reorder');
    Route::post('/images-pneus/store/{pneu}', 'ImagemPneuController@store')->name('imagem-pneus.store');
    Route::delete('/images-pneus/delete-images/{id}', 'ImagemPneuController@destroy')->name('imagem-pneus.destroy');

    // Pneus
    Route::resource('/pneus', PneuController::class);

    // Serviços
    Route::resource('/servicos', ServicoController::class);

    // Clientes
    Route::resource('/clientes', ClienteController::class);

    // Contatos
    Route::get('/contatos', 'ContatoController@index')->name('contatos.index');

    // Users
    Route::resource('/users', UserController::class);
});
