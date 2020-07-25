<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:expert');
    }
    // public function viewexpertarticle(){
        
    //     $articles= Article::where('expert_id',Auth::user()->expert_id)->get();
        
    //     return view('expert.expert-dashboard', ['articles' => $articles]);

    // }
}
