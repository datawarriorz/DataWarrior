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
    public function showjob()
    {
        $job = JobPreferences::where('user_id', '=', Auth::user()->user_id)->get();

        if (count($job) != 0) {
            $jobexp = Jobexperience::where('user_id', '=', Auth::user()->user_id)->get();
            $skills = UserSkills::where('user_id', '=', Auth::user()->user_id)->get();
            $skilllevel = SkillLevel::all();
            $eduDetails = UserQualification::where('user_id', '=', Auth::user()->user_id)->get();
            $qualificationType = QualificationTypes::all();
            return view('jobfinal', [
                'skills' => $skills,
                'jobexp' => $jobexp, 'job' => $job,
                'eduDetails' => $eduDetails,
                'qualificationType' => $qualificationType,
                'skilllevel' => $skilllevel
            ]);
        }
        $jobexp = Jobexperience::where('user_id', '=', Auth::user()->user_id)->get();
        $skills = UserSkills::where('user_id', '=', Auth::user()->user_id)->get();
        $skilllevel = SkillLevel::all();
        $eduDetails = UserQualification::where('user_id', '=', Auth::user()->user_id)->get();
        $qualificationType = QualificationTypes::all();
        return view('job', [
            'skills' => $skills,
            'jobexp' => $jobexp, 'job' => $job,
            'eduDetails' => $eduDetails,
            'qualificationType' => $qualificationType,
            'skilllevel' => $skilllevel
        ]);
    }

    public function applyJob(Request $request)
    {
        $job = new JobPreferences();
        $job->user_id = Auth::user()->user_id;
        $job->preferreddomain1 = $request->preferreddomain1;
        $job->preferreddomain2 = $request->preferreddomain2;
        $job->preferreddomain3 = $request->preferreddomain3;
        $job->salary = $request->salary;
        $job->joblocation = $request->joblocation;
        if ($request->counselling == null) {
            $job->counselling = "No";
        } else {
            $job->counselling = $request->counselling;
        }
        $job->save();

        return redirect('/jobfinal');
    }

    public function showack()
    {
        return view('/joback');
    }
    
    public function deleteJob(Request $request)
    {
        $res = JobPreferences::where('id', '=', $request->prefid)->delete();
        return redirect()->back();
    }
    ////////////////////////////////////////////////////////////////////////////////


    public function showjobhome()
    {
        return view('user.job.user-job-home', []);
    }
    public function showalljobs(Request $request)
    {
        $jobtype=JobType::where('job_type', 'job')->get();
        $jobsobj=Job::where('job_type_id', $jobtype->job_type_id)->get();
        return view('user.job.user-job-list', ['jobsobj'=>$jobsobj]);
    }
    public function showallinternships(Request $request)
    {
        $jobtype=JobType::where('job_type', 'internship')->get();
        $internshipsobj=Job::where('job_type_id', $jobtype->job_type_id)->get();
        return view('user.internship.user-internship-list', ['internshipsobj'=>$internshipsobj]);
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
        // dd($jobsobj);
        return view('user.job.user-job-list', ['jobsobj'=>$jobsobj]);
    }
    public function showjobdetails(Request $request)
    {
        $jobobj=Jobs::find($request->job_id);
        $jobappobj = JobsApplied::where('user_id', Auth::user()->user_id)->where('job_id', $jobobj->job_id);
        return view('user.job.user-job-details', ['jobobj'=>$jobobj,'jobappobj'=>$jobappobj]);
    }
    public function apply_job(Request $request)
    {
        return view('');
    }
}
