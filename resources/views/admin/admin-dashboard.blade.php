@extends('layout.adminlayout')

@section('content')
<link rel="stylesheet" href="./css/admin/admin-4-0-dashboard.css">
<link rel="stylesheet" href="./css/admin/admin-1-master.css">
<div>
    <div class="sidenav-wrapper" id="mysidenav-wrapper">
        <div class="sidenav-fixed" id="mysidenav-fixed">
            <ul class="sidenav-item">
                <a href="#">Dashboard</a>
                <a href="#">Admins Panel</a>
                <a href="#">Users Panel</a>
                <ul class="sidenav-item">
                    <li><a href="#">Add User</a></li>
                    <li><a href="#">Manage Users</a></li>
                </ul>
                <a href="#">Experts</a>
                <ul class="sidenav-item">
                    <li><a href="#">Add Expert</a></li>
                    <li><a href="#">Manage Experts</a></li>
                </ul>
                <a href="#">Councellors</a>
                <ul class="sidenav-item">
                    <li><a href="#">Add Councellors</a></li>
                    <li><a href="#">Manage Councellors</a></li>
                </ul>
                <a href="#">Articles</a>
                <ul class="sidenav-item">
                    <li><a href="#">Add Article</a></li>
                    <li><a href="#">Review Articles</a></li>
                    <li><a href="#">Manage Articles</a></li>
                </ul>
                <a href="#">Job</a>
                <ul class="sidenav-item">
                    <li><a href="#">Manage Jobs</a></li>
                </ul>
                <a href="#">Internship</a>
                <ul class="sidenav-item">
                    <li><a href="#">Manage Internships</a></li>
                </ul>
            </ul>

        </div>
        <div class="sidenav-remaining" id="mysidenav-remaining">

        </div>
    </div>
    <div class="m-sidenav-wrapper" id="m-mysidenav-wrapper">
        <div class="m-sidenav-fixed" id="m-mysidenav-fixed">
            <div style="width:100%">
                <span class="m-close-icon" id="m-myclose-icon" onclick="mcloseNav()">&times;</span>
            </div>
            <br>
            <ul class="m-sidenav-item">
                <a href="#">Dashboard</a>
                <a href="#">Admins Panel</a>
                <a href="#">Users Panel</a>
                <ul class="m-sidenav-item">
                    <li><a href="#">Add User</a></li>
                    <li><a href="#">Manage Users</a></li>
                </ul>
                <a href="#">Experts</a>
                <ul class="m-sidenav-item">
                    <li><a href="#">Add Expert</a></li>
                    <li><a href="#">Manage Experts</a></li>
                </ul>
                <a href="#">Councellors</a>
                <ul class="m-sidenav-item">
                    <li><a href="#">Add Councellors</a></li>
                    <li><a href="#">Manage Councellors</a></li>
                </ul>
                <a href="#">Articles</a>
                <ul class="m-sidenav-item">
                    <li><a href="#">Add Article</a></li>
                    <li><a href="#">Review Articles</a></li>
                    <li><a href="#">Manage Articles</a></li>
                </ul>
                <a href="#">Job</a>
                <ul class="m-sidenav-item">
                    <li><a href="#">Manage Jobs</a></li>
                </ul>
                <a href="#">Internship</a>
                <ul class="m-sidenav-item">
                    <li><a href="#">Manage Internships</a></li>
                </ul>
            </ul>
        </div>
        <div class="m-sidenav-remaining" id="m-mysidenav-remaining">

        </div>
    </div>

    <div class="content-wrapper" id="mycontent-wrapper">
        <div class="col-md-12" style="position: inherit;">
            <div class="row">
                <div class="col-md-12 padleftzero padrightzero">
                    <div class="card dashboard-card">
                        <div class="card-header">
                            <div style="margin-bottom: 0px">
                                <i class="fas fa-columns open-icon" id="myopen-icon" onclick="openNav()"></i>
                                <i class="fas fa-columns close-icon" id="myclose-icon" onclick="closeNav()"></i>
                                <i class="fas fa-columns m-open-icon" id="m-myopen-icon" onclick="mopenNav()"></i>
                                Dashboard</div>
                        </div>
                        <div class="card-body dashboard-card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link profilenav active" id="articles-tab" data-toggle="tab"
                                                href="#articles" role="tab" aria-controls="articles"
                                                aria-selected="true">Articles</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link profilenav" id="certification-tab" data-toggle="tab"
                                                href="#certification" role="tab" aria-controls="certification"
                                                aria-selected="false">Certification</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tab-content profile-tab" id="myTabContent">
                                        <div class="tab-pane fade show active" id="articles" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <br>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <a href="/expert-postarticle">
                                                            <button type="button" class="btn tab-edit-btn">
                                                                <i class="fas fa-edit"></i> Post Article
                                                            </button>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="/expert-listarticles">
                                                            <button type="button" class="btn tab-edit-btn"
                                                                style="margin-left: 10px;">
                                                                <i class="far fa-eye"></i> View Articles
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <br>
                                        </div>

                                        <div class="tab-pane fade" id="certification" role="tabpanel"
                                            aria-labelledby="education-tab">
                                            <br>
                                            <div class="container">
                                                <a href="/expert-postarticle">
                                                    <button type="button" class="btn tab-edit-btn">
                                                        <i class="fas fa-edit"></i> Post Certification
                                                    </button>
                                                </a>
                                                <a href="/expert-viewarticle">
                                                    <button type="button" class="btn tab-edit-btn"
                                                        style="margin-left: 10px;">
                                                        <i class="far fa-eye"></i> View Certifications
                                                    </button>
                                                </a>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-3">
                <div class="col-md-12">
                    <div class="card notification-card right-card">
                        <div class="card-header">
                            <i class="far fa-bell"></i> Notifications
                        </div>
                        <div class="card-body">
                            empty
                        </div>
                    </div>
                    <div class="card trending-card right-card">
                        <div class="card-header">
                            <i class="fas fa-hashtag"></i> Trending Articles
                        </div>
                        <div class="card-body">
                            no articles
                        </div>
                    </div>
                    <div class="card views-card right-card">
                        <div class="card-header">
                            <i class="far fa-eye"></i> Total Views
                        </div>
                        <div class="card-body">
                            no views
                        </div>
                    </div>
                </div>
            </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection