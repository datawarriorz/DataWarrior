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
use Auth;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }
    public function showjob()
    {
        $job=JobPreferences::where('user_id', '=', Auth::user()->user_id)->get();
        
        if (count($job)!=0) {
            $jobexp=Jobexperience::where('user_id', '=', Auth::user()->user_id)->get();
            $skills=UserSkills::where('user_id', '=', Auth::user()->user_id)->get();
            $skilllevel=SkillLevel::all();
            $eduDetails=UserQualification::where('user_id', '=', Auth::user()->user_id)->get();
            $qualificationType=QualificationTypes::all();
            return view('jobfinal', ['skills'=>$skills,
                        'jobexp'=>$jobexp,'job'=>$job,
                        'eduDetails' => $eduDetails,
                        'qualificationType'=>$qualificationType,
                        'skilllevel'=>$skilllevel]);
        }
        $jobexp=Jobexperience::where('user_id', '=', Auth::user()->user_id)->get();
        $skills=UserSkills::where('user_id', '=', Auth::user()->user_id)->get();
        $skilllevel=SkillLevel::all();
        $eduDetails=UserQualification::where('user_id', '=', Auth::user()->user_id)->get();
        $qualificationType=QualificationTypes::all();
        return view('job', ['skills'=>$skills,
                    'jobexp'=>$jobexp,'job'=>$job,
                    'eduDetails' => $eduDetails,
                    'qualificationType'=>$qualificationType,
                    'skilllevel'=>$skilllevel]);
    }


    public function applyJob(Request $request)
    {
        $job =new JobPreferences();
        $job->user_id=Auth::user()->user_id;
        $job->preferreddomain1=$request->preferreddomain1;
        $job->preferreddomain2=$request->preferreddomain2;
        $job->preferreddomain3=$request->preferreddomain3;
        $job->salary=$request->salary;
        $job->joblocation=$request->joblocation;
        if ($request->counselling==null) {
            $job->counselling="No";
        } else {
            $job->counselling=$request->counselling;
        }
       
        $job->save();
       

        return redirect('/jobfinal');
    }
}
