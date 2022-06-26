<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Design;
use App\Models\Aboutpage;
use App\Models\Notice;
use App\Models\Mom;
use App\Models\Homepage;
use App\Models\ContactUsForm;
use App\Models\Contactuspage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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
        $images = Design::where('active',1)->get();
        return view('Welcome.gallery',compact('images'));
    }

    public function contact(Request $request)
    { 
        $contactuspage = Contactuspage::first();
        return view('Welcome.contact', compact('contactuspage'));
    }

    public function minutes_of_meeting(Request $request)
    { 
        $moms = Mom::where('active',1)->get();
        return view('Welcome.mom',compact('moms'));
    }

    public function circular_notice(Request $request)
    { 
        $notices = Notice::where('active',1)->get();
        return view('Welcome.circular',compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactUsSubmit(Request $request)
    {
        //dd($request->all()); 

        request()->validate([
            'full_name' => 'required',
            'email' => 'required|email|max:255|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'phone' => 'required|regex:/^([0-9\s+\(\)]*)$/',
            'message' => 'required',
        ]);
        $inputs = $request->all();
        $contact = ContactUsForm::create($inputs);

        return redirect()->back()
            ->with('success', 'Message Submitted successfully.');
    }

    public function loginClient(Request $request)
    {

        request()->validate([
            "email" =>  "required|email",
            "password" =>  "required",
        ]);


        $user = User::where("email", $request->email)->role('USER')->first();

        if (is_null($user)) {
            return redirect()->back()->with('success', 'Email Not Found.');
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user  =  Auth::user();
            return Redirect::to('/')->with('success', 'User Login Successfully!');
        } else {
            return redirect()->back()->with('success', '"Whoops! invalid password.');
        }
    }

    public function logoutClient()
    {
        Session::flush();
        Auth::logout();

        return Redirect::to('/');
    }

    public function create()
    {
        
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
