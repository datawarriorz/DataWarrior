<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Auth;

class ExpertController extends Controller
{
    //
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
        $articles= Article::where('expert_id',Auth::user()->expert_id)->get();
        return view('expert.expert-dashboard', ['articles' => $articles]);
    }
    public function logoutexpert()
    {
        Auth::logout();
        return view('expert.auth.login');
    }
}
