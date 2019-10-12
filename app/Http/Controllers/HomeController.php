<?php

namespace App\Http\Controllers;

use App\Client;
use App\Organization;
use App\Payment;
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
//        $org_info = session('org_info');
//        dd($org_info->status );


        if (auth()->user()->organization->status == 0) {
            return view('pending');
        }

        if (session('org_info')) {

            $data= Client::all()->sortByDesc('id')->take('5');
//            dd($data);

        return view('dashboard')->with('clients',$data);
//            return view('dashboard');
        }

        if (auth()->user()->role == 1) {
            $months = json_encode(['January', 'February', 'March', 'April', 'May', 'June', 'July']);
            $data1 = json_encode([65, 59, 80, 81, 56, 55, 40]);
            $payment =  Payment::orderBy('created_at', 'Desc')
            ->limit('10')->get();

            $organizations = Organization::where('id', '!=', Auth::user()->org_id)
                ->orderBy('created_at', 'Desc')
                ->where('status', '1')
                ->limit('5')
                ->get();
            return view('SuperDash', compact('months', 'data1', 'payment', 'organizations'));
        }
        $clients = Client::all()->sortByDesc('id')->take('5');
        return view('dashboard', compact('clients'));

    }
}