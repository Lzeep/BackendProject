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
        //
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

        return $financial->add_income($income);


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
