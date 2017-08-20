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
Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'EventsController@index');

    Route::group(['prefix' => 'events'], function () {
        Route::get('/', 'EventsController@events');
        Route::post('create', 'EventsController@store');
        Route::get('/{id}/view', 'EventsController@view');
        Route::post('/{id}/update', 'EventsController@update');
        Route::get('/{id}/delete', 'EventsController@destroy');
        Route::post('/complete', 'EventsController@markAsComplete');
    });
});
