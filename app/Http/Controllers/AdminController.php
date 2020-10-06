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
use DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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
            'description' => 'required|max:70',
            'content' => 'required',
            'article_image' => 'required|mimes:jpeg,jpg,png',
        ]);
        if ($validator->fails()) { // on validator found any error
            return redirect('/admin-postarticle')->withErrors($validator)->withInput();
        }
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
        // $articles= Article::where('ex_id', Auth::user()->ex_id)->get();
        // return view('expert.expert-dashboard', ['articles' => $articles]);
        return view('admin.modules.article.view-article', ['article' => $article]);
    }

    public function viewarticle(Request $request)
    {
        $article=Article::find($request->article_id);
        
        return view('admin.modules.article.view-article', ['article' => $article]);
    }

    public function publisharticle(Request $request)
    {
        Article::where('article_id', $request->article_id)->update([
            'status'=>'published'
        ]);
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
            'description' => 'required|max:70',
            'content' => 'required',
            'article_image' => 'required|mimes:jpeg,jpg,png',
        ]);
        $article=Article::find($request->article_id);
        if ($validator->fails()) { // on validator found any error
            return redirect('/admin-edit-articleform')->withErrors($validator)->withInput(['article_id' => $article->article_id]);
        }
       
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
        
        return view('admin.modules.article.view-article', ['article' => $article]);
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
       

        return redirect("/admin-manage-articles");
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
            'ex_image' => 'required|mimes:jpeg,jpg,png',
            
        ]);
        if ($validator->fails()) { // on validator found any error
            return redirect('/admin-create-expertform')->withErrors($validator)->withInput();
        }
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
        return redirect('/admindashboard');
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

        $counselorobj= new Counselor();
        $counselorobj->co_firstname = $request->co_firstname;
        $counselorobj->co_lastname = $request->co_lastname;
        $counselorobj->email = $request->email;
        $counselorobj->password = $request->password;
        $counselorobj->referral_code = $request->referral_code;
        $counselorobj->admin_id=Auth::user()->admin_id;
        $counselorobj->save();
        return redirect('/admindashboard');
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
}
