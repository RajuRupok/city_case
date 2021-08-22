<?php

use Illuminate\Support\Facades\Route;
// category
Route::group([
    'prefix' => 'category', //URL
    'as' => 'category.', //Route
],
    function(){
        Route::get('/all', 'CategoryController@index')->name('index');
        Route::get('/active', 'CategoryController@active')->name('active');
        Route::get('/inactive', 'CategoryController@inactive')->name('inactive');
        Route::get('/all/show/{id}', 'CategoryController@show')->name('show');

        Route::get('/create', 'CategoryController@create')->name('create');
        Route::post('/store', 'CategoryController@store')->name('store');

        Route::get('/all/edit/{id}', 'CategoryController@edit')->name('edit');
        Route::post('/update/{id}', 'CategoryController@update')->name('update');
        
        Route::get('/status/{id}/{status}', 'CategoryController@status')->name('status');
    }
);
