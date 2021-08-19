<?php

use Illuminate\Support\Facades\Route;
// Dashboard
Route::group([
    'prefix' => 'profile', //URL
    'as' => 'profile.', //Route
],
    function(){
        Route::get('/', 'ProfileController@index')->name('index');
        Route::get('/edit', 'ProfileController@edit')->name('edit');
    }
);
