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
        $contents = $file->openFile()->fread($file->getSize());
        $article->article_image=$contents;
       
        $article->status="review";
        $article->save();
        // $articles= Article::where('ex_id', Auth::user()->ex_id)->get();
        // return view('expert.expert-dashboard', ['articles' => $articles]);
        return view('expert.expert-viewarticle', ['article' => $article]);
    }

    public function editarticle(Request $request)
    {
        $article= App\Article::find($request->article_id);
        $article->title=$request->title;
        $article->creator_id=Auth::user()->ex_id;
        $article->creator_flag="expert";
        $article->author=$request->author;
        $article->description=$request->description;
        $article->content=$request->content;
        $article->article_image=$request->article_image;
        $article->status="review";
        $article->save();
        $articles= Article::where('ex_id', Auth::user()->ex_id)->get();
        
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
        $article_obj= Article::find($request->article_id);

        return view('expert.expert-viewarticle', ['article' => $article_obj]);
    }
}
