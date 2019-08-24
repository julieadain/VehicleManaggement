<?php

namespace App\Http\Controllers;

use App\Organization;
use Illuminate\Http\Request;

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


//        dd(" this is home controller ");
        $id = session('org');
        $organizations = Organization::find($id)->first();
        dd($organizations);
       return view('dashboard');
    }
}
