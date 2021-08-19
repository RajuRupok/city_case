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
        
        /* ==================================
        ============< Case >============
        ===================================*/
        // Case
        include_once 'case/case.php';
        
        /* ==================================
        ============< profile >============
        ===================================*/
        // profile
        include_once 'profile/profile.php';
    }
);
