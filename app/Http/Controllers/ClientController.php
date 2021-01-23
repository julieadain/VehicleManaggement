<?php

namespace App\Http\Controllers;

use App\Client;
use App\Reservation;
use App\Rules\ValidMobile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index()

    {

        if (session('org_info')) {

            $clients = Client::where('org_id', session()->get('org_info')->id)
                ->orderBy('id', 'desc')
                ->paginate(5);

        } else {

            $clients = Client::where('org_id', Auth::user()->org_id)
                ->paginate(5);
        }

        return view('client.detail')
            ->with('clients', $clients);
    }

    public function activeClient()
    {

        $activeClient = Client::where('status', '1')->paginate(4);

        return view('client.active-client', compact('activeClient'));
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

        if (Auth::user()->role != 1){
            $data['org_id'] = Auth::user()->org_id;
        }else{
            $data['org_id'] = session()->get('org_info')->id;
        }


        Client::create($data);
        return redirect('client');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\client $client
     * @return \Illuminate\Http\Response
     */
    public function show(client $client)
    {

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

    public function reservation($clientId)
    {

        return view('client.reservation-add')->with('clientId', $clientId);

    }

    /**
     * @param Request $request
     * @param ClientId $clientId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function res(Request $request, $clientId)
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

        $data = $request->all();
        $data['status'] = 0;

        $data['client_id'] = $clientId;
        $data['user_id'] = Auth::user()->id;

        if (session('org_info')){
           $data['org_id'] =session()->has('org_info')->id;
       }else{
           $data['org_id'] = Auth::user()->org_id;
       }

        Reservation::create($data);
        return redirect("reservation");

    }

    public function reservationIndex()
    {
        $data = Reservation::all();

        return view('client.reservation-list')->with('reservationList', $data);
    }

    public function clientHistory()
    {
        $reservations = Reservation::with('client')->paginate('10');
        return view('client.client-history', compact('reservations'));

    }

}
