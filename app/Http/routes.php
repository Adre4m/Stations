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
Route::get('/sample_sites', 'SampleSiteController@index')->name('sample_sites.index');
Route::get('/sample_sites/show{sample_site}', 'SampleSiteController@show')->name('sample_sites.show');

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

    Route::get('/sample_sites/create', 'SampleSiteController@create')->name('sample_sites.create');
    Route::post('/sample_sites/store', 'SampleSiteController@store')->name('sample_sites.store');
    Route::get('/sample_sites/edit{sample_site}', 'SampleSiteController@edit')->name('sample_sites.edit');
    Route::post('/sample_sites/update{sample_site}', 'SampleSiteController@update')->name('sample_sites.update');
    Route::get('/sample_sites/destroy{sample_site}', 'SampleSiteController@destroy')->name('sample_sites.destroy');
});