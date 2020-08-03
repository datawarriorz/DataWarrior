<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Auth;
use App\Expert;
use App\ExExperience;
use App\ExQualification;
use App\ExSkills;

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
        $experienceobj=ExExperience::where('ex_id', Auth::user()->ex_id);
        $qualificationobj=ExQualification::where('ex_id', Auth::user()->ex_id);
        $skillsobj=ExSkills::where('ex_id', Auth::user()->ex_id);
        return view('expert.expert-profile', [  'expertobj'=>$expertobj,
                                                'experienceobj'=>$experienceobj,
                                                'qualificationobj'=>$qualificationobj,
                                                'skillsobj'=>$skillsobj
                                                ]);
    }
}
