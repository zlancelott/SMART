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
    
    Route::get('my-profile', 'MyProfileController@index')->name('my-profile.index');
    Route::put('my-profile/{id}', 'MyProfileController@update')->name('my-profile.update');

    // TODO: É preciso adaptar esse middleware para verificar se a página X pode ser acessada
    Route::group(['middleware' => ['permission']], function() {
        Route::resource('user', 'UserController');
        Route::resource('station', 'StationController');
        Route::get('profile', 'ProfileController@index')->name('profile.index');
        Route::resource('page', 'PageController');
    });

});

Auth::routes();

