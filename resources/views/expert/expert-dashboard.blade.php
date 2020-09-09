@extends('layout.expertlayout')

@section('content')
<link rel="stylesheet" href="./css/expert/expert-4-0-dashboard.css" />
<div class="dashboard-wrapper">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9 padrightzero">
                <div class="col-md-12 padrightzero">
                    <div class="card dashboard-card">
                        <div class="card-header">
                            <div style="margin-bottom: 0px"><i class="fas fa-columns"></i> Dashboard</div>
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
                                        <li class="nav-item">
                                            <a class="nav-link profilenav" id="certification-tab" data-toggle="tab"
                                                href="#jobs" role="tab" aria-controls="certification"
                                                aria-selected="false">Jobs</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link profilenav" id="certification-tab" data-toggle="tab"
                                                href="#internships" role="tab" aria-controls="certification"
                                                aria-selected="false">Internships</a>
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
                                        <div class="tab-pane fade" id="jobs" role="tabpanel"
                                            aria-labelledby="education-tab">
                                            <br>
                                            <div class="container">
                                                <a href="/expert-post-job-form">
                                                    <button type="button" class="btn tab-edit-btn">
                                                        <i class="fas fa-edit"></i> Post Job
                                                    </button>
                                                </a>
                                                <a href="/expert-view-jobs-posted">
                                                    <button type="button" class="btn tab-edit-btn"
                                                        style="margin-left: 10px;">
                                                        <i class="far fa-eye"></i> View Jobs Posted
                                                    </button>
                                                </a>
                                                <a href="/expert-view-job-participants">
                                                    <button type="button" class="btn tab-edit-btn"
                                                        style="margin-left: 10px;">
                                                        <i class="far fa-eye"></i> View Participants
                                                    </button>
                                                </a>
                                            </div>
                                            <br>
                                        </div>
                                        <div class="tab-pane fade" id="internships" role="tabpanel"
                                            aria-labelledby="education-tab">
                                            <br>
                                            <div class="container">
                                                <a href="/expert-post-internship">
                                                    <button type="button" class="btn tab-edit-btn">
                                                        <i class="fas fa-edit"></i> Post Internship
                                                    </button>
                                                </a>
                                                <a href="/expert-view-internship-posted">
                                                    <button type="button" class="btn tab-edit-btn"
                                                        style="margin-left: 10px;">
                                                        <i class="far fa-eye"></i> View Internships Posted
                                                    </button>
                                                </a>
                                                <a href="/expert-view-internship-participants">
                                                    <button type="button" class="btn tab-edit-btn"
                                                        style="margin-left: 10px;">
                                                        <i class="far fa-eye"></i> View Participants
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
                </div>
            </div>
            <div class="col-md-3 padleftzero">
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
            </div>
        </div>
    </div>
</div>
@endsection