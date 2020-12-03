<?php

namespace App\Http\Controllers;

use App\Expert;
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
        $expertsobj=Expert::all();
        return view('user.home', ['expertsobj'=>$expertsobj]);
    }

   
    public function test()
    {
        return view('test');
    }
}
