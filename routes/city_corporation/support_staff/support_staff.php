<?php

use Illuminate\Support\Facades\Route;
// support_staff
Route::group([
    'prefix' => 'support_staff', //URL
    'as' => 'support_staff.', //Route
],
    function(){
        Route::get('/all', 'SupportStaffController@index')->name('index');
        Route::get('/active', 'SupportStaffController@active')->name('active');
        Route::get('/inactive', 'SupportStaffController@inactive')->name('inactive');
        Route::get('/all/show/{id}', 'SupportStaffController@show')->name('show');

        Route::get('/create', 'SupportStaffController@create')->name('create');
        Route::post('/store', 'SupportStaffController@store')->name('store');
    }
);
