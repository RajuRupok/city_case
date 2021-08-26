<?php

use Illuminate\Support\Facades\Route;
// case
Route::group([
    'prefix' => 'case', //URL
    'as' => 'case.', //Route
],
    function(){
        Route::get('/all', 'CaseController@index')->name('index');
        Route::get('/pending', 'CaseController@pending')->name('pending');
        Route::get('/running', 'CaseController@running')->name('running');
        Route::get('/completed', 'CaseController@completed')->name('completed');
        Route::get('/canceled', 'CaseController@canceled')->name('canceled');
        Route::get('/all/show/{id}', 'CaseController@show')->name('show');

        Route::post('/assign/{case_id}', 'CaseController@assignSupportStaff')->name('assign');
        Route::get('/cancel/{case_id}', 'CaseController@cancelCase')->name('cancel');
    }
);
