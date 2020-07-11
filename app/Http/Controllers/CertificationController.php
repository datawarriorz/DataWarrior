<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certification;
use App\CertificationApplied;
use App\CertificationRequested;


class CertificationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    public function showallcertification(){



    }
    public function requestcertification(Request $request){
        


    }
    public function certificationdetails(Request $request){
        


    }
}
