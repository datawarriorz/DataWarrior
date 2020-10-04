<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certification;
use App\CertificationApplied;
use App\CertificationRequested;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\Validator;

class CertificationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    public function showallcertification()
    {
        $certification = Certification::all();
        $certificationapplied = CertificationApplied::where('user_id', Auth::user()->user_id)->get();
        return view('user.modules.certification.c-home', ['certification' => $certification, 'certificationapplied' => $certificationapplied]);
    }

    public function requestcertification(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'title' => 'required|min:5|max:191',
            'description' => 'required',
            'provider' => 'required|min:3|max:100',
            
            
        ]);
        if ($validator->fails()) { // on validator found any error
            // pass validator object in withErrors method & also withInput it should be null by default
            return redirect('/certification')->withErrors($validator)->withInput();
        }
        $certificationrequestedobj = new CertificationRequested();
        $certificationrequestedobj->title = $request->title;
        $certificationrequestedobj->description = $request->description;
        $certificationrequestedobj->provider = $request->provider;
        $certificationrequestedobj->user_id = Auth::user()->user_id;
        $certificationrequestedobj->save();
        return view('user.modules.certification.c-request-ack', ['certificationrequestedobj' => $certificationrequestedobj]);
    }

    public function applycertification(Request $request)
    {
        $certificationapplied = new CertificationApplied();
        $certificationapplied->cert_id = $request->cert_id;
        $certificationapplied->user_id = Auth::user()->user_id;
        $certificationapplied->save();
        $certification = Certification::where('cert_id', $request->cert_id)->get();

        return view('user.modules.certification.c-applied-ack', ['certification' => $certification,]);
    }
}
