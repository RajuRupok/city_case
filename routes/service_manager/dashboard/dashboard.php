<?php
// Dashboard
Route::group([
    'prefix' => '', //URL
    'as' => 'dashboard.', //Route
],
    function(){
        Route::get('/', 'DashboardController@index')->name('index');
    }
);
