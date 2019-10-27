<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageControllerRequest;
use App\Http\Requests\PackagedControllerRequest;
use App\Organization;
use App\Package;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages = Package::all();
        return view("payment.adminPayment", compact('packages'));
//        return view("payment.adminInvoice");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        return $request;
        return view("payment.adminInvoice");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }

    public function packaged(PackagedControllerRequest $request)
    {
        $package = explode(" ", $request->package);
//       return $request;

        $organization = Organization::where('org_name', 'LIKE', '%' . $request->organization . '%')->first();
        $organization->package_id = $package[0];
        $organization->save();

//       return $organization->package;

        return view("payment.adminInvoice", compact('organization'));
    }

    public function invoicePrint($id)
    {
        $organization = Organization::find($id);

        return view("payment.invoice-print", compact('organization'));
    }

    public function paymentRequestView()
    {

        return view("payment.paymentRequest");

    }

    public function paymentRequest($id)
    {

        $organization = Organization::find($id);

        $payment = new Payment();
        $payment->date = now('asia/Dhaka')->format('Y-m-d');
        $payment->paid = $organization->package->cost;
        $payment->org_id = $organization->id;
        $payment->package_id = $organization->package_id;

        if (Auth::user()->role == 1) {
            $payment->status = '1';
        }
        $payment->save();
//        return $payment ;
        return redirect(url('home'));

    }

    public function org_ajaxRequest()
    {
//        return "Test";

        $data = Organization::where('org_name', 'LIKE', '%' . request('keyword') . '%')->get();
        return response()->json(['success' => $data]);
    }

}
