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
Route::resource("/reservation", "ReservationController");

Route::get("/RunReservation/{reservation}/edit", "ReservationController@runReservationEdit")->name('runningReservation.edit');
Route::patch("/RunReservation/{reservation}", "ReservationController@RunReservationUpdate")->name('runningReservation.update');
Route::delete("/RunReservation/{reservation}", "ReservationController@runReservationDestroy")->name('runningReservation.destroy');

Route::get("/reservation/{reservation}/completed", "ReservationController@completed");
Route::get("/history", "ReservationController@historyReservation");






Route::get("dashboard/vehicle/{vehicle}","HomeController@vehicle")->name('dashboard.vehicle');
//Route::get("dashboard/vehicle/{vehicle}/history","HomeController@vehicle")->name('dashboard.vehicleHistory');
Route::get("dashboard/driver/{driver}","DriverController@dashboardDriver")->name('dashboard.driver');





Route::Resource("/organization", "OrganizationController");
Route::get("/approve/{id}", "OrganizationController@approve")->name('organization.approve');
Route::get("/deny/{id}", "OrganizationController@deny")->name('organization.deny');
Route::get("/pending/{id}", "OrganizationController@pending")->name('organization.pending');
Route::get("/details/{id}", "OrganizationController@details")->name('organization.details');
Route::get("/unset", "OrganizationController@unset")->name('organization.unset');
Route::Resource("/manager", "ManagerController");
Route::Resource("/expense", "ExpenseController");
Route::Resource("/purpose", "PurposeController");
Route::Resource("/report", "ReportController");
Route::get("/ajaxRequest", "ExpenseController@ajaxRequest")->name('expense.ajaxRequest');
Route::Resource("/client", "ClientController");


Route::get("client/{clientId}/reservation/create","ClientController@reservation");
Route::post("client/{clientId}/reservation/create","ClientController@res");
Route::get("client/{clientId}/reservation","ClientController@reservationIndex");



Route::get("/vehicleAssign/{id}", "ReservationController@vehicleAssign")->name('reservation.vehicleAssign');
Route::get("/driverAssign/{id}", "ReservationController@driverAssign")->name('reservation.driverAssign');
Route::get("/currentReservation", "ReservationController@currentRes")->name('reservation.currentReservation');
Route::get("/activeClient", "ClientController@activeClient")->name('client.activeClient');

Route::get("{reservation}/currentReservation", "ReservationController@currentReservationShow");






Auth::routes();

Route::resource("client", "ClientController");
//Route::get('/home', 'HomeController@index')->name('home');
