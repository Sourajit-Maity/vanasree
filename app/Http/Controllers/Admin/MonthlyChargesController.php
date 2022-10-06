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
                'user_id' => $row['user_id'],
                'discount_amount' => $row['discount_amount'],
                'total_amount' => $row['total_amount'],
                'year' => $row['year'],
                'month' => $row['month'],
                'bill_no' => $row['bill_no'],
                'payment_type' => 1,
                'payment_status' => 2,
                
                

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
