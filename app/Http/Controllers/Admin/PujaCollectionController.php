<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PujaCollection;
use Illuminate\Support\Facades\Log;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class PujaCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pujacollcetion.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pujacollcetion.create-edit',['pujacollcetion'=>null]);
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
            
            PujaCollection::create([
                'user_id' => $row['user_id'],
                'additional_instructions' => $row['additional_instructions'],
                'discount_amount' => $row['discount_amount'],
                'total_amount' => $row['total_amount'],
                'year' => $row['year'],
                'month' => $row['month'],
                'bill_no' => $row['bill_no'],
                'payment_type' => 1,
                'payment_status' => 2,
                
                

            ]);
        });

        return redirect()->route('puja-collection.index')
                        ->with('success','File uploaded successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pujacollcetion)
    {
        
            return view('admin.pujacollcetion.details', compact('pujacollcetion'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $pujacollcetion = PujaCollection::findOrFail($id);
        return view('admin.pujacollcetion.create-edit',compact('pujacollcetion'));
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
