<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUs;

class NoAuthController extends Controller
{
    //
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

        return redirect()->back();

        // return view('contact', ['message'=>'Your Query has been submitted.',]);
    }
}
