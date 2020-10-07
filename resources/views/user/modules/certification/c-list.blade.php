@extends('user.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="./css/user/user-9-0-list-certifications.css" />
<div class="col-12 col-sm-12 col-md-10 offset-md-1" style="background-color: white;">
    <div class="col-12">
        <h2 class="text-xl lg:text-3xl leading-tight text-gray-800 font-bold mt-2">
            Certification for
        </h2>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <div class="jumbotron">

            </div>
        </div>
    </div>
</div>

<div class="container">
    <br>
    <div class="card">
        <div class="card-header text-center">
            <h3>Certifications</h3>
        </div>
        <br>
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
                                <td><input class="form-control" type="text" placeholder="Description"
                                        name="description" />
                                </td>
                            </tr>
                            <tr>
                                <td><input class="form-control" type="text" placeholder="Provider Name"
                                        name="provider" />
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
        </div>
    </div>
    <br>
</div>
@endsection
