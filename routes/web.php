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

Route::get("dashboard/vehicle/{vehicle}","HomeController@vehicle")->name('dashboard.vehicle');
Route::get("dashboard/vehicle/{vehicle}/history","HomeController@vehicle")->name('dashboard.vehicleHistory');

Route::Resource("/organization", "OrganizationController");
Route::resource("/package", "PackageController");
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
Route::get("/org_ajaxRequest", "PaymentController@org_ajaxRequest")->name('payment.org_ajaxRequest');
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
