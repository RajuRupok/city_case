<?php

use Illuminate\Support\Facades\Route;
// case
Route::group([
    'prefix' => 'case', //URL
    'as' => 'case.', //Route
],
    function(){
        Route::get('/all', 'CaseController@index')->name('index');
        Route::get('/new_assigned', 'CaseController@new_assigned')->name('new_assigned');
        Route::get('/completed', 'CaseController@completed')->name('completed');
        Route::get('/canceled', 'CaseController@canceled')->name('canceled');
        Route::get('/all/show/{id}', 'CaseController@show')->name('show');

        Route::post('/cancel/{case_id}', 'CaseController@cancelCase')->name('cancel');
        Route::post('/complete/{case_id}', 'CaseController@completeCase')->name('complete');
    }
);
