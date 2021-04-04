<link rel="stylesheet" href="{{ asset('css/admin/admin-4-dashboard.css') }}" />
<div>
    <div class="sidenav-wrapper" id="mysidenav-wrapper">
        <div class="sidenav-fixed" id="mysidenav-fixed">
            <ul class="sidenav-item">
                <a href="/admindashboard" @if(\Request::is('admindashboard'))
                    style="font-weight:bold;color:#171f2a;background-color:white" @endif>Dashboard</a>
                <a href="#">Admin Panel</a>
                <a href="#">User Panel</a>
                <ul class="sidenav-item">
                    <li><a href="#">Add User</a></li>
                    <li><a href="#">Manage Users</a></li>
                </ul>
                <a href="#">Experts</a>
                <ul class="sidenav-item">
                    <li><a href="/admin-create-expertform" @if(\Request::is('admin-create-expertform'))
                            style="font-weight:bold;color:#171f2a;background-color:white" @endif>Add Expert</a></li>
                    <li><a href="#">Manage Experts</a></li>
                </ul>
                <a href="#">Councellors</a>
                <ul class="sidenav-item">
                    <li><a href="/admin-create-counselorform" @if(\Request::is('admin-create-counselorform'))
                            style="font-weight:bold;color:#171f2a;background-color:white" @endif>Add Councellors</a>
                    </li>
                    <li><a href="#">Manage Councellors</a></li>
                </ul>
                <a href="#">Articles</a>
                <ul class="sidenav-item">
                    <li>
                        <a href="/admin-postarticle" @if(\Request::is('admin-postarticle'))
                            style="font-weight:bold;color:#171f2a;background-color:white" @endif>
                            Posts Article
                        </a>
                    </li>
                    <li><a href="/admin-manage-articles">Manage Articles</a></li>
                </ul>
                <a href="#">Projects</a>
                <ul class="sidenav-item">
                    <li><a href="/admin-post-project-form" @if(\Request::is('admin-post-project-form'))
                            style="font-weight:bold;color:#171f2a;background-color:white" @endif>Post Project</a></li>
                    <li><a href="/admin-manage-projects" @if(\Request::is('admin-manage-projects'))
                            style="font-weight:bold;color:#171f2a;background-color:white" @endif>Manage Projects</a>
                    </li>
                </ul>
                <a href="#">Certifications</a>
                <ul class="sidenav-item">
                    <li><a href="#">Post Certification</a></li>
                    <li><a href="#">Manage Certifications</a></li>
                </ul>
                <a href="#">Job</a>
                <ul class="sidenav-item">
                    <li><a href="/admin-post-job-form" @if(\Request::is('admin-post-job-form'))
                            style="font-weight:bold;color:#171f2a;background-color:white" @endif>Post Job</a></li>
                    <li><a href="/admin-view-jobs-posted" @if(\Request::is('admin-view-jobs-posted'))
                            style="font-weight:bold;color:#171f2a;background-color:white" @endif>Manage Jobs</a></li>
                </ul>
                <a href="#">Internship</a>
                <ul class="sidenav-item">
                    <li><a href="/admin-post-internship-form" @if(\Request::is('admin-post-internship-form'))
                            style="font-weight:bold;color:#171f2a;background-color:white" @endif>Post Internship</a>
                    </li>
                    <li><a href="/admin-view-internships-posted" @if(\Request::is('admin-view-internships-posted'))
                            style="font-weight:bold;color:#171f2a;background-color:white" @endif>Manage Internships</a>
                    </li>
                </ul>
            </ul>
        </div>
        <div class="sidenav-remaining" id="mysidenav-remaining">

        </div>
    </div>
    <div class="m-sidenav-wrapper" id="m-mysidenav-wrapper">
        <div class="m-sidenav-fixed" id="m-mysidenav-fixed">
            <div style="width:100%;text-align:right;padding-right:15px;">
                <span class="m-close-icon" id="m-myclose-icon" onclick="mcloseNav()">&times;</span>
            </div>
            <ul class="m-sidenav-item">
                <a href="/admindashboard">Dashboard</a>
                <a href="#">Admin Panel</a>
                <a href="#">User Panel</a>
                <ul class="sidenav-item">
                    <li><a href="#">Add User</a></li>
                    <li><a href="#">Manage Users</a></li>
                </ul>
                <a href="#">Experts</a>
                <ul class="sidenav-item">
                    <li><a href="/admin-create-expertform">Add Expert</a></li>
                    <li><a href="#">Manage Experts</a></li>
                </ul>
                <a href="#">Councellors</a>
                <ul class="sidenav-item">
                    <li><a href="/admin-create-counselorform">Add Councellors</a></li>
                    <li><a href="#">Manage Councellors</a></li>
                </ul>
                <a href="#">Articles</a>
                <ul class="sidenav-item">
                    <li><a href="/admin-postarticle">Post Article</a></li>
                    <li><a href="/admin-manage-articles">Manage Articles</a></li>
                </ul>
                <a href="#">Projects</a>
                <ul class="sidenav-item">
                    <li><a href="/admin-post-project-form">Post Project</a></li>
                    <li><a href="/admin-manage-projects">Manage Projects</a></li>
                </ul>
                <a href="#">Certifications</a>
                <ul class="sidenav-item">
                    <li><a href="#">Post Certification</a></li>
                    <li><a href="#">Manage Certifications</a></li>
                </ul>
                <a href="#">Job</a>
                <ul class="sidenav-item">
                    <li><a href="/admin-post-job-form">Post Job</a></li>
                    <li><a href="/admin-view-jobs-posted">Manage Jobs</a></li>
                </ul>
                <a href="#">Internship</a>
                <ul class="sidenav-item">
                    <li><a href="/admin-post-internship-form">Post Internship</a></li>
                    <li><a href="/admin-view-internships-posted">Manage Internships</a></li>
                </ul>
            </ul>
        </div>
        <div class="m-sidenav-remaining" id="m-mysidenav-remaining">

        </div>
    </div>


</div>
