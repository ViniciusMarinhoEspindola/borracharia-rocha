<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');


Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@logar')->name('logar');


Route::get('/cadastro', 'ClienteController@create')->name('cadastro');
Route::post('/cadastro', 'ClienteController@store')->name('cadastrar');

Route::group(['middleware' => 'auth:cliente'], function() {
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/cliente', 'ClienteController@index')->name('cliente.index');
});