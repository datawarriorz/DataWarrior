@extends('user.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="./css/user/user-9-1-list-certifications.css" />
<div class="col-12 col-sm-12 col-md-10 offset-md-1" style="background-color: white;">
    <div class="col-12">
        <br>
        <h3 class="text-xl lg:text-3xl leading-tight text-gray-800 font-bold mt-2">
            Certifications for <br class="d-block d-lg-none"> Data Science Domain
        </h3>
        <br>
    </div>
    <div class="container">
        <div class="row">
            @foreach($certification as $cert)
                <div class="col-12 col-sm-12 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="card">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <img class="cert-img" alt="..."
                                    src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($cert->cert_image); ?>" />
                            </div>
                            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                                <div class="card-body">
                                    <p class="card-text"><strong>{{ $cert->cert_title }}</strong></p>
                                    <p class="card-text"><?php echo substr(nl2br($cert->cert_description),0,100); ?>
                                        ...
                                    </p>
                                    <p class="card-text">Price: {{ $cert->cert_price }} /-</p>
                                    <p class="card-text">
                                        <small class="text-muted">
                                            <a
                                                href="<?php echo "http://localhost:8000/certificationdetails/".$cert->cert_id; ?>">
                                                View More >
                                            </a>
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <br>
</div>
{{-- 
<div class="container">
    <div class="col-md-12">
        <ul class="row list-unstyled certification-list">
@foreach($certification as $cert)
                <li class="col-sm-12">
                    <br>
                    <div class="certification-card">
                        <br>
                        <p>
                            <h3>
                                {{ $cert->title }}
</h3>
</p>
<h5>
    - By {{ $cert->provider }}
</h5>
<p>
    {{ $cert->description }}
</p>
<?php $i=true; ?>
@foreach($certificationapplied as $ca)
    @if($ca->cert_id==$cert->cert_id)
        <p>You have already applied for this certification</p>
        <?php $i=false; ?>
        @break

    @endif
@endforeach
@if($i==true)
    <form method="POST" action="/applycertification">
        @csrf
        <input type="hidden" name="cert_id" value={{ $cert->cert_id }} />
        <button type="submit" class="btn tab-edit-btn">Apply For Certification
            <i class="fas fa-edit"></i>
        </button>
        <br>
    </form>
    <p></p>
@endif
</div>
</li>
@endforeach
</ul>
</div>
<div class="col-4 offset-4 text-center">
    <div class="text-center">
        <p></p>
        <h3>Request a Certification</h3>
        <form action="/requestcertification" method="POST">
            @csrf
            <div class="col-md-12 col-md-auto text-center">
                <table class="table contact-table text-center">
                    <tr>
                        <td><input class="form-control" type="text" placeholder="Title" name="title" />
                        </td>
                    </tr>
                    <tr>
                        <td><input class="form-control" type="text" placeholder="Description" name="description" />
                        </td>
                    </tr>
                    <tr>
                        <td><input class="form-control" type="text" placeholder="Provider Name" name="provider" />
                        </td>
                    </tr>
                    <tr>
                        <td><button class="btn btn2" id="contact-submit" type="submit">Submit</button>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
    <br>
</div> --}}
@endsection
