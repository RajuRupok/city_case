<?php

use Illuminate\Support\Facades\Route;
// service_manager
Route::group([
    'prefix' => 'service_manager', //URL
    'as' => 'service_manager.', //Route
],
    function(){
        Route::get('/all', 'ServiceManagerController@index')->name('index');
        Route::get('/active', 'ServiceManagerController@active')->name('active');
        Route::get('/inactive', 'ServiceManagerController@inactive')->name('inactive');
        Route::get('/all/show/{id}', 'ServiceManagerController@show')->name('show');

        Route::get('/create', 'ServiceManagerController@create')->name('create');
        Route::post('/store', 'ServiceManagerController@store')->name('store');
    }
);
