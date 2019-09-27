<?php

namespace App\Http\Controllers;

use App\client;
use App\Organization;
use App\Reservation;
use App\Rules\ValidMobile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /*
     * Display a listing of the resource.

     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organization = Organization::all();
        $data = Client::paginate(10);
        return view('client.detail')
            ->with('clients', $data)
            ->with('organizations',$organization);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.add');
    }

    /*
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:clients,email',
            'phone' => ['required', new ValidMobile()],
            'address' => 'required'
        ], ["email.unique" => "Given email address already taken"
        ]);
        $data = $request->all();
        $data['org_id']= Auth::user()->org_id;

        Client::create($data);
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\client $client
     * @return \Illuminate\Http\Response
     */
    public function show(client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\client $client
     * @return \Illuminate\Http\Response
     */
    public function edit(client $client)
    {

        return view('client.edit')->with('client', $client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\client $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, client $client)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $client->name = $request->get('name');
        $client->email = $request->get('email');
        $client->phone = $request->get('phone');
        $client->address = $request->get('address');
        $client->save();

        return redirect('client');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\client $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect('client');
    }

    public function reservation($clientId){

        return view('client.reservation-add')->with('clientId', $clientId);

    }

    /**
     * @param Request $request
     * @param ClientId $clientId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function res(Request $request, $clientId){
//        $data =$request->all();
//        $data['client_id']= $clientId;
//        $data['user_id']=Auth::id();
//        $data['org_id']= Auth::user()->org_id;
//
//
//
//        Reservation::create($data);
//        return redirect()->back();

        $this->validate( $request,[
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

        $data = $request->all();

        $data['client_id']= $clientId;
        $data['user_id']=Auth::id();
        $data['org_id']= Auth::user()->id;




//        Reservation::create($data);
//        return redirect()->back();

        Reservation::create($data);
        return redirect("client/$clientId/reservation");
    }

    public  function reservationIndex( ){
        $data = Reservation::all();

        return view('client.reservation-list')->with('reservationList', $data);
    }
}
