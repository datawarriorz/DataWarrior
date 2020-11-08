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
use App\Jobs;
use App\JobsApplied;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Certification;
use DB;
use Exception;

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

        return view('expert.modules.profile.profile', [  'expertobj'=>$expertobj,
                                                'experienceobj'=>$experienceobj,
                                                'qualificationobj'=>$qualificationobj,
                                                'skillsobj'=>$skillsobj,
                                                'skilllevel' => $skilllevel,
                                                'qualificationType' => $qualificationType
                                                ]);
    }
    public function updatebasicdetails(Request $request)
    {
        $messages = [
            'ex_firstname.required' => 'Please enter first name',
            'ex_firstname.min' => 'First Name should be more than 3 characters',

            
          ];
        $validator=Validator::make($request->all(), [
            'ex_firstname' => 'required|min:3|max:35',
            'ex_lastname' => 'required|min:3|max:35',
            'ex_dateofbirth' => 'date|before:tomorrow',
            'ex_aboutme' => 'required|min:3|max:150',
            'ex_description' => 'required',
            'ex_contactcode' => 'required|numeric',
            'ex_contactno' => 'required|digits:10',
        ], $messages);
        if ($validator->fails()) { // on validator found any error
            return redirect('/expert-profile-edit')->withErrors($validator)->withInput();
        }
        Expert::where('ex_id', Auth::user()->ex_id)->update([
            'ex_firstname' => $request->ex_firstname,
            'ex_lastname' => $request->ex_lastname,
            'ex_dateofbirth' => $request->ex_dateofbirth,
            'ex_aboutme' => $request->ex_aboutme,
            'ex_description' => $request->ex_description,
            'ex_contactcode' => $request->ex_contactcode,
            'ex_contactno' => $request->ex_contactno,
        ]);

        return redirect('/expert-profile');
    }
    public function updatebasicdetailsform()
    {
        $expert=Expert::where('ex_id', Auth::user()->ex_id)->first();

        return view('expert.modules.profile.edit-basic-details', ['expert'=>$expert]);
    }
    
    //////////////////////////////////////////////////////////////////////////
    public function addexpdetails(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'exp_profile' => 'required|min:3|max:100',
            'exp_organisation' => 'required|min:3|max:100',
            'exp_location' => 'required|min:3|max:50',
            'exp_description' => 'required|min:3|max:191',
            'exp_startdate' =>'required|date|before:tomorrow',
            'exp_enddate' =>'nullable|date|after:start_date|before:tomorrow',
        ]);
        
        if ($validator->fails()) { // on validator found any error
            return redirect('/expert-experience-edit')->withErrors($validator)->withInput();
        }
        DB::beginTransaction();
        try {
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
            DB::commit();

            return view('expert.modules.profile.edit-experience', ['experienceobj' => $experienceobj]);
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
    public function deleteexpdetails(Request $request)
    {
        $res = ExExperience::where('exp_id', '=', $request->exp_id)->delete();
        $experienceobj=ExExperience::where('ex_id', '=', Auth::user()->ex_id)->get();

        return view('expert.modules.profile.edit-experience', ['experienceobj' => $experienceobj]);
    }
    public function viewexperienceform()
    {
        $experienceobj=ExExperience::where('ex_id', '=', Auth::user()->ex_id)->get();
        return view('expert.modules.profile.edit-experience', ['experienceobj' => $experienceobj]);
    }
    public function updateexpertimage(Request $request)
    {
        DB::beginTransaction();

        try {
            $file = $request->file('ex_image');
            // Get the contents of the file
            $contents = $file->openFile()->fread($file->getSize());
        
            Expert::where('ex_id', Auth::user()->ex_id)->update(['ex_image'=>$contents]);
            DB::commit();

            return redirect('/expert-profile');
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
    //////////////////////////////////////////////////////////////////////////
    public function addquadetails(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'qua_degree' => 'required|min:3|max:191',
            'qua_univerity' => 'required|min:3|max:191',
            
        ]);
        if ($validator->fails()) { // on validator found any error
            return redirect('/expert-qualification-edit')->withErrors($validator)->withInput();
        }
        DB::beginTransaction();

        try {
            $qualificationobj = new ExQualification();
            $qualificationobj->qualtype_id = $request->qualtype_id;
            $qualificationobj->qua_degree = $request->qua_degree;
            $qualificationobj->qua_univerity = $request->qua_univerity;
            $qualificationobj->ex_id = Auth::user()->ex_id;
        
            $qualificationobj->save();
            $qualificationType = QualificationTypes::all();
            $qualificationobj=ExQualification::where('ex_id', '=', Auth::user()->ex_id)->get();
            DB::commit();

            return view('expert.modules.profile.edit-qualification', ['qualificationobj' => $qualificationobj, 'qualificationType' => $qualificationType]);
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
    public function deletequadetails(Request $request)
    {
        $res = ExQualification::where('qua_id', '=', $request->qua_id)->delete();
        $qualificationType = QualificationTypes::all();
        $qualificationobj=ExQualification::where('ex_id', '=', Auth::user()->ex_id)->get();
        return view('expert.modules.profile.edit-qualification', ['qualificationobj' => $qualificationobj, 'qualificationType' => $qualificationType]);
    }
    public function viewqualificationform()
    {
        $qualificationType = QualificationTypes::all();
        $qualificationobj=ExQualification::where('ex_id', '=', Auth::user()->ex_id)->get();
        return view('expert.modules.profile.edit-qualification', ['qualificationobj' => $qualificationobj, 'qualificationType' => $qualificationType]);
    }

    //////////////////////////////////////////////////////////////////////////
    public function addskilldetails(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'sk_name' => 'required|min:2|max:20',
            
            
        ]);
        if ($validator->fails()) { // on validator found any error
            return redirect('/expert-skill-edit')->withErrors($validator)->withInput();
        }
        DB::beginTransaction();
        try {
            $skillsobj = new ExSkills();
            $skillsobj->sk_name = $request->sk_name;
            $skillsobj->ex_id = Auth::user()->ex_id;
        
            $skillsobj->save();
            DB::commit();

            $skillsobj=ExSkills::where('ex_id', '=', Auth::user()->ex_id)->get();

            return view('expert.modules.profile.edit-skill', ['skillsobj' => $skillsobj]);
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
    public function deleteskilldetails(Request $request)
    {
        $res = ExSkills::where('sk_id', '=', $request->sk_id)->delete();
        $skillsobj=ExSkills::where('ex_id', '=', Auth::user()->ex_id)->get();

        return view('expert.modules.profile.edit-skill', ['skillsobj' => $skillsobj]);
    }
    public function viewskillform()
    {
        $skillsobj=ExSkills::where('ex_id', '=', Auth::user()->ex_id)->get();

        return view('expert.modules.profile.edit-skill', ['skillsobj' => $skillsobj]);
    }

    ///////////////////////////////////////////////////////////////////////////////////
    public function viewexpertarticles()
    {
        $articlesreview= Article::where('creator_id', Auth::user()->ex_id)->where('creator_flag', 'expert')->where('status', '=', 'review')->get();
        $articleslive= Article::where('creator_id', Auth::user()->ex_id)->where('creator_flag', 'expert')->where('status', '=', 'published')->get();
        
        return view('expert.modules.article.list-articles', ['articlesreview' => $articlesreview,'articleslive'=>$articleslive]);
    }
    
    public function viewarticleform()
    {
        return view('expert.modules.article.post-article');
    }
    
    public function postarticle(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'title' => 'required|min:5|max:191',
            'author' => 'required|min:2|max:191',
            'description' => 'required|max:120',
            'content' => 'required',
            'article_image' => 'required|mimes:jpeg,jpg,png|max:1024',
        ]);
        
        if ($validator->fails()) { // on validator found any error
            return redirect('/expert-postarticle')->withErrors($validator)->withInput();
        }
        DB::beginTransaction();
        try {
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
            DB::commit();

            // $articles= Article::where('ex_id', Auth::user()->ex_id)->get();
            // return view('expert.expert-dashboard', ['articles' => $articles]);
            return view('expert.modules.article.view-article', ['article' => $article]);
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
    public function vieweditarticleform(Request $request)
    {
        $article= Article::find($request->article_id);
        if ($article==null) {
            $article=Article::find($request->old('article_id'));
        }
        return view('expert.modules.article.edit-article', ['article' => $article]);
    }

    public function editarticle(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'title' => 'required|min:5|max:191',
            'author' => 'required|min:2|max:191',
            'description' => 'required|max:120',
            'content' => 'required',
            'article_image' => 'required|mimes:jpeg,jpg,png|max:1024',
        ]);
        $article=Article::find($request->article_id);
        if ($validator->fails()) { // on validator found any error
            
            return redirect('/expert-edit-articleform')->withErrors($validator)->withInput(['article_id' => $article->article_id]);
        }
        DB::beginTransaction();

        try {
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
            DB::commit();
            $article=Article::find($request->article_id);
        
            return view('expert.modules.article.view-article', ['article' => $article]);
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function deletearticle(Request $request)
    {
        DB::beginTransaction();
        try {
            $article= Article::find($request->article_id);
            if ($article->status=="published") {
                $article->status="delete";//if published
                $article->save();
            } else {
                $article->delete();//if not published
            }
            DB::commit();
            return redirect("/expert-listarticles");
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
    
    public function viewarticle(Request $request)
    {
        $article_obj= Article::find($request->article_id);

        return view('expert.modules.article.view-article', ['article' => $article_obj]);
    }
    /////////////////////////////JObs Internship/////////////////
    
    public function postjobform()
    {
        return view('expert.modules.job.post-job');
    }

    public function postjob(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'job_title' => 'required|min:5|max:191',
            'job_description' => 'required|min:5',
            'job_company' => 'required|min:3|max:50',
            'job_domain' => 'required|min:3|max:100',
            'job_shift' => 'required|min:3|max:50',
            'job_location' => 'required|min:3|max:100',
            'job_designation' => 'required|min:3|max:50',
            'job_companywebsite' => 'required|min:3|max:150',
            'job_skills_required' => 'required|min:3|max:100',
            'job_duration' => 'required|min:3|max:50',
            'job_salary' => 'required|min:3|max:50',
            'job_starttime' => 'required|min:3|max:50',
            'job_apply_by' => 'required|date|after:tomorrow',
            'job_openings' => 'required|numeric',
            
        ]);
        if ($validator->fails()) { // on validator found any error
            return redirect('/expert-post-job-form')->withErrors($validator)->withInput();
        }
        DB::beginTransaction();

        try {
            $jobobj = new Jobs();
            $jobobj->job_title=$request->job_title;
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
            DB::commit();

            return redirect('/expertdashboard');
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function viewjobsposted()
    {
        $jobsobj= Jobs::where('creator_id', Auth::user()->ex_id)->where('creator_flag', 'expert')->where('job_type_id', '1')->where('job_status', '!=', 'deleted')->get();
        return view('expert.modules.job.view-jobs-posted', ['jobsobj'=>$jobsobj]);
    }
    
    public function viewjobdetails(Request $request)
    {
        $jobobj=Jobs::find($request->job_id);
        $jobappobj = JobsApplied::where('job_id', $jobobj->job_id)->get();
        $users= User::join('jobs_applied', 'users.user_id', '=', 'jobs_applied.user_id')
        ->where('jobs_applied.job_id', $jobobj->job_id)->get();
        return view('expert.modules.job.view-job', ['jobobj'=>$jobobj,'users'=>$users,'jobappobj'=>$jobappobj]);

        // $jobobj=Jobs::find($request->job_id);
        // $jobappobj = JobsApplied::where('job_id', $jobobj->job_id)->get();
        // $users= User::join('jobs_applied', 'users.user_id', '=', 'jobs_applied.user_id')
        // ->where('jobs_applied.job_id', $jobobj->job_id)->get();
        // return view('expert.modules.job.view-job', ['jobobj'=>$jobobj,'users'=>$users,'jobappobj'=>$jobappobj]);
    }
    public function deletejob(Request $request)
    {
        DB::beginTransaction();

        try {
            $affected = DB::table('jobs')
              ->where('job_id', $request->job_id)
              ->update(['job_status' => 'deleted']);
            DB::commit();

            return redirect('/expert-view-jobs-posted');
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
    public function deleteinternship(Request $request)
    {
        DB::beginTransaction();

        try {
            $affected = DB::table('jobs')
              ->where('job_id', $request->job_id)
              ->update(['job_status' => 'deleted']);
            DB::commit();

            return redirect('/expert-view-internships-posted');
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    
    public function postinternshipform()
    {
        return view('expert.modules.internship.post-internship');
    }

    public function viewinternshipsposted()
    {
        $jobsobj= Jobs::where('creator_id', Auth::user()->ex_id)->where('creator_flag', 'expert')->where('job_type_id', '2')->where('job_status', '!=', 'deleted')->get();
        return view('expert.modules.internship.view-internships-posted', ['jobsobj'=>$jobsobj]);
    }
    
    public function viewinternshipdetails(Request $request)
    {
        $jobobj=Jobs::find($request->job_id);
        $jobappobj = JobsApplied::where('job_id', $jobobj->job_id)->get();
        $users= User::join('jobs_applied', 'users.user_id', '=', 'jobs_applied.user_id')
        ->where('jobs_applied.job_id', $jobobj->job_id)->get();
        return view('expert.modules.internship.view-internship', ['jobobj'=>$jobobj,'users'=>$users,'jobappobj'=>$jobappobj]);
    }
    
    public function postinternship(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'job_title' => 'required|min:5|max:191',
            'job_description' => 'required|min:5',
            'job_company' => 'required|min:3|max:50',
            'job_domain' => 'required|min:3|max:100',
            'job_shift' => 'required|min:3|max:50',
            'job_location' => 'required|min:3|max:100',
            'job_designation' => 'required|min:3|max:50',
            'job_companywebsite' => 'required|min:3|max:150',
            'job_skills_required' => 'required|min:3|max:100',
            'job_duration' => 'required|min:3|max:50',
            'job_salary' => 'required|min:3|max:50',
            'job_starttime' => 'required|min:3|max:50',
            'job_apply_by' => 'required|date|after:tomorrow',
            'job_openings' => 'required|numeric',
            
        ]);
        if ($validator->fails()) { // on validator found any error
            return redirect('/expert-post-internship-form')->withErrors($validator)->withInput();
        }
        DB::beginTransaction();

        try {
            $jobobj = new Jobs();
            $jobobj->job_title=$request->job_title;
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
            DB::commit();

            return redirect('/expertdashboard');
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
    //////////////////////////////////certification///////////

    
    public function postcertificationform()
    {
        return view('expert.modules.certification.post-certification');
    }

    public function postcertification(Request $request)
    {
        $validator=Validator::make($request->all(), [
        'cert_title'=>'required|min:5|max:191',
        'cert_price'=>'required|numeric',
        'cert_description'=>'required|min:5',
        'cert_image'=>'required|mimes:jpeg,jpg,png|max:1024',
        'cert_provider'=>'required|max:191',
        'cert_domain'=>'required|max:191',
        'cert_validationperiod'=>'required|max:191',
        'cert_prerequisites'=>'required|min:5',
        
    ]);
        if ($validator->fails()) { // on validator found any error
            return redirect('/expert-post-certification-form')->withErrors($validator)->withInput();
        }
        DB::beginTransaction();

        try {
            $certification=new Certification();
            $certification->cert_title=$request->cert_title;
            $certification->cert_price=$request->cert_price;
            $certification->cert_description=$request->cert_description;
            $file = $request->file('cert_image');
            // Get the contents of the file
            if ($file!=null) {
                $contents = $file->openFile()->fread($file->getSize());
                $certification->cert_image=$contents;
            } else {
                $certification->cert_image=null;
            }
            $certification->cert_provider=$request->cert_provider;
            $certification->cert_domain=$request->cert_domain;
            $certification->cert_validationperiod=$request->cert_validationperiod;
            $certification->cert_prerequisites=$request->cert_prerequisites;
            $certification->cert_status="open";
        
            $certification->creator_id=Auth::user()->ex_id;
            $certification->creator_flag="expert";

            $certification->save();

            DB::commit();


            return redirect('/expertdashboard');
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function viewcertificationposted()
    {
        $certifications= Certification::where('creator_id', Auth::user()->ex_id)->where('creator_flag', 'expert')->where('cert_status', 'open')->get();

        return view('expert.modules.certification.list-certifications', ['certifications'=>$certifications]);
    }
    public function vieweditcertificationform(Request $request)
    {
        $certification= Certification::find($request->cert_id);
        if ($certification==null) {
            $certification=Certification::find($request->old('cert_id'));
        }
        // dd($certification);
        return view('expert.modules.certification.edit-certification', ['certification' => $certification]);
    }

    
    public function editcertification(Request $request)
    {
        $validator=Validator::make($request->all(), [
        'cert_title'=>'required|min:5|max:191',
        'cert_price'=>'required|numeric',
        'cert_description'=>'required|min:5',
        'cert_image'=>'required|mimes:jpeg,jpg,png|max:1024',
        'cert_provider'=>'required|max:191',
        'cert_domain'=>'required|max:191',
        'cert_validationperiod'=>'required|max:191',
        'cert_prerequisites'=>'required|min:5',
        
    ]);
        DB::beginTransaction();

        try {
            $certification=Certification::find($request->cert_id);
            if ($validator->fails()) { // on validator found any error
                return redirect('/expert-edit-certificationform')->withErrors($validator)->withInput(['cert_id' => $certification->cert_id]);
            }
        
            $certification->cert_title=$request->cert_title;
            $certification->cert_price=$request->cert_price;
            $certification->cert_description=$request->cert_description;
            $file = $request->file('cert_image');
            // Get the contents of the file
            if ($file!=null) {
                $contents = $file->openFile()->fread($file->getSize());
                $certification->cert_image=$contents;
            } else {
                $certification->cert_image=null;
            }
            $certification->cert_provider=$request->cert_provider;
            $certification->cert_domain=$request->cert_domain;
            $certification->cert_validationperiod=$request->cert_validationperiod;
            $certification->cert_prerequisites=$request->cert_prerequisites;
            $certification->cert_status="open";
            $certification->creator_id=Auth::user()->ex_id;
            $certification->creator_flag="expert";
            $certification->save();

            $certification=Certification::find($request->cert_id);
            DB::commit();

            return view('expert.modules.certification.view-certification', ['certification'=> $certification]);
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
    
    public function viewcertification(Request $request)
    {
        $certification= Certification::find($request->cert_id);
        // dd($certification->cert_title);
        return view('expert.modules.certification.view-certification', ['certification' => $certification]);
    }

    public function deletecertification(Request $request)
    {
        DB::beginTransaction();

        try {
            $certification= Certification::find($request->cert_id);
            if ($certification->cert_status=="open") {
                $certification->cert_status="delete";//if published
                $certification->save();
            } else {
                // $certification->delete();//if not published
            }
       
            DB::commit();

            return redirect("/expert-list-certification");
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}
