<?php

namespace App\Http\Controllers;

use App\Client;
use App\Driver;
use App\Reservation;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($clientId)
    {

        $data = Reservation::all();

        $data['client_id'] = $clientId;
        $data['user_id'] = Auth::id();
        $data['org_id'] = Auth::user()->org_id;

        return view('client.reservation-list')->with('reservations', $data);
    }

    /*
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $data = Reservation::with('vehicles')->get();


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
            $org = session('org_info');

            $vehicles = Vehicle::where('org_id', $org->id )->get();

        }else{

            $vehicles = Vehicle::where('org_id', Auth::user()->org_id)->get();

        }

        return view('reservation.reservation-detail')->with('reservationList', $reservation)
            ->with('vehicles', $vehicles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
