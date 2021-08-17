<?php

// citizen Routes
Route::group([
    'prefix' => 'citizen', // URL
    'as' => 'citizen.', // Route
    'namespace' => 'Citizen', // Controller
],
    function(){
        /* ==================================
        ============< Dashboard >============
        ===================================*/
        // Dashboard
        include_once 'dashboard/dashboard.php';
    }
);
