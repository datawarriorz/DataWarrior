<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUs;
use App\Expert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $expertsobj=Expert::all();
        return view('home', ['expertsobj'=>$expertsobj]);
    }

    public function userviewexpert(Request $request)
    {
        $expertobj=Expert::where('ex_id', $request->ex_id);
        $articleslive= Article::where('creator_id', Auth::user()->ex_id)->where('creator_flag', 'expert')->where('status', '=', 'published')->get();
        return view('', ['expertobj' => $expertobj,'articleslive'=>$articleslive]);
    }
    
    public function userviewarticle(Request $request)
    {
        $article_obj= Article::find($request->article_id);

        return view('', ['article' => $article_obj]);
    }

    public function test()
    {
        return view('test');
    }
}
