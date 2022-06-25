<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Faqpage;
use App\Models\Aboutpage;
use App\Models\Notice;
use App\Models\Mom;
use App\Models\Homepage;
use App\Models\ContactUsForm;
use App\Models\Contactuspage;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $homedetails = Homepage::first(); 
        return view('Welcome.home1', compact('homedetails'));
    }

    public function about(Request $request)
    { 
        $about = Aboutpage::first();
        return view('Welcome.about', compact('about'));
    }

    public function gallery(Request $request)
    { 
        return view('Welcome.gallery');
    }

    public function contact(Request $request)
    { 
        $contactuspage = Contactuspage::first();
        return view('Welcome.contact', compact('contactuspage'));
    }

    public function minutes_of_meeting(Request $request)
    { 
        return view('Welcome.mom');
    }

    public function circular_notice(Request $request)
    { 
        return view('Welcome.circular');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
