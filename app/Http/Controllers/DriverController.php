<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Organization;
use App\Reservation;
use App\Rules\ValidMobile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (session('org_info')) {

            $drivers = Driver::where('org_id', session()->get('org_info')->id)
                ->orderBy('id', 'desc')
                ->paginate(5);

        } else {

            $drivers = Driver::where('org_id', Auth::user()->org_id)
                ->paginate(5);
        }

        return view("driver.detail")->with('drivers', $drivers );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view("driver.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required',
            'email'=> 'nullable|email|unique:drivers,email',
            'phone'=>['required', new ValidMobile()],
            'address'=>'required',
            'dl_scan'=>'required|mimes:jpg,jpeg,png,gif,bmp',
            'nid_scan'=>'required|mimes:jpg,jpeg,png,gif,bmp',
            'photo'=>'required|mimes:jpg,jpeg,png,gif,bmp'
        ],[ "email.unique"=> "Given email address already taken"
            ]);

        $data = $request->all();
        if ($request->hasFile("photo")){
            $filename=  time(). rand(). rand().'.'. $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('/upload'), $filename);
            $data['photo']= $filename;
        }
        if ($request->hasFile("dl_scan")){
            $filename=  time(). rand(). rand().'.'. $request->file('dl_scan')->getClientOriginalExtension();
            $request->file('dl_scan')->move(public_path('/upload'), $filename);
            $data['dl_scan']= $filename;
        }
        if ($request->hasFile("nid_scan")){
            $filename=  time(). rand(). rand().'.'. $request->file('nid_scan')->getClientOriginalExtension();
            $request->file('nid_scan')->move(public_path('/upload'), $filename);
            $data['nid_scan']= $filename;
        }

        if (Auth::user()->role != 1){
            $data['org_id'] = Auth::user()->org_id;
        }else{
            $data['org_id'] = session()->get('org_info')->id;
        }

        if (Auth::user()->role != 1){
            $data['user_id'] = Auth::user()->id;
        }else{
            $org = Organization::find( session()->get('org_info')->id);
            $data['user_id'] = $org->owner->id;
        }

        Driver::create($data);
        return redirect('driver');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        return view("driver.single-list",compact('driver'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        return view("driver.edit")->with('driver',$driver);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {

        $this->validate($request,[
            'name'=> 'required',
            'email'=> 'nullable|email',
            'phone'=>['required', new ValidMobile()],
            'address'=>'required',
            'dl_scan'=>'required',
            'nid_scan'=>'required',
            'photo'=>'required'
        ]);

        $driver->name = $request->get('name');
        $driver->email = $request->get('email');
        $driver->phone = $request->get('phone');
        $driver->address = $request->get('address');
        if ($request->hasFile("photo")){
            $filename=  time(). rand(). rand().'.'. $request->file('photo')->getClientOriginalExtension();
            if (file_exists(public_path("/upload/$driver->photo")))
                unlink(public_path("/upload/$driver->photo"));

            $request->file('photo')->move(public_path('/upload'), $filename);
            $driver->photo = $filename;
        }

        if ($request->hasFile("dl_scan")){
            $filename=  time(). rand(). rand().'.'. $request->file('dl_scan')->getClientOriginalExtension();
            if (file_exists(public_path("/upload/$driver->dl_scan")))
                unlink(public_path("/upload/$driver->dl_scan"));

            $request->file('dl_scan')->move(public_path('/upload'), $filename);
            $driver->dl_scan = $filename;
        }
        if ($request->hasFile("nid_scan")){
            $filename=  time(). rand(). rand().'.'. $request->file('nid_scan')->getClientOriginalExtension();
            if (file_exists(public_path("/upload/$driver->nid_scan")))
                unlink(public_path("/upload/$driver->nid_scan"));

            $request->file('nid_scan')->move(public_path('/upload'), $filename);
            $driver->nid_scan = $filename;
        }
        $driver->save();
        return redirect('driver');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();
        return redirect('driver');
    }

    public function dashboardDriver( Driver $driver ){

        $data['reservations']= Reservation::with('clients','vehicles')->where('driver_id', $driver->id)->where('status','1')->paginate(1);
        $data['driver']= $driver;
        $data['driverHistory']= Reservation::where('driver_id', $driver->id)->where('status','2')->paginate(1);



        return view('dashboard-driver-info', $data );

    }
}
