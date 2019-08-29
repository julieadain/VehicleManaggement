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
//        dd(session('org_info'));
        $id = session('org');
        if ($id) {
        $org = Organization::find($id);
        session::forget('org_info');
        Session::put('org_info', $org);
//        dd( session('org_info'));
        }else{
            Session::forget('org_info');
        }

        return view('dashboard');
    }
}
