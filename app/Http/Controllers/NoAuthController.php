<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUs;
use App\Certification;
use App\Article;
use App\Expert;

class NoAuthController extends Controller
{
    public function contact()
    {
        return view('user.contact', ['message'=>'',]);
    }

    public function contactusreq(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'name' => 'required|min:3|max:35',
            'subject' => 'required|min:3|max:100',
            'email' => 'required|email',
            'description' => 'required',
        ]);

        if ($validator->fails()) { // on validator found any error
            return redirect('/contact')->withErrors($validator)->withInput();
        }

        $contactusobj=new ContactUs();
        $contactusobj->name=$request->name;
        $contactusobj->email=$request->email;
        $contactusobj->subject=$request->subject;
        $contactusobj->description=$request->description;
        $contactusobj->save();

        return redirect()->back();

        // return view('contact', ['message'=>'Your Query has been submitted.',]);
    }

    public function faq()
    {
        return view('user.faq');
    }

    public function aboutus()
    {
        return view('user.aboutus');
    }

    public function userallarticles()
    {
        $articleslive=Article::where('status', '=', 'published')->orderByDesc('created_at')->get();
        $cert_obj=Certification::all()->take(3);
        return view('user.modules.article.list-articles', ['articleslive'=>$articleslive, 'cert_obj'=>$cert_obj]);
    }
    public function userviewexpert(Request $request)
    {
        $expertobj=Expert::find($request->ex_id);
        $articleslive= Article::where('creator_id', $request->ex_id)->where('creator_flag', 'expert')->where('status', '=', 'published')->get();
        return view('user.modules.article.view-expert', ['expertobj' => $expertobj,'articleslive'=>$articleslive]);
    }
    
    public function userviewarticle(Request $request)
    {
        $article_obj= Article::find($request->article_id);

        return view('user.modules.article.view-article', ['article_obj' => $article_obj]);
    }

    public function userexpertviewarticle(Request $request)
    {
        $article_obj= Article::find($request->article_id);

        return view('user.modules.article.view-expert-article', ['article_obj' => $article_obj]);
    }
    
    public function newletterarticle($article_id)
    {
        $article_obj= Article::find($article_id);
        return view('user.modules.article.view-article', ['article_obj' => $article_obj]);
    }

    public function showexpertspeakhome()
    {
        $expertsobj=Expert::all();
        return view('user.modules.expertspeak.es-home', ['expertsobj'=>$expertsobj]);
    }
}
