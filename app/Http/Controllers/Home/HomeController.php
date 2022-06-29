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
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
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
        $moms = Mom::where('active',1)->orderBy('mom_date', 'DESC')->paginate(15);
        return view('Welcome.mom',compact('moms'));
    }

    public function circular_notice(Request $request)
    { 
        $notices = Notice::where('active',1)->orderBy('notice_date', 'DESC')->paginate(15);
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
            "username" =>  "required",
            "password" =>  "required",
        ]);
        $input = $request->all();
        $useremail = User::where("email", $request->email)->role('USER')->first();
        $username = User::where("username", $request->user_name)->role('USER')->first();
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        //$user = User::where("email", $request->email)->role('USER')->first();

        if (is_null($useremail || $username)) {
            return redirect()->back()->with('success', 'User Not Found.');
        }

        if(Auth::attempt(array($fieldType => $input['username'], 'password' => $input['password']))) {            $user  =  Auth::user();
            return Redirect::to('/')->with('success', 'User Login Successfully!');
        } 
        else {
            return redirect()->back()->with('success', '"Whoops! invalid credential.');
        }
    }

    public function logoutClient()
    {
        Session::flush();
        Auth::logout();

        return Redirect::to('/');
    }
    public function myAccount()
    {
        return view('Welcome.my-account');
    }

    public function editAccount()
    {
        $currentuserid = Auth::user()->id;
        $users = User::findOrFail($currentuserid);
        return view('Welcome.edit-account', compact('users'));
    }

    public function updateAccount(Request $request)
    {
        $currentuserid = Auth::user()->id;
        
        $this->validate($request, [
            'first_name' => 'required|regex:/^[a-zA-Z]+$/u',
            'last_name' => 'required|regex:/^[a-zA-Z]+$/u',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($currentuserid), 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],       
            'phone' => 'required|regex:/^([0-9\s+\(\)]*)$/',
            'flat_number' => 'required',
            'tower_number' => 'required',
        ]);

        $user = User::findOrFail($currentuserid);

        $inputs = $request->all();
       

        if ($request->hasFile('profile_photo_path')) {
            $fileName = time().'.'.$request->profile_photo_path->extension();  
            $request->profile_photo_path->move(public_path('/assets/images/'), $fileName);
            $user->profile_photo_path= $fileName;
          }

        $user->update($inputs);


        return redirect()->back()
            ->with('success', 'Updated successfully.');
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
