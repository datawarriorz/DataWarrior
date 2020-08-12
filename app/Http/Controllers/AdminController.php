<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Counselor;
use App\Expert;
use App\Article;

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

    public function postarticle(Request $request)
    {
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
        return view('admin.admin-view-article', ['article' => $article]);
    }

    public function viewarticle(Request $request)
    {
        $article=Article::find($request->article_id);
        
        return view('admin.admin-view-article', ['article' => $article]);
    }

    public function publisharticle(Request $request)
    {
        Article::where('article_id', $request->article_id)->update([
            'status'=>'published'
        ]);
        return redirect('/admin-review-articles');
    }
    
    public function reviewarticlelist()
    {
        $articlesreview=Article::where('status', '=', 'review')->get();
        $articleslive=Article::where('status', '=', 'published')->get();
        
        return view('admin.admin-listarticles', ['articlesreview' => $articlesreview,'articleslive' => $articleslive]);
    }
    
    public function takedownarticle(Request $request)
    {
        Article::where('article_id', $request->article_id)->update([
            'status'=>'review'
        ]);
        return redirect('/admin-review-articles');
    }

    public function createexpertform(Request $request)
    {
        return view('admin.admin-create-expertform');
    }
    public function createexpert(Request $request)
    {
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
        return view('admin.admin-create-counselorform');
    }
    public function createcounselor(Request $request)
    {
        $counselorobj= new Counselor();
        $counselorobj->co_firstname = $request->co_firstname;
        $counselorobj->co_lastname = $request->co_lastname;
        $counselorobj->email = $request->email;
        $counselorobj->password = $request->password;
        
        $counselorobj->save();
        return redirect('');
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
        return view('admin.admin-postarticle');
    }
}
