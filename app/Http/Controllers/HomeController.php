<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUs;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function test()
    {
        return view('test');
    }

    public function contact()
    {
        return view('contact', ['message'=>'',]);
    }

    public function contactusreq(Request $request)
    {
        $contactusobj=new ContactUs();
        $contactusobj->name=$request->name;
        $contactusobj->email=$request->email;
        $contactusobj->subject=$request->subject;
        $contactusobj->description=$request->description;
        $contactusobj->save();
        return view('contact', ['message'=>'Your Request has been registered.',]);
    }
}
