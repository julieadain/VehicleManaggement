<?php

namespace App\Http\Controllers;

use App\organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizations = Organization::all();
        return view('organization.view', compact('organizations'));
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
        return view("organization.detail");

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
}
