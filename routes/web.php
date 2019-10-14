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

Route::resource("/home", "HomeController");
Route::resource("/vehicle", "VehicleController");
Route::resource("/driver", "DriverController");
Route::resource("/reservation", "ReservationController");



Route::resource("/organization", "OrganizationController");
Route::get("/approve/{id}", "OrganizationController@approve")->name('organization.approve');
Route::get("/deny/{id}", "OrganizationController@deny")->name('organization.deny');
Route::get("/pending/{id}", "OrganizationController@pending")->name('organization.pending');
Route::get("/details/{id}", "OrganizationController@details")->name('organization.details');
Route::get("/unset", "OrganizationController@unset")->name('organization.unset');
Route::resource("/manager", "ManagerController");
Route::resource("/expense", "ExpenseController");
Route::resource("/purpose", "PurposeController");
Route::resource("/report", "ReportController");
Route::get("/ajaxRequest", "ExpenseController@ajaxRequest")->name('expense.ajaxRequest');
Route::resource("/client", "ClientController");
Route::resource("/reservation", "ReservationController");
Route::resource("/payment", "PaymentController");
Route::get("/invoicePrint", "PaymentController@invoicePrint")->name('payment.invoicePrint');
Route::get("/paymentRequest", "PaymentController@paymentRequest")->name('payment.paymentRequest');


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
