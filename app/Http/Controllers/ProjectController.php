<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Projects;
use App\ProjectReq;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\URL;
use DB;

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

    public function showprojects(Request $request)
    {
        $projectsreqobj=ProjectReq::where('user_id', Auth::user()->user_id)->get();
        $projectsobj=Projects::where('project_domain', $request->project_domain)->where('project_status', 'open')->get();
        return view('user.modules.project.p-list', ['projectsobj'=>$projectsobj,'projectsreqobj'=>$projectsreqobj]);
    }

    public function showprojectdetails($project_id)
    {
        $project = Projects::find($project_id);
        $projectrequested = ProjectReq::where('user_id', Auth::user()->user_id)->where('project_id', $project_id)->count();
        return view('user.modules.project.p-details', ['project' => $project, 'projectrequested' => $projectrequested]);
    }
    
    public function requestproject(Request $request)
    {
        DB::beginTransaction();

        try {
            $projectrequested = new ProjectReq();
            $projectrequested->project_id = $request->project_id;
            $projectrequested->user_id = Auth::user()->user_id;
            $projectrequested->save();
            DB::commit();
            $project = Projects::where('project_id', $request->project_id)->get();

            return view('user.modules.project.p-requested-ack', ['project' => $project]);
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}
