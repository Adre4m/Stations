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

Route::get('/', 'HomeController@welcome')->name('index');

Route::auth();

Route::get('/home', 'HomeController@index')->name('home');

// Station
Route::group(['as' => 'stations.', 'prefix' => 'stations'], function () {
    Route::get('/', 'StationController@index')->name('index');
    Route::get('show{station}', 'StationController@show')->name('show');
    Route::get('export_to_csv', 'StationController@exportToCsv')->name('exportToCsv');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('create', 'StationController@create')->name('create');
        Route::post('store', 'StationController@store')->name('store');
        Route::get('edit/{station}', 'StationController@edit')->name('edit');
        Route::post('update{station}', 'StationController@update')->name('update');
        Route::get('destroy{station}', 'StationController@destroy')->name('destroy');
    });
});

// Contributor
Route::group(['as' => 'contributors.', 'prefix' => 'contributors'], function () {
    Route::get('/', 'ContributorController@index')->name('index');
    Route::get('show{contributor}', 'ContributorController@show')->name('show');
    Route::get('export_to_csv', 'ContributorController@exportToCsv')->name('exportToCsv');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('create', 'ContributorController@create')->name('create');
        Route::post('store', 'ContributorController@store')->name('store');
        Route::get('edit{contributor}', 'ContributorController@edit')->name('edit');
        Route::post('update{contributor}', 'ContributorController@update')->name('update');
        Route::get('destroy{contributor}', 'ContributorController@destroy')->name('destroy');
    });
});

// Sample site
Route::group(['as' => 'sample_sites.', 'prefix' => 'sample_sites'], function () {
    Route::get('/', 'SampleSiteController@index')->name('index');
    Route::get('show{sample_site}', 'SampleSiteController@show')->name('show');
    Route::get('export_to_csv', 'SampleSiteController@exportToCsv')->name('exportToCsv');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('create', 'SampleSiteController@create')->name('create');
        Route::post('store', 'SampleSiteController@store')->name('store');
        Route::get('edit{sample_site}', 'SampleSiteController@edit')->name('edit');
        Route::post('update{sample_site}', 'SampleSiteController@update')->name('update');
        Route::get('destroy{sample_site}', 'SampleSiteController@destroy')->name('destroy');
    });
});

// Network
Route::group(['as' => 'networks.', 'prefix' => 'networks'], function () {
    Route::get('/', 'NetworkController@index')->name('index');
    Route::get('show{network}', 'NetworkController@show')->name('show');
    Route::get('export_to_csv', 'NetworkController@exportToCsv')->name('exportToCsv');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('create', 'NetworkController@create')->name('create');
        Route::post('store', 'NetworkController@store')->name('store');
        Route::get('edit{network}', 'NetworkController@edit')->name('edit');
        Route::post('update{network}', 'NetworkController@update')->name('update');
        Route::get('destroy{network}', 'NetworkController@destroy')->name('destroy');
    });
});

// Network station
Route::group(['as' => 'network_station.', 'prefix' => 'network_station'], function () {
    Route::get('/', 'NetworkStationController@index')->name('index');
    Route::get('show{station_network}', 'NetworkStationController@show')->name('show');
    Route::get('export_to_csv', 'NetworkStationController@exportToCsv')->name('exportToCsv');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('create', 'NetworkStationController@create')->name('create');
        Route::post('store', 'NetworkStationController@store')->name('store');
        Route::get('edit{network_station}', 'NetworkStationController@edit')->name('edit');
        Route::post('update{network_station}', 'NetworkStationController@update')->name('update');
        Route::get('destroy{network_station}', 'NetworkStationController@destroy')->name('destroy');
    });
});