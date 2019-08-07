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
        $data= Vehicle::paginate(3);
        return view("vehicle.detail")->with('vehicles', $data);
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
            'reg_scan_copy'=>'->nullable|mimes:jpg,jpeg,png,gif,bmp',
            'photo'=>'->nullable|mimes:jpg,jpeg,png,gif,bmp',
            'insurance_scan_copy'=>'->nullable|mimes:jpg,jpeg,png,gif,bmp',
            'roadPermit_scan_copy'=>'->nullable|mimes:jpg,jpeg,png,gif,bmp',
            'ownership_status'=>'required',
            'status'=>'required'
        ]);
        $data = $request->all();


        if ($request->hasFile("reg_scan_copy")){
            $filename=  time(). rand(). rand().'.'. $request->file('reg_scan_copy')->getClientOriginalExtension();
            $request->file('reg_scan_copy')->move(public_path('/upload'), $filename);
            $data['reg_scan_copy']= $filename;
        }
        if ($request->hasFile("photo")){
            $filename=  time(). rand(). rand().'.'. $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('/upload'), $filename);
            $data['photo']= $filename;
        }
        if ($request->hasFile("insurance_scan_copy")){
            $filename=  time(). rand(). rand().'.'. $request->file('insurance_scan_copy')->getClientOriginalExtension();
            $request->file('insurance_scan_copy')->move(public_path('/upload'), $filename);
            $data['insurance_scan_copy']= $filename;
        }
        if ($request->hasFile("roadPermit_scan_copy")){
            $filename=  time(). rand(). rand().'.'. $request->file('roadPermit_scan_copy')->getClientOriginalExtension();
            $request->file('roadPermit_scan_copy')->move(public_path('/upload'), $filename);
            $data['roadPermit_scan_copy']= $filename;
        }





        Vehicle::create($data);
        return redirect('vehicle');
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
        return view("vehicle.edit")->with('vehicle',$vehicle);
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
        $this->validate($request,[
            'brand'=>'required',
            'model'=>'required',
            'color'=>'required',
            'reg_number'=>'required',
            'reg_date'=>'required',
            'seat_capacity'=>'required',
            'ac'=>'required',
            'reg_scan_copy'=>'->required|mimes:jpg,jpeg,png,gif,bmp',
            'photo'=>'required|mimes:jpg,jpeg,png,gif,bmp',
            'insurance_scan_copy'=>'required|mimes:jpg,jpeg,png,gif,bmp',
            'roadPermit_scan_copy'=>'required|mimes:jpg,jpeg,png,gif,bmp',
            'ownership_status'=>'required',
            'status'=>'required'
        ]);

        $vehicle->brand = $request->get('brand');
        $vehicle->model = $request->get('model');
        $vehicle->color = $request->get('color');
        $vehicle->reg_number = $request->get('reg_number');
        $vehicle->reg_date = $request->get('reg_date');
        $vehicle->seat_capacity = $request->get('seat_capacity');
        $vehicle->ac = $request->get('ac');
        if ($request->hasFile("reg_scan_copy")){
            $filename=  time(). rand(). rand().'.'. $request->file('reg_scan_copy')->getClientOriginalExtension();
            if (file_exists(public_path("/upload/$vehicle->reg_scan_copy")))
                unlink(public_path("/upload/$vehicle->reg_scan_copy"));

            $request->file('reg_scan_copy')->move(public_path('/upload'), $filename);
            $vehicle->reg_scan_copy = $filename;
        }

        if ($request->hasFile("photo")){
            $filename=  time(). rand(). rand().'.'. $request->file('photo')->getClientOriginalExtension();
            if (file_exists(public_path("/upload/$vehicle->photo")))
                unlink(public_path("/upload/$vehicle->photo"));

            $request->file('photo')->move(public_path('/upload'), $filename);
            $vehicle->photo = $filename;
        }

        if ($request->hasFile("insurance_scan_copy")){
            $filename=  time(). rand(). rand().'.'. $request->file('insurance_scan_copy')->getClientOriginalExtension();
            if (file_exists(public_path("/upload/$vehicle->insurance_scan_copy")))
                unlink(public_path("/upload/$vehicle->insurance_scan_copy"));

            $request->file('insurance_scan_copy')->move(public_path('/upload'), $filename);
            $vehicle->insurance_scan_copy = $filename;
        }

        if ($request->hasFile("roadPermit_scan_copy")){
            $filename=  time(). rand(). rand().'.'. $request->file('roadPermit_scan_copy')->getClientOriginalExtension();
            if (file_exists(public_path("/upload/$vehicle->roadPermit_scan_copy")))
                unlink(public_path("/upload/$vehicle->roadPermit_scan_copy"));

            $request->file('roadPermit_scan_copy')->move(public_path('/upload'), $filename);
            $vehicle->roadPermit_scan_copy = $filename;

        }
        $vehicle-> ownership_status= $request->get('ownership_status');
        $vehicle->status = $request->get('status');
        $vehicle->save();

        return redirect('vehicle');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(vehicle $vehicle)
    {
    $vehicle->delete();
    return redirect('vehicle');
    }

    public function available(){
        dd("This is display of available vehicle");
    }
}
