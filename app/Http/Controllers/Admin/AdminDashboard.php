<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Mom;
use App\Models\Notice;

use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
    public function getDashboard()
    {
        $count['nurseCount'] = Notice::count();
        $count['activeNurseCount'] = Notice::whereActive(1)->count();
        $count['blockedNurseCount'] = Notice::whereActive(0)->count();

        $count['hospitalCount'] = Mom::count();
        $count['activeHospitalCount'] = Mom::whereActive(1)->count();
        $count['blockedHospitalCount'] = Mom::whereActive(0)->count();

        $count['userCount'] = User::count();
        $count['activeUserCount'] = User::whereActive(1)->count();
        $count['blockedUserCount'] = User::whereActive(0)->count();

        $nurses = Notice::latest()->limit(5)->get();
        $hospitals = Mom::latest()->limit(5)->get();
        
        return view('admin.dashboard',compact('count','hospitals','nurses'));
    }

    public function userCreateShow()
    {
        return view('admin.user-create');
    }
}
