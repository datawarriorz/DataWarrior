<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobexperience;
use App\UserSkills;
use App\User;
use App\InternshipPreferences;
use App\UserQualification;
use App\QualificationTypes;

use Auth;
use Illuminate\Support\Facades\Validator;


class InternshipController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }
     public function showinternship(){
        
        $internship=InternshipPreferences::where('user_id','=',Auth::user()->user_id)->get();
        
        if(count($internship)!=0){
            $jobexp=Jobexperience::where('user_id','=',Auth::user()->user_id)->get();
            $skills=UserSkills::where('user_id','=',Auth::user()->user_id)->get();
            
            $eduDetails=UserQualification::where('user_id','=',Auth::user()->user_id)->get();
                $qualificationType=QualificationTypes::all();
            return view('internshipfinal',['skills'=>$skills,'jobexp'=>$jobexp,'internship'=>$internship,'eduDetails' => $eduDetails,'qualificationType'=>$qualificationType]);

        }
        $jobexp=Jobexperience::where('user_id','=',Auth::user()->user_id)->get();
        $skills=UserSkills::where('user_id','=',Auth::user()->user_id)->get();
        
        $eduDetails=UserQualification::where('user_id','=',Auth::user()->user_id)->get();
            $qualificationType=QualificationTypes::all();
       return view('internship',['skills'=>$skills,'jobexp'=>$jobexp,'internship'=>$internship,'eduDetails' => $eduDetails,'qualificationType'=>$qualificationType]);
       
    }


    public function applyInternship(Request $request){
    

        $internship =new InternshipPreferences();
        $internship->user_id=Auth::user()->user_id;
        $internship->preferreddomain1=$request->preferreddomain1;
        $internship->preferreddomain2=$request->preferreddomain2;
        $internship->preferreddomain3=$request->preferreddomain3;
        $internship->stipend=$request->stipend;
        $internship->internshiplocation=$request->internshiplocation;
        if($request->counselling==NULL){
            $internship->counselling="No";
        }
        else{
        $internship->counselling=$request->counselling;

        }
        $skills=new UserSkills();
        $skills->user_id=Auth::user()->user_id;
        $skills->skill1=$request->skill1;
        $skills->skill2=$request->skill2;
        $skills->skill3=$request->skill3;
        $jobexp =new Jobexperience();
        $jobexp->user_id=Auth::user()->user_id;
        $jobexp->profile=$request->profile;
        $jobexp->organisation=$request->organisation;
        $jobexp->location=$request->location;
        $jobexp->startdate=$request->startdate;
        $jobexp->enddate=$request->enddate;
        $jobexp->description=$request->description;
        if($request->currentjob==NULL){
            $jobexp->currentjob="No";
        }
        else{
        $jobexp->currentjob=$request->currentjob;
        }
        $qualification =new UserQualification();
        $qualification->user_id=Auth::user()->user_id;
        $qualification->college_name=$request->college_name;
        $qualification->qualtype_id=$request->qualificationtype;
        $qualification->University=$request->university;
        $qualification->start_date=$request->start_date;
        $qualification->end_date=$request->end_date;
        $qualification->percentage=$request->percentage;
        $qualification->course_name=$request->course_name;
        $qualification->grade=$request->grade;
        
        $internship->save();
        $skills->save();
        $jobexp->save();
        $qualification->save();

        return redirect('/internshipfinal');

    }
    

}
