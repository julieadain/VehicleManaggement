<?php

namespace App\Http\Controllers;

use App\Client;
use App\Organization;
use Illuminate\Http\Request;
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


        if (auth()->user()->organization->status == 10) {
            return view('pending');
        }

        if (session('org_info')) {
            return view('dashboard');
        }

        if (auth()->user()->role == 1) {
            return view('SuperDash');
        }
        $data= Client::all()->sortByDesc('id')->take('5');

        return view('dashboard')->with('clients',$data);
    }
}