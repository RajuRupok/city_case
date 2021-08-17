<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/login_with_email', 'Auth\LoginController@loginWithEmail')->name('login_with_email');

Route::group(
    [
        'middleware' => ['auth'],
    ],
    function () {
        Route::post('/change_password', 'ProfileController@change_password')->name('change_password');
    }
);

/*==============================================================
======================< city_corporation Routes >==========================
==============================================================*/
Route::group(
    [
        'middleware' => ['auth', 'city_corporation'],
    ],
    function () {
        include_once 'city_corporation/city_corporation.php';
    }
);

/*==============================================================
======================< service_manager Routes >==========================
==============================================================*/
Route::group(
    [
        'middleware' => ['auth', 'service_manager'],
    ],
    function () {
        include_once 'service_manager/service_manager.php';
    }
);

/*==============================================================
======================< support_staff Routes >==========================
==============================================================*/
Route::group(
    [
        'middleware' => ['auth', 'support_staff'],
    ],
    function () {
        include_once 'support_staff/support_staff.php';
    }
);

/*==============================================================
======================< citizen Routes >==========================
==============================================================*/
Route::group(
    [
        'middleware' => ['auth', 'citizen'],
    ],
    function () {
        include_once 'citizen/citizen.php';
    }
);


