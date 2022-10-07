<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MonthlyCharges;
use Illuminate\Support\Facades\Log;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Carbon\Carbon;
class MonthlyChargesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.monthlycharge.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.monthlycharge.create-edit',['monthlycharge'=>null]);
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
            
            MonthlyCharges::create([
                'received_by_id' => auth()->user()->id,
                'user_id' => $row['user_id'],
                'service_charge' => $row['service_charge'],
                'water_charge' => $row['water_charge'],
                'maintainence_charge' => $row['maintainence_charge'],
                'other_expenses_charge' => $row['other_expenses_charge'],
                'discount_amount' => $row['discount_amount'],
                'total_amount' => $row['total_amount'],
                'year' => $row['year'],
                'month' => $row['month'],
                'bill_no' => $row['bill_no'],
                'payment_type' => $row['payment_type'],
                'payment_status' => $row['payment_status'],
                'security_charge' => $row['security_charge'],
                'electricity_charge' => $row['electricity_charge'],
                'bill_post_date' => $row['bill_post_date'],
                'bill_payment_date' => $row['bill_payment_date'],
                
                

            ]);
        });

        return redirect()->route('monthly-charge.index')
                        ->with('success','File uploaded successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($monthlycharge)
    {
        
            return view('admin.monthlycharge.details', compact('monthlycharge'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $monthlycharge = MonthlyCharges::findOrFail($id);
        return view('admin.monthlycharge.create-edit',compact('monthlycharge'));
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
