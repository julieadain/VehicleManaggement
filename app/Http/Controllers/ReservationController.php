<?php

namespace App\Http\Controllers;

use App\Client;
use App\Driver;
use App\Reservation;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Reservation::all();

//        $data['client_id'] = $clientId;
//        $data['user_id'] = Auth::id();
//        $data['org_id'] = Auth::user()->org_id;


        return view('client.reservation-list')->with('reservationList', $data);
    }

    /*
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


//        return view('reservation.add');
    }

    /*
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'start_date_time' => 'required',
            'end_date_time' => 'required',
            'seat_capacity' => 'required',
            'ac' => 'required',
            'share' => 'required',
            'pickup_address' => 'required',
            'location' => 'required',
            'start_meter_reading' => 'required',
            'end_meter_reading' => 'required',
            'total_payable' => 'required'
        ]);

//        $data =  $request->all();
//        $data['user_id'] = Auth::id();
//        Reservation:: create($data);

        Reservation::create($request);
        return redirect('reservation');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {


//        Reservation::all();
        if (session('org_info')){


            $vehicles = Vehicle::where('org_id', session()->get('org_info')->id )->get();

        }else{

            $vehicles = Vehicle::where('org_id', Auth::user()->org_id)->get();

        }

        session::forget('res_info');
        Session::put('res_info', $reservation);

        return view('reservation.reservation-detail')->with('reservationList', $reservation)
            ->with('vehicles', $vehicles);
    }







    public function DriverAssign($id){
        $reservation = Reservation::find(session()->get('res_info')->id);
        $reservation->driver_id = $id;
        $reservation->status = '1';
        $reservation->save();

        $client = Client::find($reservation->client_id);
        $client->status = '1';

        $client->save();


        return redirect('currentReservation');



    }





    public  function vehicleAssign($id )
    {
//        dd(session()->get('res_info')->id);

        $reservation = Reservation::find(session()->get('res_info')->id);
        $reservation ->vehicle_id =  $id;
        $reservation->save();



        if (session('org_info')){


            $drivers = Driver::where('org_id', session()->get('org_info')->id )->get();

        }else{

            $drivers = Driver::where('org_id', Auth::user()->org_id)->get();

        }


        return view("reservation.reservation-driver", compact('reservation','drivers'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        return view('reservation.edit')->with('reservation', $reservation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        $this->validate($request, [
            'start_date_time' => 'required',
            'end_date_time' => 'required',
            'seat_capacity' => 'required',
            'ac' => 'required',
            'share' => 'required',
            'pickup_address' => 'required',
            'location' => 'required',
            'start_meter_reading' => 'required',
            'end_meter_reading' => 'required',
            'total_payable' => 'required'
        ]);

       $reservation->save();
       $reservation->update($request->all());

//        $data =  $request->all();
//        $data['user_id'] = Auth::id();
//        Reservation:: create($data);
        return redirect('reservation');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect('reservation');
    }






    public function currentRes(){

        $reservations = Reservation::where('status', '1')->get();

        return view('reservation.current-reservation', compact('reservations')) ;

    }





    public function currentReservationShow( Reservation $reservation ){


        return view('reservation.current-res-single-list',compact('reservation'));



    }

}
