<?php

namespace App\Http\Controllers;

use App\ExpenseReport;
use Illuminate\Http\Request;

class ExpenseReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return ExpenseReport::all();
        //prueba de que funcionaba el index de ExpenseReport
        return view('expenseReport.index',[
            'expenseReports' => ExpenseReport::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenseReport.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'title'=>'required|min:3'
            ]);

        //dd($validData);

        $report = new ExpenseReport();
        $report -> title = $request -> get('title');
        $report -> save();

        return redirect ('/expense_reports');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(ExpenseReport $expenseReport)
    {
       // $report = ExpenseReport::findOrFail($id);
        return view ('expenseReport.show',[
            'report' => $expenseReport
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = ExpenseReport::findOrFail($id);
        return view ('expenseReport.edit',[
            'report' => $report
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd('put update'); //prueba de que llega al update
        $report = ExpenseReport::findOrFail($id);
        $report->title = $request->get('title');
        $report->save();

        return redirect('/expense_reports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = ExpenseReport::findOrFail($id);
        $report->delete();
        return redirect('/expense_reports');
    }

    /**
     * Confirm register delete
     * @param $id
     */
    public function confirmDelete ($id){
        //dd ('confirmDelete '.$id); //Confirmación que funcionaba y recibía el $id
        $report = ExpenseReport::findOrFail($id);
        return view('expenseReport.confirmDelete',[
            'report' => $report
        ]);
    }
}
