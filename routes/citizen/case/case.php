<?php

use Illuminate\Support\Facades\Route;
// Dashboard
Route::group([
    'prefix' => 'case', //URL
    'as' => 'case.', //Route
],
    function(){
        Route::get('/', 'CaseController@index')->name('index');
        Route::get('/create', 'CaseController@create')->name('create');
        Route::get('/details/{case_id}', 'CaseController@show')->name('show');
    }
);
