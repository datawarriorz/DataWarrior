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
        $articles= Article::where('creator_id', Auth::user()->ex_id)->where('creator_flag', 'expert')->get();
        return view('expert.expert-dashboard', ['articles' => $articles]);
    }

    public function logoutexpert()
    {
        Auth::logout();
        return view('expert.auth.login');
    }
    public function getlogoutexpert()
    {
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
    

    ///////////////////////////////////////////////////////////////////////////////////
    public function viewexpertarticles()
    {
        $articlesreview= Article::where('creator_id', Auth::user()->ex_id)->where('creator_flag', 'expert')->where('status', '=', 'review')->get();
        $articleslive= Article::where('creator_id', Auth::user()->ex_id)->where('creator_flag', 'expert')->where('status', '=', 'published')->get();
        
        

        return view('expert.expert-listarticles', ['articlesreview' => $articlesreview,'articleslive'=>$articleslive]);
    }
    
    public function viewarticleform()
    {
        return view('expert.expert-postarticle');
    }
    
    public function postarticle(Request $request)
    {
        $article=new Article();
        $article->title=$request->title;
        $article->creator_id=Auth::user()->ex_id;
        $article->creator_flag="expert";
        $article->author=$request->author;
        $article->description=$request->description;
        $article->content=$request->content;
        $file = $request->file('article_image');
        // Get the contents of the file
        if ($file!=null) {
            $contents = $file->openFile()->fread($file->getSize());
            $article->article_image=$contents;
        }
        $article->status="review";
        $article->save();
        // $articles= Article::where('ex_id', Auth::user()->ex_id)->get();
        // return view('expert.expert-dashboard', ['articles' => $articles]);
        return view('expert.expert-viewarticle', ['article' => $article]);
    }
    public function vieweditarticleform(Request $request)
    {
        $article= Article::find($request->article_id);
        
        return view('expert.expert-edit-article', ['article' => $article]);
    }

    public function editarticle(Request $request)
    {
        $article=Article::find($request->article_id);
        $article->title=$request->title;
        $article->creator_id=Auth::user()->ex_id;
        $article->creator_flag="expert";
        $article->author=$request->author;
        $article->description=$request->description;
        $article->content=$request->content;
        $file = $request->file('article_image');
        // Get the contents of the file
        if ($file!=null) {
            $contents = $file->openFile()->fread($file->getSize());
            $article->article_image=$contents;
        } else {
            $article->article_image=null;
        }
        $article->status="review";
        $article->save();
        $article=Article::find($request->article_id);
        
        return view('expert.expert-viewarticle', ['article' => $article]);
    }

    public function deletearticle(Request $request)
    {
        $article= Article::find($request->article_id);
        if ($article->status=="published") {
            $article->status="delete";//if published
            $article->save();
        } else {
            $article->delete();//if not published
        }
       

        return redirect("/expert-listarticles");
    }
    
    public function viewarticle(Request $request)
    {
        $article_obj= Article::find($request->article_id);

        return view('expert.expert-viewarticle', ['article' => $article_obj]);
    }
    /////////////////////////////JObs Internship/////////////////
    
    public function viewjobsposted()
    {
        $jobsobj= Jobs::where('creator_id', Auth::user()->ex_id)->where('creator_flag', 'expert');
        //return view('ex-post-job-form');
    }
    public function postjobform()
    {
        return view('ex-post-job-form');
    }
    public function postjob(Request $request)
    {
        $jobobj = new Jobs();
        $jobobj->job_title	=$request->job_title;
        $jobobj->job_description=$request->job_description;
        $jobobj->job_status='open';
        $jobobj->job_company=$request->job_company;
        $jobobj->job_domain=$request->job_domain;
        $jobobj->job_shift=$request->job_shift;
        $jobobj->job_location=$request->job_location;
        $jobobj->job_designation=$request->job_designation;
        $jobobj->job_companywebsite=$request->job_companywebsite;
        $jobobj->job_type_id=$request->job_type_id;
        $jobobj->job_skills_required=$request->job_skills_required;
        $jobobj->job_duration=$request->job_duration;
        $jobobj->job_salary=$request->job_salary;
        $jobobj->job_starttime=$request->job_starttime;
        $jobobj->job_apply_by=$request->job_apply_by;
        $jobobj->job_openings=$request->job_openings;
        $jobobj->creator_id=Auth::user()->ex_id;
        $jobobj->creator_flag='expert';
        $jobobj->save();

        return redirect('/expertdashboard');
    }
}
