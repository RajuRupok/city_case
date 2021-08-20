<?php

// city_corporation Routes
Route::group([
    'prefix' => 'city_corporation', // URL
    'as' => 'city_corporation.', // Route
    'namespace' => 'CityCorporation', // Controller
],
    function(){
        // Dashboard
        include_once 'dashboard/dashboard.php';
        
        // citizen
        include_once 'citizen/citizen.php';
        
        // service_manager
        include_once 'service_manager/service_manager.php';
        
        // support_staff
        include_once 'support_staff/support_staff.php';
        
        // category
        include_once 'category/category.php';
    }
);
