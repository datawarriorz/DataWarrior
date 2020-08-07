<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Auth;
use App\Expert;
use App\ExExperience;
use App\ExQualification;
use App\QualificationTypes;
use App\ExSkills;
use App\SkillLevel;

class ExpertController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:expert');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $articles= Article::where('ex_id', Auth::user()->ex_id)->get();
        return view('expert.expert-dashboard', ['articles' => $articles]);
    }

    public function logoutexpert()
    {
        Auth::logout();
        return view('expert.auth.login');
    }

    public function viewexpertprofile()
    {
        $expertobj=Expert::where('ex_id', Auth::user()->ex_id)->first();
        $qualificationobj=ExQualification::where('ex_id', Auth::user()->ex_id)->get();
        $experienceobj=ExExperience::where('ex_id', Auth::user()->ex_id)->get();
        $skillsobj=ExSkills::where('ex_id', Auth::user()->ex_id)->get();
        $qualificationType = QualificationTypes::all();
        $skilllevel = SkillLevel::all();
        return view('expert.expert-profile', [  'expertobj'=>$expertobj,
                                                'experienceobj'=>$experienceobj,
                                                'qualificationobj'=>$qualificationobj,
                                                'skillsobj'=>$skillsobj,
                                                'skilllevel' => $skilllevel,
                                                'qualificationType' => $qualificationType
                                                ]);
    }
    public function updatebasicdetails(Request $request)
    {
        Expert::where('ex_id', Auth::user()->ex_id)->update([
            'ex_firstname' => $request->ex_firstname,
            'ex_lastname' => $request->ex_lastname,
            'ex_dateofbirth' => $request->ex_dateofbirth,
            'ex_aboutme' => $request->ex_aboutme,
            'ex_description' => $request->ex_description,
            'email' => $request->email,
            'ex_contactcode' => $request->ex_contactcode,
            'ex_contactno' => $request->ex_contactno,
        ]);

        return redirect('/expert-profile');
    }
    public function updatebasicdetailsform()
    {
        $expert=Expert::where('ex_id', Auth::user()->ex_id)->first();
        return view('expert.expert-profile-edit', ['expert'=>$expert]);
    }
    
    //////////////////////////////////////////////////////////////////////////
    public function addexpdetails(Request $request)
    {
        $experienceobj = new ExExperience();
        $experienceobj->exp_profile = $request->exp_profile;
        $experienceobj->exp_organisation = $request->exp_organisation;
        $experienceobj->exp_location = $request->exp_location;
        $experienceobj->exp_description = $request->exp_description;
        $experienceobj->exp_currentjob = $request->exp_currentjob;
        $experienceobj->exp_startdate = $request->exp_startdate;
        $experienceobj->exp_enddate = $request->exp_enddate;
        $experienceobj->ex_id = Auth::user()->ex_id;
        $experienceobj->save();
        
        $experienceobj=ExExperience::where('ex_id', '=', Auth::user()->ex_id)->get();

        return view('expert.expert-experience-edit', ['experienceobj' => $experienceobj]);
    }
    public function deleteexpdetails(Request $request)
    {
        $res = ExExperience::where('exp_id', '=', $request->exp_id)->delete();
        
        $experienceobj=ExExperience::where('ex_id', '=', Auth::user()->ex_id)->get();
        return view('expert.expert-experience-edit', ['experienceobj' => $experienceobj]);
    }
    public function viewexperienceform()
    {
        $experienceobj=ExExperience::where('ex_id', '=', Auth::user()->ex_id)->get();
        return view('expert.expert-experience-edit', ['experienceobj' => $experienceobj]);
    }
    public function updateexpertimage(Request $request)
    {
        $file = $request->file('ex_image');
        // Get the contents of the file
        $contents = $file->openFile()->fread($file->getSize());
        
        Expert::where('ex_id', Auth::user()->ex_id)->update(['ex_image'=>$contents]);
        return redirect('/expert-profile');
    }
    //////////////////////////////////////////////////////////////////////////
    public function addquadetails(Request $request)
    {
        $qualificationobj = new ExQualification();
        $qualificationobj->qualtype_id = $request->qualtype_id;
        $qualificationobj->qua_degree = $request->qua_degree;
        $qualificationobj->qua_univerity = $request->qua_univerity;
        $qualificationobj->ex_id = Auth::user()->ex_id;
        
        $qualificationobj->save();
        $qualificationType = QualificationTypes::all();
        $qualificationobj=ExQualification::where('ex_id', '=', Auth::user()->ex_id)->get();

        return view('expert.expert-qualification-edit', ['qualificationobj' => $qualificationobj, 'qualificationType' => $qualificationType]);
    }
    public function deletequadetails(Request $request)
    {
        $res = ExQualification::where('qua_id', '=', $request->qua_id)->delete();
        $qualificationType = QualificationTypes::all();
        $qualificationobj=ExQualification::where('ex_id', '=', Auth::user()->ex_id)->get();
        return view('expert.expert-qualification-edit', ['qualificationobj' => $qualificationobj, 'qualificationType' => $qualificationType]);
    }
    public function viewqualificationform()
    {
        $qualificationType = QualificationTypes::all();
        $qualificationobj=ExQualification::where('ex_id', '=', Auth::user()->ex_id)->get();
        return view('expert.expert-qualification-edit', ['qualificationobj' => $qualificationobj, 'qualificationType' => $qualificationType]);
    }

    //////////////////////////////////////////////////////////////////////////
    public function addskilldetails(Request $request)
    {
        $skillsobj = new ExSkills();
        $skillsobj->sk_name = $request->sk_name;
        $skillsobj->ex_id = Auth::user()->ex_id;
        
        $skillsobj->save();
        
        $skillsobj=ExSkills::where('ex_id', '=', Auth::user()->ex_id)->get();

        return view('expert.expert-skill-edit', ['skillsobj' => $skillsobj]);
    }
    public function deleteskilldetails(Request $request)
    {
        $res = ExSkills::where('sk_id', '=', $request->sk_id)->delete();
        
        $skillsobj=ExSkills::where('ex_id', '=', Auth::user()->ex_id)->get();
        return view('expert.expert-skill-edit', ['skillsobj' => $skillsobj]);
    }
    public function viewskillform()
    {
        $skillsobj=ExSkills::where('ex_id', '=', Auth::user()->ex_id)->get();
        return view('expert.expert-skill-edit', ['skillsobj' => $skillsobj]);
    }
}
