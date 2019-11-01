<?php

namespace App\Http\Controllers;

use App\Client;
use App\Driver;
use App\Organization;
use App\Package;
use App\Payment;
use App\Reservation;
use App\User;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->organization->status == 0) {
            return view('pending');
        }

        if (session('org_info')) {

            $vehicles = Vehicle::where('org_id', session()->get('org_info')->id)
                ->orderBy('id', 'desc')
                ->take('5')
                ->get();
            $clients = Client::where('org_id', session()->get('org_info')->id)
                ->orderBy('id', 'desc')
                ->take('5')
                ->get();
            $drivers = Driver::where('org_id', session()->get('org_info')->id)
                ->orderBy('id', 'desc')
                ->take('5')
                ->get();

//            dd($vehicles);

            $reservations = Reservation::where('status', '1')
                ->orderBy('id', 'desc')
                ->limit(5)
                ->get();

//            $package = Package::find( session()->get('org_info')->package_id);


            return view('dashboard')
                ->with('clients', $clients)
                ->with('reservations', $reservations)
                ->with('vehicles', $vehicles)
                ->with('drivers', $drivers);


        } else {

            $vehicles = Vehicle::where('org_id', Auth::user()->org_id)
                ->orderBy('id', 'desc')
                ->take('5')
                ->get();
            $clients = Client::where('org_id', Auth::user()->org_id)
                ->orderBy('id', 'desc')
                ->take('5')
                ->get();

            $drivers = Driver::where('org_id', Auth::user()->org_id)
                ->orderBy('id', 'desc')
                ->take('5')
                ->get();
        }
        if (Auth::user()->role == 1) {

            $months = json_encode(['January', 'February', 'March', 'April', 'May', 'June', 'July']);
            $data1 = json_encode([65, 59, 80, 81, 56, 55, 40]);


            $organizations = Organization::where('id', '!=', Auth::user()->org_id)
                ->orderBy('created_at', 'Desc')
                ->where('status', '1')
                ->limit('5')
                ->get();

            $payments = Payment::with('package')
                ->where('org_id', '!=', Auth::user()->org_id)
                ->orderBy('created_at', 'Desc')
                ->whereNotNull('package_id')
                ->where('status', '!=', '0')
                ->limit('8')
                ->get();

//            return $payments[2]->package ;
            return view('SuperDash', compact('months', 'data1', 'organizations', 'payments'));
        }

        $reservations = Reservation::where('status', '1')
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard', compact('clients', 'reservations', 'vehicles', 'drivers'));

    }

    public  function vehicle(Vehicle $vehicle){
//            dd($vehicle->id);
          $data['reservations'] = Reservation::with('clients', 'vehicles')->where('vehicle_id', $vehicle->id)->where('status', '1')->paginate(1);
        $data['vehicle'] = $vehicle;

        $data['vehicleHistory']= Reservation::where('vehicle_id', $vehicle->id)->where('status','2')->paginate('1');

        //return $data;


        return view('dashboard-vehicle-info', $data);

    }

}