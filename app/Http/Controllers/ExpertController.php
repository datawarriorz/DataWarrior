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
        $qualificationobj=ExQualification::where('ex_id', Auth::user()->ex_id);
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
        $qualificationType = QualificationTypes::all();
        $experienceobj=ExExperience::where('ex_id', '=', Auth::user()->ex_id)->get();

        return view('expert.expert-experience-edit', ['experienceobj' => $experienceobj, 'qualificationType' => $qualificationType]);
    }
    public function deleteexpdetails(Request $request)
    {
        $res = ExExperience::where('exp_id', '=', $request->exp_id)->delete();
        $qualificationType = QualificationTypes::all();
        $experienceobj=ExExperience::where('ex_id', '=', Auth::user()->ex_id)->get();
        return view('expert.expert-experience-edit', ['experienceobj' => $experienceobj, 'qualificationType' => $qualificationType]);
    }
    public function viewexperienceform()
    {
        $qualificationType = QualificationTypes::all();
        $experienceobj=ExExperience::where('ex_id', '=', Auth::user()->ex_id)->get();
        return view('expert.expert-experience-edit', ['experienceobj' => $experienceobj, 'qualificationType' => $qualificationType]);
    }
}
