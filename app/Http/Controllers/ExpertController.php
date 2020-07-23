<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpertController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:expert');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('expert.expert-dashboard');
    }
}
