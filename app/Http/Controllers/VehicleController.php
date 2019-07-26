<?php

namespace App\Http\Controllers;

use App\vehicle;
use Illuminate\Http\Request;
use function Sodium\add;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd("This is display of vehicles");
        return view("vehicle.all");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        dd("This is add vehicle form");
        return view("vehicle.add");

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
            'brand'=>'required',
            'model'=>'required',
            'color'=>'required',
            'reg_number'=>'required',
            'reg_date'=>'required',
            'seat_capacity'=>'required',
            'ac'=>'required',
            'reg_scan_copy'=>'required',
            'photo'=>'required|mimes:jpg,jpeg,png,gif,bmp',
            'insurance_scan_copy'=>'required|mimes:jpg,jpeg,png,gif,bmp',
            'roadPermit_scan_copy'=>'required|mimes:jpg,jpeg,png,gif,bmp',
            'ownership_status'=>'required',
            'status'=>'required'
        ]);

        if ($request->hasFile("photo")){
            $request->file('photo')->move(public_path('/upload'),'abc.jpg');
        }

        vehicle::create($request->all());
      }

    /**
     * Display the specified resource.
     *
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(vehicle $vehicle)
    {
        dd("This is from vehicle edit");
        view("vehicle.edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(vehicle $vehicle)
    {
        dd("This is vehicle delete method");

    }

    public function available(){
        dd("This is display of available vehicle");
    }
}
