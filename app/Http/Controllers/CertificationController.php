<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certification;
use App\CertificationApplied;
use App\CertificationRequested;
use Auth;



class CertificationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    public function showallcertification(){
        $certification=Certification::all();
        $certificationapplied=CertificationApplied::where('user_id', Auth::user()->user_id)->get();
        return view('certification', ['certification'=>$certification,'certificationapplied'=>$certificationapplied]);


    }
    public function requestcertification(Request $request){
        


    }
    public function applycertification(Request $request){
        $certificationapplied =new CertificationApplied();
        $certificationapplied->cert_id=$request->cert_id;
        $certificationapplied->user_id=Auth::user()->user_id;
        $certificationapplied->save();
        $certification=Certification::where('cert_id',$request->cert_id)->get();

        return view('certificationack', ['certification'=>$certification,]);

    }
}
