<?php

namespace App\Http\Controllers;

use App\Company;
use App\Financial;
use Illuminate\Http\Request;

class FinancialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('total', ['companies' => Company::where('company_id', 1)]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_income(Request $request)
    {
        $income = collect(['title'=>$request->title, 'sum' => $request->sum, 'date' => $request->date]);


        $financial = Company::find($request->company_id)->financial;

        $financial->add_income($income);

        return response()->json([
            'html_code' => '<tr><td>' . $income['title'] .'</td>
        <td>' . $income['sum'] .'</td>
        <td>' . $income['date'] .'</td></tr>',
            'view' => view('total')->render()
        ]);


    }
    public function store_consumption(Request $request) {
        $consumption = collect(['title' => $request->title, 'sum' => $request->sum, 'date' => $request->date]);
        $financial = Company::find($request->company_id)->financial;
        $financial->add_consumption($consumption);

        return response()->json([
            'html_code' => '<tr><td>' . $consumption['title'] .'</td>
        <td>' . $consumption['sum'] .'</td>
        <td>' . $consumption['date'] .'</td></tr>'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function show(Financial $financial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function edit(Financial $financial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Financial $financial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Financial $financial)
    {
        //
    }
}
