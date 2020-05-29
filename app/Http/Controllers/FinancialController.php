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
    public function store_income(Request $request)
    {
        $income = collect(['title' => $request->title, 'sum' => $request->sum, 'date' => $request->date]);
        $company = Company::find($request->company_id);
        $financial = $company->financial;
        $num = $financial->add_income($income);
        $view = view('total', ['company' => $company])->render();

        return response()->json([
            'html_code' => '<tr><td>' . $income['title'] . '</td>
        <td>' . $income['sum'] . '</td>
        <td>' . $income['date'] . '</td><td>
        <button data-id="' . $num . '" data-title="consumption" class="btn btn-danger income_delete">Delete</button>
        <button data-id="' . $num . '" data-title="consumption" class="btn btn-primary income_delete">Edit</button>
        </td>
        
         </tr>',
            'view' => $view,

        ]);


    }

    public function store_consumption(Request $request)
    {
        $consumption = collect(['title' => $request->title, 'sum' => $request->sum, 'date' => $request->date]);

        $company = Company::find($request->company_id);
        $financial = $company->financial;
        $num = $financial->add_consumption($consumption);
        $view = view('total', ['company' => $company])->render();
        return response()->json([
            'html_code' => '
        <tr>
            <td>' . $consumption['title'] . '</td>
            <td>' . $consumption['sum'] . '</td>
            <td>' . $consumption['date'] . '</td>
         <td>
         <button data-id="' . $num . '" data-title="consumption" class="btn btn-danger income_delete">Delete</button>
         <button type="button" data-id="' . $num . '" data-title="consumption" class="btn btn-primary edit"data-toggle="modal" data-target="#EditModal">
                                Edit
                            </button>
         </td>
         </tr>',
            'view' => $view
        ]);
    }

    public function ajax_delete(Request $request)
    {
        $financial = Company::find($request->company_id)->financial;
        if ($request->title == "income") {
            $income = collect($financial->income);
            unset($income[(int)$request->id]);
            $financial->income = $income;
            $financial->save();
        } else {
            $consumption = collect($financial->consumption);
            unset($consumption[(int)$request->id]);
            $financial->consumption = $consumption;
            $financial->save();

        }

    }

    public function ajax_edit(Request $request) {
//        dd($request);
        $company = Company::find($request->company_id);
        $financial = $company->financial;
        if($request->type == "consumption"){
            $consumptions = collect($financial->consumption);
            $consumptions[(int)$request->id] = collect(['title' => $request->title, 'sum' => $request->sum, 'date' => $request->date]);
            $financial->consumption = $consumptions;
            $financial->save();

        }
        else{
            $incomes = collect($financial->income);
            $incomes[(int)$request->id] = collect(['title' => $request->title, 'sum' => $request->sum, 'date' => $request->date]);
            $financial->income = $incomes;
            $financial->save();
        }
        $view = view('total', ['company' => $company])->render();


        return response()->json([
            'view' => $view
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param \App\Financial $financial
     * @return \Illuminate\Http\Response
     */
    public function show(Financial $financial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Financial $financial
     * @return \Illuminate\Http\Response
     */
    public function edit(Financial $financial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Financial $financial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Financial $financial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Financial $financial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Financial $financial)
    {
        //
    }
}
