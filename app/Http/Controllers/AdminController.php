<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\Newsletter;
use App\Counselor;
use App\Expert;
use App\Article;
use App\Projects;
use App\Jobs;
use DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Exception;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('admin.admin-dashboard');
    }

    public function logoutadmin()
    {
        Auth::logout();

        return view('admin.auth.login');
    }
    public function getlogoutadmin()
    {
        Auth::logout();

        return view('admin.auth.login');
    }

    public function postarticle(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'title' => 'required|min:5|max:191',
            'author' => 'required|min:2|max:191',
            'description' => 'required',
            'content' => 'required',
            'article_image' => 'required|mimes:jpeg,jpg,png|max:1024',
        ]);
        if ($validator->fails()) { // on validator found any error
            return redirect('/admin-postarticle')->withErrors($validator)->withInput();
        }
            
        DB::beginTransaction();

        try {
            $article=new Article();
            $article->title=$request->title;
            $article->creator_id=Auth::user()->admin_id;
            $article->creator_flag="admin";
            $article->author=$request->author;
            $article->description=$request->description;
            $article->content=$request->content;
            $file = $request->file('article_image');
            // Get the contents of the file
            $contents = $file->openFile()->fread($file->getSize());
            $article->article_image=$contents;
       
            $article->status="review";
            $article->save();
            DB::commit();

            // $articles= Article::where('ex_id', Auth::user()->ex_id)->get();
            // return view('expert.expert-dashboard', ['articles' => $articles]);
            return view('admin.modules.article.view-article', ['article' => $article]);
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function viewarticle(Request $request)
    {
        $article=Article::find($request->article_id);
        
        return view('admin.modules.article.view-article', ['article' => $article]);
    }

    public function publisharticle(Request $request)
    {
        DB::beginTransaction();

        try {
            Article::where('article_id', $request->article_id)->update([
            'status'=>'published'
        ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        $users = DB::table('users')
            ->join('subscription', 'users.user_id', '=', 'subscription.user_id')
            ->where('subscription.newsletter', '=', 'yes')
            ->select('users.email')
            ->get();
        $article=Article::find($request->article_id);
        foreach ($users as $user) {
            Mail::to($user->email)->send(new Newsletter($article));
        }
        

        return redirect('/admin-manage-articles');
    }
    
    public function managearticlelist()
    {
        $articlesreview=Article::where('status', '=', 'review')->get();
        $articleslive=Article::where('status', '=', 'published')->get();
        
        return view('admin.modules.article.list-articles', ['articlesreview' => $articlesreview,'articleslive' => $articleslive]);
    }
    
    public function takedownarticle(Request $request)
    {
        Article::where('article_id', $request->article_id)->update([
            'status'=>'review'
        ]);
        return redirect('/admin-manage-articles');
    }
    
    public function vieweditarticleform(Request $request)
    {
        $article= Article::find($request->article_id);
        if ($article==null) {
            $article=Article::find($request->old('article_id'));
        }
        return view('admin.modules.article.edit-article', ['article' => $article]);
    }

    public function editarticle(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'title' => 'required|min:5|max:191',
            'author' => 'required|min:2|max:191',
            'description' => 'required',
            'content' => 'required',
            'article_image' => 'required|mimes:jpeg,jpg,png|max:1024',
        ]);
        $article=Article::find($request->article_id);
        if ($validator->fails()) { // on validator found any error
            return redirect('/admin-edit-articleform')->withErrors($validator)->withInput(['article_id' => $article->article_id]);
        }
        DB::beginTransaction();

        try {
            $article->title=$request->title;
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
            DB::commit();

            return view('admin.modules.article.view-article', ['article' => $article]);
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

            return redirect("/admin-manage-articles");
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
    ////////////////////////////////////////////////////////////////////////////////

    public function createexpertform(Request $request)
    {
        return view('admin.modules.user.create-expert-form');
    }
    public function createexpert(Request $request)
    {
        $validator=Validator::make($request->all(), [
            
            'ex_firstname' => 'required|min:3|max:35',
            'ex_lastname' => 'required|min:3|max:35',
            'ex_dateofbirth' => 'date|before:tomorrow',
            'ex_aboutme' => 'required|min:3|max:150',
            'ex_description' => 'required',
            'email' => 'required|email|unique:experts',
            'ex_contactcode' => 'required|numeric',
            'ex_contactno' => 'required|digits:10',
            'ex_image' => 'required|mimes:jpeg,jpg,png|max:1024',
            
        ]);
        if ($validator->fails()) { // on validator found any error
            return redirect('/admin-create-expertform')->withErrors($validator)->withInput();
        }
        DB::beginTransaction();

        try {
            $expertobj= new Expert();
            $expertobj->ex_firstname = $request->ex_firstname;
            $expertobj->ex_lastname = $request->ex_lastname;
            $file = $request->file('ex_image');
            $contents = $file->openFile()->fread($file->getSize());
            $expertobj->ex_image=$contents;
            $expertobj->ex_dateofbirth = $request->ex_dateofbirth;
            $expertobj->ex_aboutme = $request->ex_aboutme;
            $expertobj->ex_description = $request->ex_description;
            $expertobj->email = $request->email;
            $expertobj->password =Hash::make($request->password);
            $expertobj->ex_contactcode = $request->ex_contactcode;
            $expertobj->ex_contactno = $request->ex_contactno;
            $expertobj->admin_id=Auth::user()->admin_id;
            $expertobj->save();
            DB::commit();

            return redirect('/admindashboard');
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function createcounselorform(Request $request)
    {
        return view('admin.modules.user.create-counselor-form');
    }
    public function createcounselor(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'co_firstname' => 'required|min:3|max:35',
            'co_lastname' => 'required|min:3|max:35',
            'email' => 'required|email|unique:counselor',
            'password' => 'required',
            'referral_code' => 'required',
            
        ]);
        if ($validator->fails()) { // on validator found any error
            return redirect('/admin-create-counselorform')->withErrors($validator)->withInput();
        }
        DB::beginTransaction();

        try {
            $counselorobj= new Counselor();
            $counselorobj->co_firstname = $request->co_firstname;
            $counselorobj->co_lastname = $request->co_lastname;
            $counselorobj->email = $request->email;
            $counselorobj->password = $request->password;
            $counselorobj->referral_code = $request->referral_code;
            $counselorobj->admin_id=Auth::user()->admin_id;
            $counselorobj->save();
            DB::commit();
            return redirect('/admindashboard');
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
    public function viewcounselorlist()
    {
        $counselorobj= Counselor::all();
        return view('', ['counselorobj'=>$counselorobj]);
    }
    public function viewexpertlist()
    {
        $expertobj= Expert::all();
        return view('', ['expertobj'=>$expertobj]);
    }
    public function viewarticleform()
    {
        return view('admin.modules.article.post-article');
    }

    //Delete//////////////////////////////////////////////////////////////////////
   
    public function deleteexpert(Request $request)
    {
    }
    public function deletecounselor(Request $request)
    {
    }

    //////////////////////////////project///////////////////////////////////

    public function postprojectform()
    {
        return view('admin.modules.project.post-project');
    }

    public function postprojectdata(Request $request)
    {
        $validator=Validator::make($request->all(), [
        'project_name'=>'required|min:5|max:191',
        'project_description'=>'required|min:5',
        'project_domain'=>'required',
        'project_price'=>'required|numeric',
        
    ]);
        if ($validator->fails()) { // on validator found any error
            return redirect('/admin-post-project-form')->withErrors($validator)->withInput();
        }
        DB::beginTransaction();

        try {
            $project=new Projects();
            $project->project_name=$request->project_name;
            $project->project_description=$request->project_description;
            $project->project_domain=$request->project_domain;
            $project->project_price=$request->project_price;
            $project->project_link=$request->project_link;

            $file = $request->file('project_image');
            // Get the contents of the file
            if ($file!=null) {
                $contents = $file->openFile()->fread($file->getSize());
                $project->project_image=$contents;
            } else {
                $project->project_image=null;
            }
            
            $project->project_status="open";
        
            $project->creator_id=Auth::user()->admin_id;
            $project->creator_flag="admin";
           
            $project->save();
            DB::commit();
            return view('admin.modules.project.view-project', ['project'=> $project]);
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function manageprojectlist()
    {
        $projects= Projects::where('project_status', 'open')->get();

        return view('admin.modules.project.list-projects', ['projects'=>$projects]);
    }

    public function vieweditprojectform(Request $request)
    {
        $project= Projects::find($request->project_id);
        if ($project==null) {
            $project=Projects::find($request->old('project_id'));
        }
        return view('admin.modules.project.edit-project', ['p' => $project]);
    }

    
    public function editprojectdata(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'project_name'=>'required|min:5|max:191',
            'project_description'=>'required|min:5',
            'project_domain'=>'required',
            'project_price'=>'required|numeric',
            
        ]);
        DB::beginTransaction();

        try {
            $project=Projects::find($request->project_id);
            if ($validator->fails()) { // on validator found any error
                return redirect('/admin-edit-project-form')->withErrors($validator)->withInput(['project_id' => $project->project_id]);
            }
        
            $project->project_name=$request->project_name;
            $project->project_description=$request->project_description;
            $project->project_domain=$request->project_domain;
            $project->project_price=$request->project_price;
            $project->project_link=$request->project_link;

            $file = $request->file('project_image');
            // Get the contents of the file
            if ($file!=null) {
                $contents = $file->openFile()->fread($file->getSize());
                $project->project_image=$contents;
            } else {
                $project->project_image=null;
            }
            $project->project_status="open";
        
            $project->creator_id=Auth::user()->admin_id;
            $project->creator_flag="admin";
            
            $project->save();

            $project=Projects::find($request->project_id);
            DB::commit();

            return view('admin.modules.project.view-project', ['project'=> $project]);
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
    
    public function viewproject(Request $request)
    {
        $project= Projects::find($request->project_id);
        
        return view('admin.modules.project.view-project', ['project' => $project]);
    }

    public function deleteproject(Request $request)
    {
        DB::beginTransaction();

        try {
            $project= Projects::find($request->project_id);
            if ($project->project_status=="open") {
                $project->project_status="delete";//if published
                $project->save();
            } else {
                // $project->delete();//if not published
            }
       
            DB::commit();

            return redirect("/admin-manage-projects");
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }


    ///////////////////////////////job and Internship//////////////////////////////////
    public function postjobform()
    {
        return view('admin.modules.job.post-job');
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
            return redirect('/admin-post-job-form')->withErrors($validator)->withInput();
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
            $jobobj->creator_id=Auth::user()->admin_id;
            $jobobj->creator_flag='admin';
            $jobobj->save();
            DB::commit();

            return redirect('/admindashboard');
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function viewjobsposted()
    {
        $jobsobj= Jobs::where('creator_id', Auth::user()->admin_id)->where('creator_flag', 'admin')->where('job_type_id', '1')->where('job_status', '!=', 'deleted')->get();
        return view('admin.modules.job.view-jobs-posted', ['jobsobj'=>$jobsobj]);
    }

    public function viewjobdetails(Request $request)
    {
        $jobobj=Jobs::find($request->job_id);
        $jobappobj = JobsApplied::where('job_id', $jobobj->job_id)->get();
        $users= User::join('jobs_applied', 'users.user_id', '=', 'jobs_applied.user_id')
    ->where('jobs_applied.job_id', $jobobj->job_id)->get();
        return view('admin.modules.job.view-job', ['jobobj'=>$jobobj,'users'=>$users,'jobappobj'=>$jobappobj]);
    }
    public function deletejob(Request $request)
    {
        DB::beginTransaction();

        try {
            $affected = DB::table('jobs')
          ->where('job_id', $request->job_id)
          ->update(['job_status' => 'deleted']);
            DB::commit();

            return redirect('/admin-view-jobs-posted');
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

            return redirect('/admin-view-internships-posted');
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }


    public function postinternshipform()
    {
        return view('admin.modules.internship.post-internship');
    }

    public function viewinternshipsposted()
    {
        $jobsobj= Jobs::where('creator_id', Auth::user()->admin_id)->where('creator_flag', 'admin')->where('job_type_id', '2')->where('job_status', '!=', 'deleted')->get();
        return view('admin.modules.internship.view-internships-posted', ['jobsobj'=>$jobsobj]);
    }

    public function viewinternshipdetails(Request $request)
    {
        $jobobj=Jobs::find($request->job_id);
        $jobappobj = JobsApplied::where('job_id', $jobobj->job_id)->get();
        $users= User::join('jobs_applied', 'users.user_id', '=', 'jobs_applied.user_id')
    ->where('jobs_applied.job_id', $jobobj->job_id)->get();
        return view('admin.modules.internship.view-internship', ['jobobj'=>$jobobj,'users'=>$users,'jobappobj'=>$jobappobj]);
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
            return redirect('/admin-post-internship-form')->withErrors($validator)->withInput();
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
            $jobobj->creator_id=Auth::user()->admin_id;
            $jobobj->creator_flag='admin';
            $jobobj->save();
            DB::commit();

            return redirect('/admindashboard');
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}
