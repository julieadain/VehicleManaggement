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
//    Pending Reservations

        $reservationList = Reservation::where('status', '0')->get();


//        dd($data->vehicles->id);

//        $data['client_id'] = $clientId;
//        $data['user_id'] = Auth::id();
//        $data['org_id'] = Auth::user()->org_id;


        return view('client.reservation-list', compact('reservationList'));
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


        $data = $request->all();
        $data['status'] = 0;

        dd($data);

        Reservation::create($data);
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
//        return Driver::find(11)->reservations;

//        Reservation::all();
        if (session('org_info')) {


            $vehicles = Vehicle::where('org_id', session()->get('org_info')->id)->get();

        } else {

            $vehicles = Vehicle::where('org_id', Auth::user()->org_id)->get();

        }

        session::forget('res_info');
        Session::put('res_info', $reservation);

        return view('reservation.vehicle-assign')->with('reservation', $reservation)
            ->with('vehicles', $vehicles);
    }


    public function DriverAssign($id)
    {

        $reservation = Reservation::find(session()->get('res_info')->id);
        $reservation->driver_id = $id;
        $reservation->status = '1';
        $reservation->save();

        $reservation->status='1';
        $reservation->sendSms();


        $client = Client::find($reservation->client_id);
        $client->status = '1';
        $client->save();


        return redirect('currentReservation');


    }


    public function vehicleAssign($id)
    {
//        dd(session()->get('res_info')->id);

        $reservation = Reservation::find(session()->get('res_info')->id);
        $reservation->vehicle_id = $id;
        $reservation->save();


        if (session('org_info')) {


            $drivers = Driver::where('org_id', session()->get('org_info')->id)->get();

        } else {

            $drivers = Driver::where('org_id', Auth::user()->org_id)->get();

        }


        return view("reservation.driver-assign", compact('reservation', 'drivers'));

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

    public function runReservationEdit(Reservation $reservation)
    {
        return view('reservation.running-reservation-edit')->with('reservation', $reservation);
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
//        return redirect('reservation');
        return view('reservation.vehicle-assign');
    }


    public function RunReservationUpdate(Request $request, Reservation $reservation)
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
        return redirect("reservation/$reservation->id");
//        return view('reservation.vehicle-assign');

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

    /**
     * @param Reservation $reservation
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function runReservationDestroy(Reservation $reservation)
    {
//        dd($reservation);
        $reservation->delete();
        return redirect('currentReservation');
    }


    public function currentRes()
    {

        $reservations = Reservation::where('status', '1')->get();

        return view('reservation.current-reservation', compact('reservations'));


    }


    public function currentReservationShow(Reservation $reservation)
    {


        return view('reservation.current-res-single-list', compact('reservation'));


    }

    public function completed(Reservation $reservation)
    {

//        dd($reservation->id);
        $reservation->status = 2;
        $reservation->save();
        return redirect("history");

    }

    public  function historyReservation(){

//        dd('asche');

          $reservation = Reservation::where('status','2')->get();
//        dd($reservation);

        return view('reservation.reservation-history')->with( 'reservations', $reservation);
    }

    public function massage(){
        return view('massage');
    }
    function sendSms($to, $message, $from = null)
    {
        $uri = 'https://cheapsms.com.bd/api/send';
        $auth = base64_encode('example@latentsoft.com:JDJ5J*****WT0RH');
        $data = [
            'client_phone' => $to,
            'org_name' => $from,
            'message' => $message,
        ];
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $uri,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "content-type: application/json",
                "auth: $auth"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($response) {
            return json_decode($response);
        }else{
            return $err;
        }
    }

}
