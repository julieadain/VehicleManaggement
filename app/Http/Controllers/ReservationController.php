<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        $data= Reservation::paginate(1);
        return view('reservation.detail')->with('reservations', $data);
    }

    /*
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Reservation::with('vehicles')->get();
//        return $data;
        return view('reservation.add')->with('reservation', $data );
    }

    /*
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'start_date_time'=> 'required',
            'end_date_time'=> 'required',
            'seat_capacity'=> 'required',
            'ac'=> 'required',
            'share'=> 'required',
            'pickup_address'=> 'required',
            'location'=> 'required',
            'start_meter_reading'=> 'required',
            'end_meter_reading'=> 'required',
            'total_payable'=> 'required'
        ]);

        $data =  $request->all();
        $data['user_id'] = Auth::id();

        Reservation:: create($data);
        return redirect('reservation');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
