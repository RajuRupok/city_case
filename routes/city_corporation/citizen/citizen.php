<?php

use Illuminate\Support\Facades\Route;
// citizen
Route::group([
    'prefix' => 'citizen', //URL
    'as' => 'citizen.', //Route
],
    function(){
        Route::get('/all', 'CitizenController@index')->name('index');
        Route::get('/approved', 'CitizenController@approved')->name('approved');
        Route::get('/banned', 'CitizenController@banned')->name('banned');
        Route::get('/all/show/{id}', 'CitizenController@show')->name('show');

        Route::get('/status/{id}/{status}', 'CitizenController@status')->name('status');
    }
);
