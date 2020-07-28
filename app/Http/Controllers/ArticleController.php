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

    public function viewexpertarticles()
    {
        $articles= Article::where('expert_id', Auth::user()->expert_id)->get();
        
        return view('expert.expert-viewarticle', ['articles' => $articles]);
    }
    
    public function viewarticleform()
    {
        return view('expert.expert-postarticle');
    }
    
    public function postarticle(Request $request)
    {
        $article=new Article();
        $article->title=$request->title;
        $article->expert_id=Auth::user()->expert_id;
        $article->author=$request->author;
        $article->description=$request->description;
        $article->content=$request->content;
        $article->article_image=$request->article_image;
        $article->status="review";
        $article->save();
        $articles= Article::where('expert_id', Auth::user()->expert_id)->get();
        return view('expert.expert-dashboard', ['articles' => $articles]);
    }
    public function editarticle(Request $request)
    {
        $article= App\Article::find($request->article_id);
        $article->title=$request->title;
        $article->expert_id=Auth::user()->expert_id;
        $article->author=$request->author;
        $article->description=$request->description;
        $article->content=$request->content;
        $article->article_image=$request->article_image;
        $article->status="review";
        $article->save();
        $articles= Article::where('expert_id', Auth::user()->expert_id)->get();
        
        return view('expert.', ['articles' => $articles]);
    }
    public function deletetarticle(Request $request)
    {
        $article= App\Article::find($request->article_id);
        $article->status="delete";
        
        return view('expert.', ['articles' => $articles]);
    }
    public function viewarticle(Request $request)
    {
        $article= App\Article::find($request->article_id);
        return view('expert.expert-viewarticle', ['article' => $article]);
    }
}
