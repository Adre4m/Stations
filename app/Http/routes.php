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

Route::get('/networks', 'NetworkController@index')->name('networks.index');
Route::get('/networks/show{network}', 'NetworkController@show')->name('networks.show');

Route::get('/network_station', 'NetworkStationController@index')->name('network_station.index');
Route::get('/network_station/show{station_network}', 'NetworkStationController@show')->name('network_station.show');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/stations/create', 'StationController@create')->name('stations.create');
    Route::post('/stations/store', 'StationController@store')->name('stations.store');
    Route::get('/stations/edit{station}', 'StationController@edit')->name('stations.edit');
    Route::post('/stations/update{station}', 'StationController@update')->name('stations.update');
    Route::get('/stations/destroy{station}', 'StationController@destroy')->name('stations.destroy');
    Route::get('/stations/import', function () {
        return view('stations.file');
    })->name('stations.import');

    Route::get('/contributors/create', 'ContributorController@create')->name('contributors.create');
    Route::post('/contributors/store', 'ContributorController@store')->name('contributors.store');
    Route::get('/contributors/edit{contributor}', 'ContributorController@edit')->name('contributors.edit');
    Route::post('/contributors/update{contributor}', 'ContributorController@update')->name('contributors.update');
    Route::get('/contributors/destroy{contributor}', 'ContributorController@destroy')->name('contributors.destroy');

    Route::get('/sample_sites/create', 'SampleSiteController@create')->name('sample_sites.create');
    Route::post('/sample_sites/store', 'SampleSiteController@store')->name('sample_sites.store');
    Route::get('/sample_sites/edit{sample_site}', 'SampleSiteController@edit')->name('sample_sites.edit');
    Route::post('/sample_sites/update{sample_site}', 'SampleSiteController@update')->name('sample_sites.update');
    Route::get('/sample_sites/destroy{sample_site}', 'SampleSiteController@destroy')->name('sample_sites.destroy');


    Route::get('/networks/create', 'NetworkController@create')->name('networks.create');
    Route::post('/networks/store', 'NetworkController@store')->name('networks.store');
    Route::get('/networks/edit{network}', 'NetworkController@edit')->name('networks.edit');
    Route::post('/networks/update{network}', 'NetworkController@update')->name('networks.update');
    Route::get('/networks/destroy{network}', 'NetworkController@destroy')->name('networks.destroy');

    Route::get('/network_station/create', 'NetworkStationController@create')->name('network_station.create');
    Route::post('/network_station/store', 'NetworkStationController@store')->name('network_station.store');
    Route::get('/network_station/edit{station_network}', 'NetworkStationController@edit')->name('network_station.edit');
    Route::post('/network_station/update{station_network}', 'NetworkStationController@update')->name('network_station.update');
    Route::get('/network_station/destroy{station_network}', 'NetworkStationController@destroy')->name('network_station.destroy');
});