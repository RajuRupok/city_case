<?php

// service_manager Routes
Route::group([
    'prefix' => 'service_manager', // URL
    'as' => 'service_manager.', // Route
    'namespace' => 'ServiceManager', // Controller
],
    function(){
        /* ==================================
        ============< Dashboard >============
        ===================================*/
        // Dashboard
        include_once 'dashboard/dashboard.php';
    }
);
