<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use App\User;
use App\UserQualification;
use App\QualificationTypes;
use App\Jobexperience;
use App\UserSkills;
use App\InternshipPreferences;
use App\JobPreferences;
use App\SkillLevel;
use App\Subscription;
use Exception;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    public function userDetails()
    {
        $currentuser = User::where('user_id', Auth::user()->user_id)->first();
        $subscription = Subscription::where('user_id', '=', Auth::user()->user_id)->first();
    
        return view('user.modules.profile.edit-basic-details', ['user' => $currentuser, 'message' => '','subscription'=>$subscription]);
    }

    public function viewProfile()
    {
        $jobexp = Jobexperience::where('user_id', '=', Auth::user()->user_id)->get();
        $skills = UserSkills::where('user_id', '=', Auth::user()->user_id)->get();
        $eduDetails = UserQualification::where('user_id', '=', Auth::user()->user_id)->get();
        $qualificationType = QualificationTypes::all();
        $userdetails = User::where('user_id', Auth::user()->user_id)->first();
        $skilllevel = SkillLevel::all();
        
        return view('user.modules.profile.profile', [
            'skills' => $skills,
            'jobexp' => $jobexp,
            'eduDetails' => $eduDetails,
            'qualificationType' => $qualificationType,
            'userdetails' => $userdetails,
            'skilllevel' => $skilllevel,
        ]);
    }

    public function updateUser(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'first_name' => 'required|min:3|max:35',
            'last_name' => 'min:3|max:35',
            'contact_no' => 'numeric',
            'date_of_birth' => 'required|min:3|max:20',
        ]);
        if ($validator->fails()) {
            return redirect('/userdetails')->withErrors($validator)->withInput();
        }
        $file = $request->file('u_image');
        if ($file != null) {
            $u_image = $file->openFile()->fread($file->getSize());
            User::where('user_id', Auth::user()->user_id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'u_image' => $u_image,
                'contact_no' => $request->contact_no,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender
            ]);
        } else {
            User::where('user_id', Auth::user()->user_id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'contact_no' => $request->contact_no,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender
            ]);
        }
        $subscription = Subscription::where('user_id', '=', Auth::user()->user_id)->get();
        
        if ($request->newsletter=="yes") {
            if ($subscription==null) {
                $subcribe= new Subscription();
                $subcribe->newsletter=$request->newsletter;
                $subcribe->user_id=Auth::user()->user_id;
                $subcribe->save();
            } else {
                Subscription::where('user_id', Auth::user()->user_id)->update([
                    'newsletter'=>$request->newsletter
                ]);
            }
        } else {
            if ($subscription!=null) {
                Subscription::where('user_id', Auth::user()->user_id)->update([
                'newsletter'=>$request->newsletter,
            ]);
            }
        }
        // Get the contents of the file
        return redirect('/viewprofile');
    }

    public function qualificationDetails(Request $request)
    {
        $eduDetails = UserQualification::where('user_id', '=', Auth::user()->user_id)->get();
        $qualificationType = QualificationTypes::all();
        return view('user.modules.profile.edit-qualification', ['eduDetails' => $eduDetails, 'qualificationType' => $qualificationType]);
    }

    public function updateQualification(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'college_name' => 'required|min:3',
            'university' => 'required|min:3',
            'percentage' => 'required|numeric',
            'course_name' => 'required|min:3',
            'grade' => 'required|alpha',
            'start_date' =>'required|date|before:tomorrow',
            'end_date' =>'required|date|after:start_date'
        ]);
        if ($validator->fails()) {
            return redirect('/qualification')->withErrors($validator)->withInput();
        }

        $qualification = new UserQualification();
        $qualification->user_id = Auth::user()->user_id;
        $qualification->college_name = $request->college_name;
        $qualification->qualtype_id = $request->qualificationtype;
        $qualification->University = $request->university;
        $qualification->start_date = $request->start_date;
        $qualification->end_date = $request->end_date;
        $qualification->percentage = $request->percentage;
        $qualification->course_name = $request->course_name;
        $qualification->grade = $request->grade;

        $qualification->save();
        return redirect('/qualification');
    }

    public function deleteQualification(Request $request)
    {
        $res = UserQualification::where('id', '=', $request->qualid)->delete();

        return Redirect::back();
    }

    public function jobExperience(Request $request)
    {
        $jobexp = Jobexperience::where('user_id', '=', Auth::user()->user_id)->get();

        return view('user.modules.profile.edit-experience', ['jobexp' => $jobexp]);
    }

    public function updateJobexperience(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'profile' => 'required|min:3',
            'organisation' => 'required|min:3',
            'location' => 'required|min:3',
            'description' => 'required|min:3',
            'startdate' =>'required|date|before:tomorrow',
            'enddate' =>'nullable|date|after:start_date|before:tomorrow',
        ]);
        if ($validator->fails()) {
            return redirect('/jobexperience')->withErrors($validator)->withInput();
        }
        $jobexp = new Jobexperience();
        $jobexp->user_id = Auth::user()->user_id;
        $jobexp->profile = $request->profile;
        $jobexp->organisation = $request->organisation;
        $jobexp->location = $request->location;
        $jobexp->startdate = $request->startdate;
        $jobexp->enddate = $request->enddate;
        $jobexp->description = $request->description;
        if ($request->currentjob == null) {
            $jobexp->currentjob = "No";
        } else {
            $jobexp->currentjob = $request->currentjob;
        }

        $jobexp->save();

        return redirect('/jobexperience');
    }

    public function deleteJobexperience(Request $request)
    {
        $res = Jobexperience::where('jobid', '=', $request->jobid)->delete();

        return Redirect::back();
    }

    public function skills(Request $request)
    {
        $skills = UserSkills::where('user_id', '=', Auth::user()->user_id)->get();
        $skilllevel = Skilllevel::all();
        $process = "";

        return view('user.modules.profile.edit-skill', ['skills' => $skills, 'skilllevel' => $skilllevel]);
    }

    public function updateSkills(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'skill_name' => 'required|min:2',
        ]);
        if ($validator->fails()) {
            return redirect('/skills')->withErrors($validator)->withInput();
        }
        $skills = new UserSkills();
        $skills->user_id = Auth::user()->user_id;
        $skills->skill_name = $request->skill_name;
        $skills->sl_id = $request->sl_id;
        $skilllevel = Skilllevel::all();
        $skills->save();

        return redirect('/skills');
    }

    public function deleteSkills(Request $request)
    {
        $skilllevel = Skilllevel::all();
        $res = UserSkills::where('userskills_id', '=', $request->userskills_id)->delete();
        
        return Redirect::back();
    }
}
