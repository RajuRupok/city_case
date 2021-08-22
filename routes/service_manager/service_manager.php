<?php

// service_manager Routes
Route::group([
    'prefix' => 'service_manager', // URL
    'as' => 'service_manager.', // Route
    'namespace' => 'ServiceManager', // Controller
],
    function(){
        // Dashboard
        include_once 'dashboard/dashboard.php';
        
        // case
        include_once 'case/case.php';
        
        // support_staff
        include_once 'support_staff/support_staff.php';
    }
);
