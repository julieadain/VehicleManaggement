<?php

namespace App\Http\Controllers;

use App\organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizations = Organization::where('status', '1')->get();
        $requests = Organization::where('status', '10')->get();
        $denials = Organization::where('status', '0')->get();
//        dd($denials);
//        dd($organizations->count());
        return view('organization.view', compact('organizations', 'requests', 'denials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param \App\organization $organization
     * @return \Illuminate\Http\Response
     */
    public function show(organization $organization)
    {
//        dd("SINGLE VIEW OF ORGANIZATION");
//        dd($organization->owner);
        return view("organization.detail", compact('organization'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\organization $organization
     * @return \Illuminate\Http\Response
     */
    public function edit(organization $organization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\organization $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, organization $organization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\organization $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(organization $organization)
    {
        //
    }

    public function approve($id)
    {

//        dd('Your org request has been approved & id is '. $id);

        $organization = Organization::find($id);
//        dd($organization->status);
        $organization->status = '1';
        $organization->save();
        return redirect('/organization');
    }

    public function deny($id)
    {

//        dd('Your org request has been denied');
        $organization = Organization::find($id);
//        dd($organization->status);
        $organization->status = '0';
        $organization->save();
        return redirect('/organization');
    }

    public function pending($id)
    {

//        dd('Your org request is pending');
        $organization = Organization::find($id);
//        dd($organization->status);
        $organization->status = '10';
        $organization->save();
        return redirect('/organization');
    }

    public function details($id)
    {

//        dd("Here goes the detail info of selected organization $ the id is ". $id);
        Session::forget('org');
        Session(['org' => $id]);
//        dd(session('org'));
        return redirect('/home');

    }
}
