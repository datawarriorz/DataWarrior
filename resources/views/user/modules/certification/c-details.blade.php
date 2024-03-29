@extends('user.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/user/user-9-2-view-certification.css') }}">

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
                                    <form method="post" action="/certificationlist">
                                        @csrf
                                        <input type="hidden" name="cert_domain"
                                            value="{{ $certification->cert_domain }}">
                                        <button class="tab-edit-btn2" type="submit">
                                            <i class="fas fa-arrow-left"></i> Back
                                        </button>
                                    </form>
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
                                    <h4 class="card-text">
                                        {{ $certification->cert_title }}
                                    </h4>
                                    <br>
                                    <p class="card-text data">
                                        <strong class="heading">By :</strong> {{ $certification->cert_provider }}
                                    </p>
                                    <p class="card-text data">
                                        <strong class="heading">Price :</strong> {{ $certification->cert_price }} /-
                                    </p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12 text-left">
                            <strong>Description :</strong>
                            <p class="data"><?php echo nl2br($certification->cert_description); ?></p>
                        </div>
                        <div class="col-md-12 text-left">
                            <strong>Pre Requisites :</strong>
                            <p class="data"><?php echo nl2br($certification->cert_prerequisites); ?></p>
                        </div>
                        <div class="col-md-12 text-left">
                            <strong>Validation :</strong>
                            <p class="data"><?php echo nl2br($certification->cert_validationperiod); ?></p>
                        </div>
                        <br>
                        <div class="col-md-12 text-center">
                            @if($certificationapplied==0)
                                <form method="POST" action="/applycertification">
                                    @csrf
                                    <input type="hidden" name="cert_id" value={{ $certification->cert_id }} />
                                    <button type="submit" class="btn tab-edit-btn">Apply For Certification
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <br>
                                </form>
                            @else
                                <div style="color:#25ac25;">
                                    You have already applied for this Certification <i class="fas fa-check-square"></i>
                                </div>

                            @endif
                        </div>
                        <br>
                        <div class="col-md-12 text-center">
                            <form method="post" action="/certificationlist">
                                @csrf
                                <input type="hidden" name="cert_domain" value="{{ $certification->cert_domain }}">
                                <button class="btn tab-edit-btn" type="submit">
                                    View More
                                </button>
                            </form>
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
