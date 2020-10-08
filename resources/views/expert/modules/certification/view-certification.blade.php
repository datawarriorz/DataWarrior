@extends('expert.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="./css/expert/expert-6-1-view-certification.css">

<div class="col-12">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 offset-lg-0 no-gutters pl-4 pr-4">
            <div class="col-md-12">
                <div class="card dashboard-card ml-0 mr-0 mb-0 mb-sm-0 mb-md-0 mb-lg-4">
                    <div class="card-header">
                        <div class="col-12 pl-0 pr-0">
                            <div class="row">
                                <div class="col-8 text-left">
                                    <div style="margin-bottom: 0px"><i class="fas fa-columns"></i> Certification
                                        #{{ $certification->cert_id }}</div>
                                </div>
                                <div class="col-4 text-right">
                                    <a class="tab-edit-btn" href="/expert-list-certification">
                                        <i class="fas fa-arrow-left"></i> Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body dashboard-card-body">
                        <div class="col-md-12 text-left">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 text-sm-center text-md-left">
                                    <img class="cert-img" alt="..."
                                        src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($certification->cert_image); ?>" />
                                </div>
                                <div class="col-12 col-sm-12 col-md-8 col-lg-8 text-sm-center text-md-left">
                                    <p class="card-text">
                                        <strong>{{ $certification->cert_title }}</strong></p>
                                    <br>
                                    <p class="card-text">
                                        By - {{ $certification->cert_provider }}
                                    </p>
                                    <p class="card-text">
                                        Price - {{ $certification->cert_price }} /-
                                    </p>
                                    <p class="card-text">
                                        Domain - {{ $certification->cert_domain }} /-
                                    </p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12 text-left">
                            <strong>Description :</strong>
                            <p><?php echo nl2br($certification->cert_description); ?></p>
                        </div>
                        <div class="col-md-12 text-left">
                            <strong>Pre Requisites :</strong>
                            <p><?php echo nl2br($certification->cert_prerequisites); ?></p>
                        </div>
                        <div class="col-md-12 text-left">
                            <strong>Validation :</strong>
                            <p><?php echo nl2br($certification->cert_validationperiod); ?></p>
                        </div>
                        <br>
                        <div class="col-md-12 text-center">
                            <a href="/expert-list-certification">
                                <button type="button" class="btn tab-edit-btn">
                                    View More
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 offset-lg-0 no-gutters pl-lg-0 pl-4 pr-4">
            <div class="col-md-12">
                <div class="card trending-card right-card ml-0 mr-0 mb-4 mb-sm-4 mb-md-4 mb-sm-0">
                    <div class="card-header">
                        <i class="fas fa-hashtag"></i> Latest Certifications
                    </div>
                    <div class="card-body">
                        coming soon
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
