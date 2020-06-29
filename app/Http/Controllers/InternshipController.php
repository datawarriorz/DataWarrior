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
     public function showintership(){
      
        
      
        $jobexp=Jobexperience::where('user_id','=',Auth::user()->user_id)->get();
        $skills=UserSkills::where('user_id','=',Auth::user()->user_id)->get();
        $internship=InternshipPreferences::where('user_id','=',Auth::user()->user_id)->get();
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
        $internship->location=$request->location;
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
        $jobexp->currentjob=$request->currentjob;
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
        

        $validator=Validator::make($request->all(), [
            'preferreddomain1' => 'required|min:3',
            'preferreddomain2' => 'required|min:3',
            'preferreddomain3' => 'required|min:3',
            'stipend' => 'required|numeric',
            'location' => 'required',
            'skill1' => 'required|min:3',
            'skill2' => 'required|min:3',
            'skill3' => 'required|min:3',
            'profile' => 'required|min:3',
            'organisation' => 'required|min:3',
            'location' => 'required|min:3',
            'description' => 'required|min:3',
            'enddate' =>'required',
            'startdate' =>'required',
            'college_name' => 'required|min:3',
            'university' => 'required|min:3',
            'percentage' => 'required|numeric',
            'course_name' => 'required|min:3',
            'garde' => 'required',
            'end_date' =>'required',
            'start_date' =>'required',

            
            
        ],[]);
        if ($validator->fails()) // on validator found any error 
      {
        return redirect('/internship')->withErrors($validator)->withInput();
      }
        

        $internship->save();
        $skills->save();
        $jobexp->save();
        $qualification->save();


      
    }
   
}
