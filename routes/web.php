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

Route::get('/', 'HomeController@index')->name('home');


Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@logar')->name('logar');


Route::get('/cadastro', 'ClienteController@create')->name('cadastro');
Route::post('/cadastro', 'ClienteController@store')->name('cadastrar');

Route::get('/produtos', 'ProdutoController@index')->name('produtos');
Route::get('/produtos/{produto}', 'ProdutoController@show')->name('produtos.show');

Route::post('/contato', 'HomeController@enviaContato')->name('contato');

Route::group(['middleware' => 'auth:cliente', 'prefix' => 'cliente'], function() {
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/', 'ClienteController@index')->name('cliente.index');
    Route::get('/meus-dados', 'ClienteController@edit')->name('cliente.edit');
    Route::put('/meus-dados/{cliente}', 'ClienteController@update')->name('cliente.update');

    Route::get('/servicos/horarios-disponiveis/{date}', 'ServicosController@horariosDisponiveis')->name('horarios-disponiveis');
    Route::resource('/servicos', 'ServicosController');
});