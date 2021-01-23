<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Purpose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource
     */
    public function index()
    {

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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:155',
            'amount' => 'required',
            'date' => "required"
        ]);

        $purpose = Purpose::where('title', $request->title)->first();
        if (empty($purpose)) {

            $purpose = new Purpose();
            $purpose->title = $request->title;

            $purpose->save();
        }
        $expense = new Expense();

        $expense->amount = $request->amount;
        $expense->purpose_id = $purpose->id;
        $expense->created_at = date('Y-m-d', strtotime($request->date));
        if (session('org_info')){
            $expense->org_id = session()->get('org_info')->id;
        }else{
            $expense->org_id = Auth::user()->org_id;
        }

        $expense->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }

    public function ajaxRequest()
    {
        $data = Purpose::where('title', 'LIKE', '%' . request('keyword') . '%')->get();

        return response()->json(['success' => $data]);
    }
}
