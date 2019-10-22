<?php

namespace App\Http\Controllers;

use App\Client;
use App\Driver;
use App\Organization;
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

//        dd(" Here's the home controller ");
//        dd( auth()->user()->organization->org_name);
//        dd( auth()->user()->organization->status);
        $org_info = session('org_info');

//        dd($org_info->status );


        if (auth()->user()->organization->status == 0) {
            return view('pending');
        }
//
//        if (User::ADMIN == 1) {
//
//            $months = json_encode(['January', 'February', 'March', 'April', 'May', 'June', 'July']);
//            $data1 = json_encode([65, 59, 80, 81, 56, 55, 40]);
////            dd("asjibfakjwf");
//            return view('SuperDash', compact('months', 'data1'));
//
//        }



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


//            dd($vehicles);



//             $vehicles = Vehicle::all()->sortByDesc('id')->take('5');
//            $data = Client::all()->sortByDesc('id')->take('5');
            $reservations = Reservation::where('status', '1')
                ->orderBy('id', 'desc')
                ->limit(5)
                ->get();


            return view('dashboard')
                ->with('clients', $clients)
                ->with('reservations', $reservations)
                ->with('vehicles', $vehicles)
                ->with('drivers', $drivers);




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