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
Route::get('stations/show{station}', 'StationController@show')->name('stations.show');
Route::get('/contributors', 'ContributorController@index')->name('contributors.index');
Route::get('contributors/show{contributor}', 'ContributorController@show')->name('contributors.show');
//Route::get('/stations/form', function() {
//    $contributors = Contributor::all();
//    return view('stations.form', ['contributors' => $contributors]);
//});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/stations/create', 'StationController@create')->name('stations.create');
    Route::post('/stations/store', 'StationController@store')->name('stations.store');
    Route::get('/stations/edit{station}', 'StationController@edit')->name('stations.edit');
    Route::post('/stations/update{station}', 'StationController@update')->name('stations.update');
    Route::get('/stations/destroy{station}', 'StationController@destroy')->name('stations.destroy');
    Route::get('/contributors/create', 'ContributorController@create')->name('contributors.create');
    Route::post('/contributors/store', 'ContributorController@store')->name('contributors.store');
    Route::get('/contributors/edit{contributor}', 'ContributorController@edit')->name('contributors.edit');
    Route::get('/contributors/update{contributor}', 'ContributorController@update')->name('contributors.update');
    Route::get('/contributors/destroy{contributor}', 'ContributorController@destroy')->name('contributors.destroy');
});