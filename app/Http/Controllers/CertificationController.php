<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certification;
use App\CertificationApplied;
use App\CertificationRequested;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\Validator;
use DB;
use Exception;

class CertificationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    public function showcertifications(Request $request)
    {
        $certification = Certification::where('cert_domain', $request->cert_domain)->where('cert_status', 'open')->get();
        $certificationapplied = CertificationApplied::where('user_id', Auth::user()->user_id)->get();

        return view('user.modules.certification.c-list', ['certification' => $certification, 'certificationapplied' => $certificationapplied]);
    }

    public function certificationdetails($cert_id)
    {
        $certification = Certification::find($cert_id);
        $certificationapplied = CertificationApplied::where('user_id', Auth::user()->user_id)->where('cert_id', $cert_id)->count();

        return view('user.modules.certification.c-details', ['certification' => $certification, 'certificationapplied' => $certificationapplied]);
    }

    public function showcertificationhome()
    {
        return view('user.modules.certification.c-home');
    }

    public function requestcertification(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'title' => 'required|min:5|max:191',
            'description' => 'required',
            'provider' => 'required|min:3|max:100',
            
        ]);
        if ($validator->fails()) {
            return redirect('/certification')->withErrors($validator)->withInput();
        }
        DB::beginTransaction();

        try {
            $certificationrequestedobj = new CertificationRequested();
            $certificationrequestedobj->title = $request->title;
            $certificationrequestedobj->description = $request->description;
            $certificationrequestedobj->provider = $request->provider;
            $certificationrequestedobj->user_id = Auth::user()->user_id;
            $certificationrequestedobj->save();
            DB::commit();

            return view('user.modules.certification.c-request-ack', ['certificationrequestedobj' => $certificationrequestedobj]);
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function applycertification(Request $request)
    {
        DB::beginTransaction();

        try {
            $certificationapplied = new CertificationApplied();
            $certificationapplied->cert_id = $request->cert_id;
            $certificationapplied->user_id = Auth::user()->user_id;
            $certificationapplied->save();
            DB::commit();
            $certification = Certification::where('cert_id', $request->cert_id)->get();

            return view('user.modules.certification.c-applied-ack', ['certification' => $certification,]);
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}
