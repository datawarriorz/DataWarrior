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
                            {{$cert->title}}
                        </h3>
                        </p>
                        <h5>
                            - By {{$cert->provider}}
                        </h5>
                        <p>
                            {{$cert->description}}
                        </p>
                        <?php $i=1; ?>
                        @foreach($certificationapplied as $ca)
                        @if($cert->cert_id==$i)
                        @if($ca->cert_id==$cert->cert_id)
                        <br>
                        <p>You have already applied for this certification</p>
                        @break
                        @else
                        <form method="POST" action="/applycertification">
                            @csrf
                            <input type="hidden" name="cert_id" value={{$cert->cert_id}} />
                            <button type="submit" class="btn tab-edit-btn">Apply For Certification
                                <i class="fas fa-edit"></i></button>
                            <br>
                        </form>
                        @break
                        @endif
                        @endif
                        @endforeach
                    </div>
                </li>
                <?php
               $i++; ?>
                @endforeach
            </ul>
        </div>
    </div>
    <br>
</div>


@endsection