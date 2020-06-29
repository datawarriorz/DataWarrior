<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobexperience;
use App\UserSkills;
use App\User;
use App\InternshipPreferences;
use Auth;
use Illuminate\Support\Facades\Validator;


class Internship extends Controller
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
       return view('internship',['skills'=>$skills,'jobexp'=>$jobexp,'internship'=>$internship]);
       
      
    }
    public function applyInternship(Request $request){
    

        $internship =new InternshipPreferences();
        $internship->user_id=Auth::user()->user_id;
        $internship->preferreddomain1=$request->preferreddomain1;
        $internship->preferreddomain2=$request->preferreddomain2;
        $internship->preferreddomain3=$request->preferreddomain3;
        $internship->stipend=$request->stipend;
        $internship->location=$request->location;
        

        $validator=Validator::make($request->all(), [
            'preferreddomain1' => 'required|min:3',
            'preferreddomain2' => 'required|min:3',
            'preferreddomain3' => 'required|min:3',
            'stipend' => 'required|numeric',
            'location' => 'required',
            
            
            
        ],[]);
        if ($validator->fails()) // on validator found any error 
      {
        return redirect('/internship')->withErrors($validator)->withInput();
      }
        

        $internship->save();
      
    }
    public function internshipSkills(Request $request){

        $validator=Validator::make($request->all(), [
            'skill1' => 'required|min:3',
            'skill2' => 'required|min:3',
            'skill3' => 'required|min:3',
            
        ],[]);
        if ($validator->fails()) // on validator found any error 
      {
        return redirect('/internship')->withErrors($validator)->withInput();
      }
      $skills=new UserSkills();
      $skills->user_id=Auth::user()->user_id;
      $skills->skill1=$request->skill1;
      $skills->skill2=$request->skill2;
      $skills->skill3=$request->skill3;
    
      $skills->save();
    }

    public function internshipExp(Request $request){

         
    $jobexp =new Jobexperience();
    $jobexp->user_id=Auth::user()->user_id;
    $jobexp->profile=$request->profile;
    $jobexp->organisation=$request->organisation;
    $jobexp->location=$request->location;
    $jobexp->startdate=$request->startdate;
    $jobexp->enddate=$request->enddate;
    $jobexp->description=$request->description;
    $jobexp->currentjob=$request->currentjob;
    
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
    return redirect('/internship')->withErrors($validator)->withInput();
  }
    

    $jobexp->save();

    
    
    }
}
