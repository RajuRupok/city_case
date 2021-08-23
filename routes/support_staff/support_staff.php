<?php

// support_staff Routes
Route::group([
    'prefix' => 'support_staff', // URL
    'as' => 'support_staff.', // Route
    'namespace' => 'SupportStaff', // Controller
],
    function(){
        // Dashboard
        include_once 'dashboard/dashboard.php';
        
        // case
        include_once 'case/case.php';
    }
);
