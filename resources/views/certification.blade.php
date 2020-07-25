@extends('layout.mainlayout')

@section('content')
<link rel="stylesheet" href="./css/certification.css" />
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
                        <div class="card certification-card">
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
                            {{ $cert->cert_id }}
                            <button type="submit" class="btn tab-edit-btn">Apply For Certification
                                <i class="fas fa-edit"></i></button>
                            <br>
                            </form>
                            <p></p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-12 text-center">
            <div class="card text-center">
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
