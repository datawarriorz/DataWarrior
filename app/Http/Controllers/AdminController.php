<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
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

    public function reviewarticlelist()
    {
        $articles=Article::where('status', '=', 'review')->get();
        
        return view('admin.admin-reviewarticlelist', ['articles' => $articles]);
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
        // return redirect('');
    }


    public function createexpert(Request $request)
    {
        $expertobj= new Expert();
        $expertobj->ex_firstname = $request->ex_firstname;
        $expertobj->ex_lastname = $request->ex_lastname;
        $expertobj->ex_dateofbirth = $request->ex_dateofbirth;
        $expertobj->ex_aboutme = $request->ex_aboutme;
        $expertobj->ex_description = $request->ex_description;
        $expertobj->email = $request->email;
        $expertobj->ex_contactcode = $request->ex_contactcode;
        $expertobj->ex_contactno = $request->ex_contactno;
        $expertobj->save();
        return redirect('');
    }
    
    public function createcounselor(Request $request)
    {
        $counselorobj= new Counselor();
        $counselorobj->co_firstname = $request->co_firstname;
        $counselorobj->co_lastname = $request->co_lastname;
        $counselorobj->email = $request->email;
        $counselorobj->password = $request->password;
        $counselorobj->co_registercount = $request->co_registercoun;
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
}
