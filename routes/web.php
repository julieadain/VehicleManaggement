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
    return view('auth.login');
});

Route::Resource("/home", "HomeController");
Route::Resource("/vehicle", "VehicleController");
Route::Resource("/driver", "DriverController");
Route::Resource("/organization", "OrganizationController");
Route::Resource("/manager", "ManagerController");
Route::Resource("/client", "ClientController");
Route::Resource("/reservation", "ReservationController");
Auth::routes();

