<?php

// city_corporation Routes
Route::group([
    'prefix' => 'city_corporation', // URL
    'as' => 'city_corporation.', // Route
    'namespace' => 'CityCorporation', // Controller
],
    function(){
        /* ==================================
        ============< Dashboard >============
        ===================================*/
        // Dashboard
        include_once 'dashboard/dashboard.php';
    }
);
