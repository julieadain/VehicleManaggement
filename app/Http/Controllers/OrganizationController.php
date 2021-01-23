<?php

namespace App\Http\Controllers;

use App\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $organizations = Organization::where("id","!=",Auth::user()->org_id)->where('status', '1')->paginate('8');
        $requests = Organization::where("status", "0")->get();
        $denials = Organization::where('status', '-1')->get();

        return view('organization.view', compact('organizations', 'requests', 'denials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Organization $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        return view("organization.detail", compact('organization'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Organization $organization
     */
    public function edit(Organization $organization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\organization $organization
     */
    public function update(Request $request, organization $organization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Organization $organization
     */
    public function destroy(Organization $organization)
    {
        //
    }

    public function approve($id)
    {
        $organization = Organization::find($id);
        $organization->status = '1';
        $organization->save();

        return redirect('/organization');
    }

    public function deny($id)
    {
        $organization = Organization::find($id);
        $organization->status = '-1';
        $organization->save();
        return redirect('/organization');
    }

    public function pending($id)
    {
        $organization = Organization::find($id);
        $organization->status = '0';
        $organization->save();
        return redirect('/organization');
    }

    public function details($id)
    {
        if ($id) {
            $org = Organization::find($id);
            session::forget('org_info');
            Session::put('org_info', $org);
        } else {
            Session::forget('org_info');
        }
        return redirect('/home');

    }
    public function unset(){
        Session::forget("org_info");
       return redirect("/home");
    }
}
