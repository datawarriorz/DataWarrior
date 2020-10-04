<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUs;
use App\Expert;
use App\Article;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('user.home');
    }

   
    public function test()
    {
        return view('test');
    }
}
