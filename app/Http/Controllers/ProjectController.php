<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Projects;
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
        return view('user.modules.project.p-home');
    }

    public function showallprojects(Request $request)
    {
        $projectsobj=Projects::where('project_status', 'open')->get();
        return view('user.modules.project.p-list', ['projectsobj'=>$projectsobj]);
    }

    public function projectfilterapply(Request $request)
    {
        $projectsobj=Projects::where('project_domain', $request->project_domain)->where('project_status', 'open')->get();
        return view('user.modules.project.p-list', ['projectsobj'=>$projectsobj]);
    }

    public function showprojectdetails(Request $request)
    {
        $projectobj=Projects::find($request->project_id);
        return view('user.modules.project.p-details', ['projectobj'=>$projectobj]);
    }
}
