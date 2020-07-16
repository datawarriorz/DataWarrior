@extends('layout.mainlayout')

@section('content')
<link rel="stylesheet" href="./css/certificationack.css" />
<div class="container">
    <br>
    <div class="card">
        <div class="card-header text-center">
            <h3>Acknowledgment</h3>
        </div>
        <br>
        <div class="col-md-12">
            <ul class="row list-unstyled certification-list">
                <li class="col-sm-12">
                    <br>
                    <div class="certification-card">
                        <br>
                        <h4>Thank You</h4>
                        <p>You have successfully applied for
                            @foreach($certification as $cert)
                            {{$cert->title}}
                            @endforeach
                            Certification
                        </p>
                        <p>We will contact you via your registererd email within 1 to 2 business days
                        </p>
                        <br>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="col-sm-6 col-md-6 col-lg-12">
                                <a href="/certification">
                                    <button type="button" class="btn cert-ack-btn"> <i class="fas fa-list-ul"></i>
                                        View More Certification</button>
                                </a>
                            </div>
                            <p></p>
                            <div class="col-sm-6 col-md-6 col-lg-12">
                                <a href="/home">
                                    <button type="button" class="btn cert-ack-btn">Go to HomePage</button>
                                </a>
                            </div>
                            <p></p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <br>
</div>
@endsection