<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\URL;

class ProjectController extends Controller
{
    public function __construct()
    {
        if (URL::current()==URL::to("/")."/phome") {
            Session::put('process', 'phome');
        }
        $this->middleware('auth')->except('logout');
    }

    public function showprojecthome()
    {
        return view('user.modules.project.p-home', []);
    }

    public function showallprojects(Request $request)
    {
    }

    public function projectfilterapply(Request $request)
    {
    }

    public function showprojectdetails(Request $request)
    {
    }
}
