<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\UserQualification;
use App\QualificationTypes;
use App\Jobexperience;
use App\UserSkills;
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

    public function showProfile(){
      
        $currentuser=User::where('user_id',Auth::user()->user_id)->first();

        return view('profile/mainProfile',['user' => $currentuser,'message' => '']);
       
      
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
    public function qualificationDetails(){
        
       
            
            $eduDetails=UserQualification::where('user_id','=',Auth::user()->user_id)->get();
            $qualificationType=QualificationTypes::all();
            
            return view('profile/qualificationProfile',['eduDetails' => $eduDetails,'qualificationType'=>$qualificationType]);
        
      
        
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
            'garde' => 'required',
            'end_date' =>'required',
            'start_date' =>'required',
            
        ],[]);
        if ($validator->fails()) // on validator found any error 
      {
        return redirect('/qualification')->withErrors($validator)->withInput();
      }
        

        $qualification->save();

        
        return Redirect::back();

        
        

    }
    public function deleteQualification(Request $request){
    
       $res=UserQualification::where('id','=',$request->qualid)->delete();
        
       return Redirect::back();



    }


    public function jobExperience(){
        
       
            
        $jobexp=Jobexperience::where('user_id','=',Auth::user()->user_id)->get();
       
        
        return view('profile/jobexperience',['jobexp'=>$jobexp]);
    
  
    
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

    
    return Redirect::back();

    
    

}
public function deleteJobexperience(Request $request){

   $res=Jobexperience::where('jobid','=',$request->jobid)->delete();
    
   return Redirect::back();



}

public function skills(Request $request){
    $skills=UserSkills::where('user_id','=',Auth::user()->user_id)->get();

    return view('profile/skillprofile',['skills'=>$skills]);



}
public function updateSkills(Request $request){
    $validator=Validator::make($request->all(), [
        'skill1' => 'required|min:3',
        'skill2' => 'required|min:3',
        'skill3' => 'required|min:3',
        
    ],[]);
    if ($validator->fails()) // on validator found any error 
  {
    return redirect('/skills')->withErrors($validator)->withInput();
  }
  $skills=new UserSkills();
  $skills->user_id=Auth::user()->user_id;
  $skills->skill1=$request->skill1;
  $skills->skill2=$request->skill2;
  $skills->skill3=$request->skill3;

  $skills->save();
  return Redirect::back();


}
public function deleteSkills(Request $request){

    $res=UserSkills::where('userskills_id','=',$request->userskills_id)->delete();
     
    return Redirect::back();
 
 
 }
}
