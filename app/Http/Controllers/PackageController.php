<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageControllerRequest;
use App\Organization;
use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session('org_info')){
            $id = session()->get('org_info')->id ;
        }else{
            $id = Auth::User()->org_id ;
        }
        $organization = Organization::find($id);
        $packages = Package::all();

        return view("package", compact('packages', 'organization'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * @param Request $request
     * @return array|\Illuminate\Http\RedirectResponse
     */
    public function store(PackageControllerRequest $request)
    {
        Package::create($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     */
    public function edit(Package $package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     */
    public function update(Request $request, Package $package)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     */
    public function destroy(Package $package)
    {
        //
    }
    public function setPackage($id)
    {
        $package = Package::find($id);

        $organization = Organization::find($package->organization->id);
        $organization->package_id = $id;
        $organization->save();
        return redirect('paymentRequestView');
    }
}
