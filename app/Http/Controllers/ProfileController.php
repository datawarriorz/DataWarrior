<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\UserQualification;
use App\QualificationTypes;
use App\Jobexperience;
use App\UserSkills;
use App\InternshipPreferences;
use App\JobPreferences;
use Exception;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class ProfileController extends Controller
{
    //
    
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    public function userDetails(){
      
        $currentuser=User::where('user_id',Auth::user()->user_id)->first();

        return view('profile/mainProfile',['user' => $currentuser,'message' => '']);
        
      
    }
    public function viewProfile(){
      
        $internship=InternshipPreferences::where('user_id','=',Auth::user()->user_id)->get();
        $jobexp=Jobexperience::where('user_id','=',Auth::user()->user_id)->get();
        $skills=UserSkills::where('user_id','=',Auth::user()->user_id)->get();  
        $eduDetails=UserQualification::where('user_id','=',Auth::user()->user_id)->get();
        $qualificationType=QualificationTypes::all();
        $job=JobPreferences::where('user_id','=',Auth::user()->user_id)->get();
        $userdetails=User::where('user_id',Auth::user()->user_id)->first();
       return view('profile.profile',['skills'=>$skills,
                                'jobexp'=>$jobexp,
                                'internship'=>$internship,
                                'eduDetails' => $eduDetails,
                                'qualificationType'=>$qualificationType,
                                'job'=>$job,
                                'userdetails'=>$userdetails]);
      
    }
    public function updateUser(Request $request){
        try{
            Validator::make($request->all(), [
                'firstname' => 'required|min:3|max:35',
                'lastname' => 'required|min:3|max:35',
                'email' => 'required|email|unique:users',
                'contact_no' => 'required|numeric|unique:users',
                'password' => 'required|min:3|max:20',
                'confirm' => 'required|min:3|max:20|same:password',
                'dateofbirth' => 'required',
            ]);
        User::where('user_id', Auth::user()->user_id)->update(
        ['first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'contact_no' => $request->contact_no,
        'date_of_birth' => $request->date_of_birth,
        'gender' => $request->gender,
        ]);
            return Redirect::back()->with(['message' => 'Records Updated','user' => Auth::user()]);
            
        
        }
        catch(Exception $e){

            return view('profile/mainProfile',['message' => 'Something went wrong','user' => Auth::user()]);

        }
        
    }
    public function qualificationDetails(Request $request){
        
       
            
            $eduDetails=UserQualification::where('user_id','=',Auth::user()->user_id)->get();
            $qualificationType=QualificationTypes::all();
            $process="";
            if($request->process=="internship"){
                $process="internship";

            }
            if($request->process=="job"){
                $process="job";

            }
            return view('profile/qualificationProfile',['eduDetails' => $eduDetails,'qualificationType'=>$qualificationType,'process'=>$process]);
        
      
        
    }


    public function updateQualification(Request $request){
        
        
        
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
        //dd($qualification);

        $validator=Validator::make($request->all(), [
            'college_name' => 'required|min:3',
            'university' => 'required|min:3',
            'percentage' => 'required|numeric',
            'course_name' => 'required|min:3',
            'grade' => 'required',
            'end_date' =>'required',
            'start_date' =>'required',
            
        ],[]);
        if ($validator->fails()) // on validator found any error 
      {
        return redirect('/qualification')->withErrors($validator)->withInput();
      }
        

        $qualification->save();
        if($request->process=="internship"){
            $eduDetails=UserQualification::where('user_id','=',Auth::user()->user_id)->get();
            $qualificationType=QualificationTypes::all();
    
            $process="internship";
            return view('profile/qualificationProfile',['eduDetails'=>$eduDetails,'process'=>$process,'qualificationType'=>$qualificationType]);
        }
        if($request->process=="job"){
            $eduDetails=UserQualification::where('user_id','=',Auth::user()->user_id)->get();
            $qualificationType=QualificationTypes::all();
    
            $process="job";
            return view('profile/qualificationProfile',['eduDetails'=>$eduDetails,'process'=>$process,'qualificationType'=>$qualificationType]);
        }
        
        return redirect('/qualification');


    }
    public function deleteQualification(Request $request){
    
       $res=UserQualification::where('id','=',$request->qualid)->delete();
       if($request->process=="internship"){
        $eduDetails=UserQualification::where('user_id','=',Auth::user()->user_id)->get();
        $qualificationType=QualificationTypes::all();
        $process="internship";
        return view('profile/qualificationProfile',['eduDetails' => $eduDetails,'qualificationType'=>$qualificationType,'process'=>$process]);

    }
    if($request->process=="job"){
        $eduDetails=UserQualification::where('user_id','=',Auth::user()->user_id)->get();
        $qualificationType=QualificationTypes::all();
        $process="job";
        return view('profile/qualificationProfile',['eduDetails' => $eduDetails,'qualificationType'=>$qualificationType,'process'=>$process]);

    }
        return Redirect::back();

    }


    public function jobExperience(Request $request){
            
        $jobexp=Jobexperience::where('user_id','=',Auth::user()->user_id)->get();
       
        $process="";
    if($request->process=="internship"){
        $process="internship";
    }
    if($request->process=="job"){
        $process="job";
    }
        return view('profile/jobexperience',['jobexp'=>$jobexp,'process'=>$process]);
    
  
    
}


public function updateJobexperience(Request $request){
    
    
    
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
    
    //dd($qualification);

    $validator=Validator::make($request->all(), [
        'profile' => 'required|min:3',
        'organisation' => 'required|min:3',
        'location' => 'required|min:3',
        'description' => 'required|min:3',
        'enddate' =>'required',
        'startdate' =>'required',
        
    ],[]);
    if ($validator->fails()) // on validator found any error 
  {
    return redirect('/jobexperience')->withErrors($validator)->withInput();
  }
    

    $jobexp->save();
    if($request->process=="internship"){
        $jobexp=Jobexperience::where('user_id','=',Auth::user()->user_id)->get();

        $process="internship";
        return view('profile/jobexperience',['jobexp'=>$jobexp,'process'=>$process]);
    }
    if($request->process=="job"){
        $jobexp=Jobexperience::where('user_id','=',Auth::user()->user_id)->get();

        $process="job";
        return view('profile/jobexperience',['jobexp'=>$jobexp,'process'=>$process]);
    }
      
    
    return redirect('/jobexperience');


}
public function deleteJobexperience(Request $request){

   $res=Jobexperience::where('jobid','=',$request->jobid)->delete();
   
   if($request->process=="internship"){
    $jobexp=Jobexperience::where('user_id','=',Auth::user()->user_id)->get();
    $process="internship";
    return view('profile/jobexperience',['jobexp'=>$jobexp,'process'=>$process]);
}
if($request->process=="job"){
    $jobexp=Jobexperience::where('user_id','=',Auth::user()->user_id)->get();
    $process="job";
    return view('profile/jobexperience',['jobexp'=>$jobexp,'process'=>$process]);
}
    return Redirect::back();

}

public function skills(Request $request){
    $skills=UserSkills::where('user_id','=',Auth::user()->user_id)->get();
    $process="";
    if($request->process=="internship"){
        $process="internship";
        return view('profile/skillprofile',['skills'=>$skills,'process'=>$process]);
    }
    if($request->process=="job"){
        $process="job";
        return view('profile/skillprofile',['skills'=>$skills,'process'=>$process]);
    }

    return view('profile/skillprofile',['skills'=>$skills,'process'=>$process]);



}
public function updateSkills(Request $request){
    $validator=Validator::make($request->all(), [
        'skill' => 'required|min:3',
        
        
        
    ],[]);
    if ($validator->fails()) // on validator found any error 
  {
    return redirect('/skills')->withErrors($validator)->withInput();
  }
  $skills=new UserSkills();
  $skills->user_id=Auth::user()->user_id;
  $skills->skill=$request->skill;
  $skills->experience_level=$request->experience_level;

  $skills->save();
  if($request->process=="internship"){
    $skills=UserSkills::where('user_id','=',Auth::user()->user_id)->get();
    $process="internship";
    return view('profile/skillprofile',['skills'=>$skills,'process'=>$process]);
}
if($request->process=="job"){
    $skills=UserSkills::where('user_id','=',Auth::user()->user_id)->get();
    $process="job";
    return view('profile/skillprofile',['skills'=>$skills,'process'=>$process]);
}
  return redirect('/skills');



}
public function deleteSkills(Request $request){

    $res=UserSkills::where('userskills_id','=',$request->userskills_id)->delete();
    if($request->process=="internship"){
        $skills=UserSkills::where('user_id','=',Auth::user()->user_id)->get();
        $process="internship";
        return view('profile/skillprofile',['skills'=>$skills,'process'=>$process]);

    }
    if($request->process=="job"){
        $skills=UserSkills::where('user_id','=',Auth::user()->user_id)->get();
        $process="job";
        return view('profile/skillprofile',['skills'=>$skills,'process'=>$process]);

    }
     return Redirect::back();
 
 
 }
}
