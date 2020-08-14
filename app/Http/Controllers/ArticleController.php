<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }
    public function userviewarticlelist()
    {
        $articlesobj=Article::all();

        return view('', ['articlesobj'=>$articlesobj]);
    }
    public function userviewarticle(Request $request)
    {
        $articleobj=Article::where('article_id', $request->article_id);
        return view('', ['articleobj'=>$articleobj]);
    }
}
