<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\InternshipPreferences;
use App\JobPreferences;
use Illuminate\Support\Facades\Auth as Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }
    
    public function showDashboard()
    {
        $internship = InternshipPreferences::where('user_id', '=', Auth::user()->user_id)->get();
        $job = JobPreferences::where('user_id', '=', Auth::user()->user_id)->get();
        $userdetails = User::where('user_id', Auth::user()->user_id)->first();
        return view('dashboard', [
            'internship' => $internship,
            'job' => $job,
            'userdetails' => $userdetails
        ]);
    }
}
