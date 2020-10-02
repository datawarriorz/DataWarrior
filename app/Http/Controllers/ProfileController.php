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
       

        return view('profile/mainProfile', ['user' => $currentuser, 'message' => '','subscription'=>$subscription]);
    }

    public function viewProfile()
    {
        $internship = InternshipPreferences::where('user_id', '=', Auth::user()->user_id)->get();
        $jobexp = Jobexperience::where('user_id', '=', Auth::user()->user_id)->get();
        $skills = UserSkills::where('user_id', '=', Auth::user()->user_id)->get();
        $eduDetails = UserQualification::where('user_id', '=', Auth::user()->user_id)->get();
        $qualificationType = QualificationTypes::all();
        $job = JobPreferences::where('user_id', '=', Auth::user()->user_id)->get();
        $userdetails = User::where('user_id', Auth::user()->user_id)->first();
        $skilllevel = SkillLevel::all();
        
        return view('profile.profile', [
            'skills' => $skills,
            'jobexp' => $jobexp,
            'internship' => $internship,
            'eduDetails' => $eduDetails,
            'qualificationType' => $qualificationType,
            'job' => $job,
            'userdetails' => $userdetails,
            'skilllevel' => $skilllevel,
            
        ]);
    }

    public function updateUser(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'first_name' => 'required|min:3|max:35',
            'last_name' => 'required|min:3|max:35',
            'contact_no' => 'required|numeric|unique:users',
            'date_of_birth' => 'required|min:3|max:20',
            
            
            
        ]);
        if ($validator->fails()) { // on validator found any error
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
        $process = "";
        if ($request->process == "internship") {
            $process = "internship";
        }
        if ($request->process == "job") {
            $process = "job";
        }
        return view('profile/qualificationProfile', ['eduDetails' => $eduDetails, 'qualificationType' => $qualificationType, 'process' => $process]);
    }

    public function updateQualification(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'college_name' => 'required|min:3',
            'university' => 'required|min:3',
            'percentage' => 'required|numeric',
            'course_name' => 'required|alpha_num|min:3',
            'grade' => 'required|alpha',
            'start_date' =>'required|date|before:tomorrow',
            'end_date' =>'required|date|after:start_date',
            'grade' =>'required',

        ], );
        if ($validator->fails()) { // on validator found any error
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
        //dd($qualification);
        

        $qualification->save();
        if ($request->process == "internship") {
            $eduDetails = UserQualification::where('user_id', '=', Auth::user()->user_id)->get();
            $qualificationType = QualificationTypes::all();

            $process = "internship";
            return view('profile/qualificationProfile', ['eduDetails' => $eduDetails, 'process' => $process, 'qualificationType' => $qualificationType]);
        }
        if ($request->process == "job") {
            $eduDetails = UserQualification::where('user_id', '=', Auth::user()->user_id)->get();
            $qualificationType = QualificationTypes::all();

            $process = "job";
            return view('profile/qualificationProfile', ['eduDetails' => $eduDetails, 'process' => $process, 'qualificationType' => $qualificationType]);
        }

        return redirect('/qualification');
    }

    public function deleteQualification(Request $request)
    {
        $res = UserQualification::where('id', '=', $request->qualid)->delete();
        if ($request->process == "internship") {
            $eduDetails = UserQualification::where('user_id', '=', Auth::user()->user_id)->get();
            $qualificationType = QualificationTypes::all();
            $process = "internship";
            return view('profile/qualificationProfile', ['eduDetails' => $eduDetails, 'qualificationType' => $qualificationType, 'process' => $process]);
        }
        if ($request->process == "job") {
            $eduDetails = UserQualification::where('user_id', '=', Auth::user()->user_id)->get();
            $qualificationType = QualificationTypes::all();
            $process = "job";
            return view('profile/qualificationProfile', ['eduDetails' => $eduDetails, 'qualificationType' => $qualificationType, 'process' => $process]);
        }
        return Redirect::back();
    }

    public function jobExperience(Request $request)
    {
        $jobexp = Jobexperience::where('user_id', '=', Auth::user()->user_id)->get();

        $process = "";
        if ($request->process == "internship") {
            $process = "internship";
        }
        if ($request->process == "job") {
            $process = "job";
        }

        return view('profile/jobexperience', ['jobexp' => $jobexp, 'process' => $process]);
    }

    public function updateJobexperience(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'profile' => 'required|min:3',
            'organisation' => 'required|min:3',
            'location' => 'required|min:3',
            'description' => 'required|min:3',
            'start_date' =>'required|date|before:tomorrow',
            'end_date' =>'nullable|date|after:start_date|before:tomorrow',
        ], );
        if ($validator->fails()) { // on validator found any error
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
        if ($request->process == "internship") {
            $jobexp = Jobexperience::where('user_id', '=', Auth::user()->user_id)->get();

            $process = "internship";
            return view('profile/jobexperience', ['jobexp' => $jobexp, 'process' => $process]);
        }
        if ($request->process == "job") {
            $jobexp = Jobexperience::where('user_id', '=', Auth::user()->user_id)->get();

            $process = "job";
            return view('profile/jobexperience', ['jobexp' => $jobexp, 'process' => $process]);
        }

        return redirect('/jobexperience');
    }

    public function deleteJobexperience(Request $request)
    {
        $res = Jobexperience::where('jobid', '=', $request->jobid)->delete();

        if ($request->process == "internship") {
            $jobexp = Jobexperience::where('user_id', '=', Auth::user()->user_id)->get();
            $process = "internship";
            return view('profile/jobexperience', ['jobexp' => $jobexp, 'process' => $process]);
        }
        if ($request->process == "job") {
            $jobexp = Jobexperience::where('user_id', '=', Auth::user()->user_id)->get();
            $process = "job";
            return view('profile/jobexperience', ['jobexp' => $jobexp, 'process' => $process]);
        }

        return Redirect::back();
    }

    public function skills(Request $request)
    {
        $skills = UserSkills::where('user_id', '=', Auth::user()->user_id)->get();
        $skilllevel = Skilllevel::all();
        $process = "";
        if ($request->process == "internship") {
            $process = "internship";
            return view('profile/skillprofile', ['skills' => $skills, 'process' => $process, 'skilllevel' => $skilllevel]);
        }
        if ($request->process == "job") {
            $process = "job";
            return view('profile/skillprofile', ['skills' => $skills, 'process' => $process, 'skilllevel' => $skilllevel]);
        }

        return view('profile/skillprofile', ['skills' => $skills, 'process' => $process, 'skilllevel' => $skilllevel]);
    }

    public function updateSkills(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'skill_name' => 'required|min:2',
        ], );
        if ($validator->fails()) { // on validator found any error
            return redirect('/skills')->withErrors($validator)->withInput();
        }
        $skills = new UserSkills();
        $skills->user_id = Auth::user()->user_id;
        $skills->skill_name = $request->skill_name;
        $skills->skill_level_id = $request->skill_level_id;
        $skilllevel = Skilllevel::all();
        $skills->save();
        if ($request->process == "internship") {
            $skills = UserSkills::where('user_id', '=', Auth::user()->user_id)->get();
            $process = "internship";
            return view('profile/skillprofile', ['skills' => $skills, 'process' => $process, 'skilllevel' => $skilllevel]);
        }
        if ($request->process == "job") {
            $skills = UserSkills::where('user_id', '=', Auth::user()->user_id)->get();
            $process = "job";
            return view('profile/skillprofile', ['skills' => $skills, 'process' => $process, 'skilllevel' => $skilllevel]);
        }

        return redirect('/skills');
    }

    public function deleteSkills(Request $request)
    {
        $skilllevel = Skilllevel::all();
        $res = UserSkills::where('userskills_id', '=', $request->userskills_id)->delete();
        if ($request->process == "internship") {
            $skills = UserSkills::where('user_id', '=', Auth::user()->user_id)->get();
            $process = "internship";
            return view('profile/skillprofile', ['skills' => $skills, 'process' => $process, 'skilllevel' => $skilllevel]);
        }
        if ($request->process == "job") {
            $skills = UserSkills::where('user_id', '=', Auth::user()->user_id)->get();
            $process = "job";
            return view('profile/skillprofile', ['skills' => $skills, 'process' => $process, 'skilllevel' => $skilllevel]);
        }
        
        return Redirect::back();
    }
}
