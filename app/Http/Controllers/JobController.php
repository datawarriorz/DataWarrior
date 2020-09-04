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
        $jobtype=JobType::where('job_type', 'job');
        $jobsobj=Job::where('job_type_id', $jobtype->job_type_id);
        return view('user.job.user-job-list', ['jobsobj'=>$jobsobj]);
    }
    public function showallinternships(Request $request)
    {
        $jobtype=JobType::where('job_type', 'internship');
        $internshipsobj=Job::where('job_type_id', $jobtype->job_type_id);
        return view('user.internship.user-internship-list', ['internshipsobj'=>$internshipsobj]);
    }

    public function jobfilterapply(Request $request)
    {
        $jobtype=JobType::where('job_type', 'job');
        $filter=0;
        if ($request->job_domain!=null) {
            $filter=$filter+1;
        }
        if ($request->job_location!=null) {
            $filter=$filter+10;
        }
        if ($request->job_shift!=null) {
            $filter=$filter+100;
        }
        if ($request->job_type_id!=null) {
            $filter=$filter+1000;
        }
        switch ($filter) {
            case 0:
                # code...
                break;
            case 1:
                # code...
                break;
            case 11:
                # code...
                break;
            case 10:
                # code...
                break;
            case 111:
                # code...
                break;
            case 101:
                # code...
                break;
            case 110:
                # code...
                break;
            case 100:
                # code...
                break;
            case 1111:
                # code...
                break;
            case 1110:
                # code...
                break;
            case 1101:
                # code...
                break;
            case 1011:
                # code...
                break;
            case 1100:
                # code...
                break;
            case 1001:
                # code...
                break;
            case 1000:
                # code...
                break;
        }

        $jobsobj=Job::where('job_type_id', $jobtype->job_type_id);
        return view('user.job.user-job-list', ['jobsobj'=>$jobsobj]);
    }
    public function showjobdetails(Request $request)
    {
        return view('');
    }
    public function apply_job(Request $request)
    {
        return view('');
    }
}
