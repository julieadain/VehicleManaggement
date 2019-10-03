<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Purpose;
use App\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exp = Expense::select(DB::raw('sum(amount) as total_amount, month(created_at) as month'))
            ->orderBy('created_at', 'Desc')
            ->groupBy(DB::raw("month(created_at)"))
            ->whereBetween('created_at', array(Carbon::now()->subMonth(6), Carbon::now()) )
            ->get();

//        dd($exp);

        $expenses = Expense::whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'))->orderBy('created_at', 'Desc')->get();

//        dd($expenses);

        $months = json_encode(['January', 'February', 'March', 'April', 'May', 'June', 'July']);
        $data1 = json_encode([65, 59, 80, 81, 56, 55, 40]);
        $data2 = json_encode([45, 69, 70, 31, 36, 65, 80]);
        return view('report', compact('months', 'data1', 'data2', 'expenses', 'exp'));
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
     * @param \App\Report $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Report $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Report $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Report $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
