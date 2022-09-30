<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create-edit', ['user' => null]);
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

            $name = $row['full_name'];
            $splitName = explode(' ', $name, 2); 
            $first_name = $splitName[0];
            $last_name = !empty($splitName[1]) ? $splitName[1] : '';

            
            $email = $first_name.$last_name.'@gmail.com';
            $phone = 9123456789;
            $address = 'Plaza Housing';
            $token = Str::random(4);
            $tower_number = $token;
            $flat_number = $token;
            $nick_name = $tower_number .$flat_number.$last_name;

           $user = User::create([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'active' => $row['active'],
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'tower_number' => $tower_number,
                'flat_number' => $flat_number,
                'nick_name' => $nick_name,
                'password' => 123456,

            ]);

            $user->assignRole('USER');
            
        });

        return redirect()->route('users.index')
                        ->with('success','File uploaded successfully');
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
    public function edit(User $user)
    {
        return view('admin.user.create-edit', compact('user'));
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
