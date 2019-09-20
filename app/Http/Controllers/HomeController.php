<?php

namespace App\Http\Controllers;

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
//        dd( auth()->user()->organization->status);
        $org_info = session('org_info');

//        dd($org_info->status );


        if (auth()->user()->organization->status == 0) {
            return view('pending');
        }

        if (session('org_info')) {
            return view('dashboard');
        }

        if (auth()->user()->role == 1) {
            $months = json_encode(['January', 'February', 'March', 'April', 'May', 'June', 'July']);
            $data1 = json_encode([65, 59, 80, 81, 56, 55, 40]);
            return view('SuperDash', compact('months', 'data1'));
        }

        return view('dashboard');
    }
}
