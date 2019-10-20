<?php

namespace App\Http\Controllers;

use App\Client;
use App\Organization;
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
            $clients = Vehicle::where('org_id', session()->get('org_info')->id)
                ->orderBy('id', 'desc')
                ->take('5')
                ->get();

//            dd($vehicles);

            $reservations = Reservation::where('status', '1')
                ->orderBy('id', 'desc')
                ->limit(5)
                ->get();

            return view('dashboard')
                ->with('clients', $clients)
                ->with('reservations', $reservations)
                ->with('vehicles', $vehicles);


        } /*else {

            $vehicles = Vehicle::where('org_id', Auth::user()->org_id)
                ->orderBy('id', 'desc')
                ->take('5')
                ->get();
            $clients = Client::where('org_id', Auth::user()->org_id)
                ->orderBy('id', 'desc')
                ->take('5')
                ->get();
        }*/
        if (Auth::user()->id == 1) {

            $months = json_encode(['January', 'February', 'March', 'April', 'May', 'June', 'July']);
            $data1 = json_encode([65, 59, 80, 81, 56, 55, 40]);
            $payment = Payment::orderBy('created_at', 'Desc')
                ->limit('10')->get();

            $organizations = Organization::where('id', '!=', Auth::user()->org_id)
                ->orderBy('created_at', 'Desc')
                ->where('status', '1')
                ->limit('5')
                ->get();
            return view('SuperDash', compact('months', 'data1', 'payment', 'organizations'));
        }


        //             $vehicles = Vehicle::all()->sortByDesc('id')->take('5');
//            $data = Client::all()->sortByDesc('id')->take('5');

//            dd($vehicles);
//        if (User::ADMIN == 1) {
        /*    return "hbasedhfab";

        $clients = Client::all()->sortByDesc('id')->take('5');
        $reservations = Reservation::where('status', '1')
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard', compact('clients', 'reservations'));*/

    }

    public function vehicle(Vehicle $vehicle)
    {

        $data['reservations'] = Reservation::with('clients', 'vehicles')->where('vehicle_id', $vehicle->id)->paginate(3);
        $data['vehicle'] = $vehicle;

        $data['vehicleHistory'] = Reservation::where('status', '2')->get();

        //return $data;


        return view('dashboard-vehicle-info', $data);

    }

}