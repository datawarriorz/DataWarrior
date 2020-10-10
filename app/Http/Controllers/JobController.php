<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobexperience;
use App\UserSkills;
use App\User;
use App\JobPreferences;
use App\UserQualification;
use App\QualificationTypes;
use App\SkillLevel;
use App\Jobs;
use App\JobsApplied;
use App\JobType;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    public function showjobhome()
    {
        return view('user.modules.job.j-home', []);
    }
    public function showinternshiphome()
    {
        return view('user.modules.internship.i-home', []);
    }
    public function showalljobs(Request $request)
    {
        $jobtype=JobType::where('job_type', 'job')->get();
        $jobsobj=Job::where('job_type_id', $jobtype->job_type_id)->get();
        $jobsappboj=JobsApplied::where('user_id', Auth::user()->user_id)->get();
        return view('user.modules.job.j-list', ['jobsobj'=>$jobsobj,'jobsappboj'=>$jobsappboj]);
    }
    public function showallinternships(Request $request)
    {
        $jobtype=JobType::where('job_type', 'internship')->get();
        $internshipsobj=Job::where('job_type_id', $jobtype->job_type_id)->get();
        $jobsappboj=JobsApplied::where('user_id', Auth::user()->user_id)->get();
        return view('user.modules.internship.i-list', ['internshipsobj'=>$internshipsobj,'jobsappboj'=>$jobsappboj]);
    }

    public function jobfilterapply(Request $request)
    {
        $filter=0;
        if (isset($request->job_domain)) {
            $filter=$filter+1;
            // dd(1);
        }
        if (isset($request->job_location)) {
            $filter=$filter+10;
        }
        if (isset($request->job_shift)) {
            $filter=$filter+100;
            // dd(3);
        }
        if (isset($request->job_type_id)) {
            $filter=$filter+1000;
        }
        
        switch ($filter) {
            case 0:
                $jobsobj=Jobs::where('job_status', 'open');
                break;
            case 1:
                $jobsobj=Jobs::where('job_domain', $request->job_domain)->where('job_status', 'open')->get();
                break;
            case 11:
                $jobsobj=Jobs::where('job_domain', $request->job_domain)->where('job_location', $request->job_location)->where('job_status', 'open')->get();
                break;
            case 10:
                $jobsobj=Jobs::where('job_location', $request->job_location)->where('job_status', 'open')->get();
                break;
            case 111:
                $jobsobj=Jobs::where('job_domain', $request->job_domain)->where('job_location', $request->job_location)->where('job_shift', $request->job_shift)->where('job_status', 'open')->get();
                break;
            case 101:
                $jobsobj=Jobs::where('job_domain', $request->job_domain)->where('job_shift', $request->job_shift)->where('job_status', 'open')->get();
                break;
            case 110:
                $jobsobj=Jobs::where('job_location', $request->job_location)->where('job_shift', $request->job_shift)->where('job_status', 'open')->get();
                break;
            case 100:
                $jobsobj=Jobs::where('job_shift', $request->job_shift)->where('job_status', 'open')->get();
                break;
            case 1111:
                $jobsobj=Jobs::where('job_domain', $request->job_domain)->where('job_location', $request->job_location)->where('job_shift', $request->job_shift)->where('job_type_id', $request->job_type_id)->where('job_status', 'open')->get();
                break;
            case 1110:
                $jobsobj=Jobs::where('job_location', $request->job_location)->where('job_shift', $request->job_shift)->where('job_type_id', $request->job_type_id)->where('job_status', 'open')->get();
                break;
            case 1101:
                $jobsobj=Jobs::where('job_domain', $request->job_domain)->where('job_shift', $request->job_shift)->where('job_type_id', $request->job_type_id)->where('job_status', 'open')->get();
                break;
            case 1011:
                $jobsobj=Jobs::where('job_domain', $request->job_domain)->where('job_location', $request->job_location)->where('job_type_id', $request->job_type_id)->where('job_status', 'open')->get();
                break;
            case 1010:
                $jobsobj=Jobs::where('job_location', $request->job_location)->where('job_type_id', $request->job_type_id)->where('job_type_id', $request->job_type_id)->where('job_status', 'open')->get();
                break;
            case 1100:
                $jobsobj=Jobs::where('job_shift', $request->job_shift)->where('job_type_id', $request->job_type_id)->where('job_status', 'open')->get();
                break;
            case 1001:
                $jobsobj=Jobs::where('job_domain', $request->job_domain)->where('job_type_id', $request->job_type_id)->where('job_status', 'open')->get();
                break;
            case 1000:
                $jobsobj=Jobs::where('job_type_id', $request->job_type_id)->where('job_status', 'open')->get();
                break;
        }
        
        $jobtype=JobType::find($request->job_type_id);
        
        $jobsappboj=JobsApplied::where('user_id', Auth::user()->user_id)->get();
        if ($jobtype->job_type=="job") {
            return view('user.modules.job.j-list', ['jobsobj'=>$jobsobj,'jobsappboj'=>$jobsappboj]);
        } else {
            return view('user.modules.internship.i-list', ['jobsobj'=>$jobsobj,'jobsappboj'=>$jobsappboj]);
        }
    }
    public function showjobdetails(Request $request)
    {
        $jobobj=Jobs::find($request->job_id);
        $jobappobj = JobsApplied::where('user_id', Auth::user()->user_id)->where('job_id', $jobobj->job_id)->count();
        
        return view('user.modules.job.j-details', ['jobobj'=>$jobobj,'jobappobj'=>$jobappobj]);
    }
    public function showinternshipdetails(Request $request)
    {
        $jobobj=Jobs::find($request->job_id);
        $jobappobj = JobsApplied::where('user_id', Auth::user()->user_id)->where('job_id', $jobobj->job_id)->count();
        
        return view('user.modules.internship.i-details', ['jobobj'=>$jobobj,'jobappobj'=>$jobappobj]);
    }
    public function userapplyjob(Request $request)
    {
        $check=JobsApplied::where('user_id', Auth::user()->user_id)->where('job_id', $request->job_id)->count();
        
        if ($check==0) {
            $jobappobj=new JobsApplied();
            $jobappobj->ja_status='applied';
            $jobappobj->user_id=Auth::user()->user_id;
            $jobappobj->job_id=$request->job_id;
            $jobappobj->save();
        }
        
        return redirect()->route(
            'viewjobdetails',
            ['job_id' => $request->job_id]
        );
    }
    public function userapplyinternship(Request $request)
    {
        $check=JobsApplied::where('user_id', Auth::user()->user_id)->where('job_id', $request->job_id)->count();
        if ($check==0) {
            $jobappobj=new JobsApplied();
            $jobappobj->ja_status='applied';
            $jobappobj->user_id=Auth::user()->user_id;
            $jobappobj->job_id=$request->job_id;
            $jobappobj->save();
        }
        return redirect()->route(
            'viewinternshipdetails',
            ['job_id' => $request->job_id]
        );
    }
}
