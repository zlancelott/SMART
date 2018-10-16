<?php

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

Route::get('/', function () {
    return redirect('login');
});

Route::group(['middleware' => ['auth']], function() {
    
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/operation', 'OperationController@index')->name('operation');

    // TODO: Criar middleare que verifica o perfil do usuário logado
    Route::group(['middleware' => ['admin']], function() {

        Route::resource('user', 'UserController');
        Route::resource('station', 'StationController');
        Route::resource('profile', 'ProfileController');

    });

});

Auth::routes();

