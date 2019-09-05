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
})->middleware('guest');

Route::Resource("/home", "HomeController");
Route::Resource("/vehicle", "VehicleController");
Route::Resource("/driver", "DriverController");
Route::Resource("/organization", "OrganizationController");
Route::get("/approve/{id}", "OrganizationController@approve")->name('organization.approve');
Route::get("/deny/{id}", "OrganizationController@deny")->name('organization.deny');
Route::get("/pending/{id}", "OrganizationController@pending")->name('organization.pending');
Route::get("/details/{id}", "OrganizationController@details")->name('organization.details');
Route::get("/unset", "OrganizationController@unset")->name('organization.unset');
Route::Resource("/manager", "ManagerController");
Route::Resource("/expense", "ExpenseController");
Route::Resource("/client", "ClientController");
Route::Resource("/reservation", "ReservationController");
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
