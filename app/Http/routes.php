<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::auth();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/stations', 'StationController@index')->name('stations.index');
Route::get('stations/show{code}', 'StationController@show')->name('stations.show');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/stations/create', 'StationController@create')->name('stations.create');
    Route::post('/stations/store', 'StationController@store')->name('stations.store');
    Route::get('/stations/edit{code}', 'StationController@edit')->name('stations.edit');
    Route::post('/stations/update{code}', 'StationController@update')->name('stations.update');
    Route::post('/stations/destroy{code}', 'StationController@destroy')->name('stations.destroy');
});