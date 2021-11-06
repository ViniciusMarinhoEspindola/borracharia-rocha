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

    // Pneus
    Route::delete('/anuncios', 'AnuncioController@destroy')->name('anuncios.destroy');
    Route::put('/anuncios', 'AnuncioController@update')->name('anuncios.update');
    Route::resource('/anuncios', AnuncioController::class)->except('destroy', 'update');

    // Serviços
    Route::resource('/servicos', ServicoController::class);

    // Clientes
    Route::resource('/clientes', ClienteController::class);

    // Agenda
    Route::group(['prefix' => 'agenda'], function() {
        Route::group(['prefix' => 'agendamentos', 'as' => 'agendamentos.'], function() {
            Route::get('/', 'AgendamentoController@index')->name('index');
            Route::get('/comprovante/{agendamento}', 'AgendamentoController@comprovante')->name('comprovante');
            Route::get('/finish/{agendamento}', 'AgendamentoController@finish')->name('finish');
            Route::get('/destroy/{agendamento}', 'AgendamentoController@destroy')->name('destroy');
        });

        Route::group(['prefix' => 'disponibilidade', 'as' => 'disponibilidade.'], function() {
            Route::get('/', 'DisponibilidadeController@index')->name('index');
            Route::put('/{dia_semana}', 'DisponibilidadeController@toggleFuncionamento')->name('toggle');
            Route::post('/{dia_semana}', 'DisponibilidadeController@addHorario')->name('add.horario');
        });
    });

    // Contatos
    Route::get('/contatos', 'ContatoController@index')->name('contatos.index');

    // Users
    Route::resource('/users', UserController::class);
});
