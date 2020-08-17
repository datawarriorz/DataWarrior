<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUs;
use App\Certification;
use App\Article;

class NoAuthController extends Controller
{
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
    public function userallarticles()
    {
        $articleslive=Article::where('status', '=', 'published')->orderByDesc('created_at')->get();
        $cert_obj=Certification::all()->take(3);
        return view('user.user-list-articles', ['articleslive'=>$articleslive, 'cert_obj'=>$cert_obj]);
    }
}
