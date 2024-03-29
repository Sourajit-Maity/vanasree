<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MonthlyExpenses;
use Illuminate\Support\Facades\Log;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Carbon\Carbon;
class MonthlyExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.monthlyexpense.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.monthlyexpense.create-edit',['monthlyexpense'=>null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        (new FastExcel)->import(request()->file('file'), function ($row) {


            MonthlyExpenses::create([
                'user_id' => auth()->user()->id,
                'receiver_name' => $row['receiver_name'],
                'discount_amount' => $row['discount_amount'],
                'total_amount' => $row['total_amount'],
                'year' => $row['year'],
                'month' => $row['month'],
                'bill_no' => $row['bill_no'],
                'payment_type' => $row['payment_type'],
                'payment_status' => $row['payment_status'],
                'charges_name' => $row['charges_name'],
                'charge_amount' => $row['charge_amount'],
                'bill_post_date' => $row['bill_post_date'],
                'bill_payment_date' => $row['bill_payment_date'],
                
                

            ]);
        });

        return redirect()->route('monthly-expenses.index')
                        ->with('success','File uploaded successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($monthlyexpense)
    {
        
            return view('admin.monthlyexpense.details', compact('monthlyexpense'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $monthlyexpense = MonthlyExpenses::findOrFail($id);
        return view('admin.monthlyexpense.create-edit',compact('monthlyexpense'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
