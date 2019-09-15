<?php

namespace App\Http\Controllers;

use App\client;
use App\Organization;
use App\Rules\ValidMobile;
use Illuminate\Http\Request;

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

        Client::create($request->all());
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
}
