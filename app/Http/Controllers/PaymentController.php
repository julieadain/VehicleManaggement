<?php

namespace App\Http\Controllers;

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
        if (session('org_info')) {
            $payments = Payment::with('client', 'reservation', 'organization')
                ->orderBy('date', 'desc')
                ->whereNull('package_id')
                ->where('org_id', session()->get('org_info')->id)
                ->paginate('8');
        } elseif (Auth::user()->role == 1 && empty(session('org_info'))) {
            $payments = Payment::with('client', 'reservation', 'organization', 'package')
                ->whereNotNull('package_id')
                ->paginate('8');
        } else {
            $payments = Payment::with('client', 'reservation', 'organization')
                ->whereNull('package_id')
                ->where('org_id', Auth::user()->org_id)
                ->paginate('8');
        }
        return view("payment.paymentList", compact('payments'));
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
    }

    public function adminPaymentCreate()
    {
        if (session('org_info')) {
            $id = session()->get('org_info')->id;
        } else {
            $id = Auth::User()->org_id;
        }
        $organization = Organization::find($id);

        return view("payment.invoice", compact('organization'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->back();
    }

    public function packaged(PackagedControllerRequest $request)
    {
        $package = Package::where('title', 'LIKE', '%' . current(explode(" @", $request->package)) . '%')->first();

        $organization = Organization::where('org_name', 'LIKE', '%' . $request->organization . '%')->first();
        $organization->package_id = $package->id;
        $organization->save();

        return view("payment.adminInvoice", compact('organization'));
    }

    public function requestList()
    {

        $payments = Payment::where('status', '0')
            ->whereNull('res_id')
            ->paginate('8');
        return view("payment.requestList", compact('payments'));
    }

    public function paymentApprove($id)
    {
        $payment = Payment::find($id);
        $payment->status = '1';
        $payment->save();
        return redirect()->back();
    }

    public function invoicePrint($id)
    {
        $organization = Organization::find($id);

        return view("payment.invoice-print", compact('organization'));
    }

    public function paymentView(Payment $payment)
    {

        $packages = Package::all();
        return view("payment.adminMakePayment", compact('packages', 'payment'));
    }

    public function paymentRequestView()
    {
        if (session('org_info')) {
            $id = session()->get('org_info')->id;
        } else {
            $id = Auth::User()->org_id;
        }
        $organization = Organization::find($id);

        return view("payment.paymentRequest", compact('organization'));

    }

    public function paymentDueList()
    {
        $payments = Payment::whereNotNUll('package_id')
            ->where('status', '-1')
            ->paginate('10');
        return view("payment.dueList", compact('payments'));

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
        return redirect(url('home'));

    }

    public function org_ajaxRequest()
    {
        $data = Organization::with('package')
            ->where('org_name', 'LIKE', '%' . request('keyword') . '%')
            ->where('status', '1')
            ->get();
        return response()->json(['success' => $data]);
    }


}
