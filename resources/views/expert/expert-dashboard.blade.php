@extends('expert.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="./css/expert/expert-4-0-dashboard.css" />
<div class="dashboard-wrapper">
    <div class="col-12">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-9 offset-lg-0 no-gutters pl-4 pr-4">
                <div class="col-md-12">
                    <div class="card dashboard-card ml-0 mr-0 mb-0 mb-sm-0 mb-md-0 mb-lg-4">
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
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tab-content profile-tab" id="myTabContent">
                                        <div class="tab-pane fade show active justify-content-sm-center" id="articles"
                                            role="tabpanel" aria-labelledby="home-tab">
                                            <a href="/expert-postarticle">
                                                <button type="button" class="btn tab-edit-btn">
                                                    <i class="fas fa-edit"></i> Post Article
                                                </button>
                                            </a>
                                            <a href="/expert-listarticles">
                                                <button type="button" class="btn tab-edit-btn">
                                                    <i class="far fa-eye"></i> Articles
                                                </button>
                                            </a>
                                        </div>
                                        <div class="tab-pane fade" id="certification" role="tabpanel"
                                            aria-labelledby="education-tab">
                                            <a href="/expert-post-certification-form">
                                                <button type="button" class="btn tab-edit-btn">
                                                    <i class="fas fa-edit"></i> Post Certification
                                                </button>
                                            </a>
                                            <a href="/expert-list-certification">
                                                <button type="button" class="btn tab-edit-btn">
                                                    <i class="far fa-eye"></i> Certifications
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link profilenav active" id="certification-tab"
                                                data-toggle="tab" href="#jobs" role="tab" aria-controls="certification"
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
                                        <div class="tab-pane show active" id="jobs" role="tabpanel"
                                            aria-labelledby="education-tab">
                                            <a href="/expert-post-job-form">
                                                <button type="button" class="btn tab-edit-btn">
                                                    <i class="fas fa-edit"></i> Post Job
                                                </button>
                                            </a>
                                            <a href="/expert-view-jobs-posted">
                                                <button type="button" class="btn tab-edit-btn">
                                                    <i class="far fa-eye"></i> Posted Jobs
                                                </button>
                                            </a>
                                            {{-- <a href="/expert-view-job-participants">
                                                <button type="button" class="btn tab-edit-btn">
                                                    <i class="far fa-eye"></i> Participants
                                                </button>
                                            </a> --}}
                                        </div>
                                        <div class="tab-pane fade" id="internships" role="tabpanel"
                                            aria-labelledby="education-tab">
                                            <a href="/expert-post-internship-form">
                                                <button type="button" class="btn tab-edit-btn">
                                                    <i class="fas fa-edit"></i> Post Internship
                                                </button>
                                            </a>
                                            <a href="/expert-view-internships-posted">
                                                <button type="button" class="btn tab-edit-btn">
                                                    <i class="far fa-eye"></i> Posted Internship
                                                </button>
                                            </a>
                                            {{-- <a href="/expert-view-internship-participants">
                                                <button type="button" class="btn tab-edit-btn">
                                                    <i class="far fa-eye"></i> Participants
                                                </button>
                                            </a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div id="accordion">
                            <div class="text-center">
                                <div class="" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            Articles
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordion">
                                    <div class="">

                                        <a href="/expert-postarticle">
                                            <button type="button" class="btn tab-edit-btn">
                                                <i class="fas fa-edit"></i> Post Article
                                            </button>
                                        </a>
                                        <a href="/expert-listarticles">
                                            <button type="button" class="btn tab-edit-btn">
                                                <i class="far fa-eye"></i> View Articles
                                            </button>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            Certificate
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordion">
                                    <div class="">

                                        <a href="/expert-postarticle">
                                            <button type="button" class="btn tab-edit-btn">
                                                <i class="fas fa-edit"></i> Post Certification
                                            </button>
                                        </a>
                                        <a href="/expert-viewarticle">
                                            <button type="button" class="btn tab-edit-btn">
                                                <i class="far fa-eye"></i> View Certifications
                                            </button>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Jobs
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordion">
                                    <div class="">


                                        <a href="/expert-post-job-form">
                                            <button type="button" class="btn tab-edit-btn">
                                                <i class="fas fa-edit"></i> Post Job
                                            </button>
                                        </a>
                                        <a href="/expert-view-jobs-posted-page">
                                            <button type="button" class="btn tab-edit-btn">
                                                <i class="far fa-eye"></i> View Jobs Posted
                                            </button>
                                        </a>
                                        <a href="/expert-view-job-participants">
                                            <button type="button" class="btn tab-edit-btn">
                                                <i class="far fa-eye"></i> View Participants
                                            </button>
                                        </a>


                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="" id="headingFour">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseFour" aria-expanded="false"
                                            aria-controls="collapseFour">
                                            Internships
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                    data-parent="#accordion">
                                    <div class="">

                                        <a href="/expert-post-internship">
                                            <button type="button" class="btn tab-edit-btn">
                                                <i class="fas fa-edit"></i> Post Internship
                                            </button>
                                        </a>
                                        <a href="/expert-view-internship-posted">
                                            <button type="button" class="btn tab-edit-btn">
                                                <i class="far fa-eye"></i> View Internships Posted
                                            </button>
                                        </a>
                                        <a href="/expert-view-internship-participants">
                                            <button type="button" class="btn tab-edit-btn">
                                                <i class="far fa-eye"></i> View Participants
                                            </button>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 offset-lg-0 no-gutters pl-lg-0 pl-4 pr-4">
                <div class="col-md-12">
                    <div class="card trending-card right-card ml-0 mr-0 mb-4 mb-sm-4 mb-md-4 mb-sm-0">
                        <div class="card-header">
                            <i class="fas fa-hashtag"></i> Trending Articles
                        </div>
                        <div class="card-body">
                            no articles
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
