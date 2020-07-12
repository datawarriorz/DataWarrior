@extends('layout.mainlayout')

@section('content')
<link rel="stylesheet" href="./css/certificationack.css" />
<div class="container">
    <p ><h3> Certifications</h3></p>
</div>
    <div class="container">
        
        <div class="col-xs-12"> 
            <ul class="row list-unstyled certification-list"> 
                @foreach($certification as $cert)
                <li class="col-sm-6"> 
                    <div class="widget-top">
                    </div> 
                    <h3> 
                        {{$cert->title}}
                    </h3> 
                    <h5>
                        - By {{$cert->provider}}
                    </h5>
                    <p>
                        {{$cert->description}}
                    </p> 
                    @foreach($certificationapplied as $ca)
                    @if($ca->cert_id==$cert->cert_id)
                        You have already applied for this certification
                    @endif
                    @if($ca->cert_id!=$cert->cert_id)
                    <form method="POST" action="/applycertification">
                        @csrf
                        <input type="hidden" name="cert_id" value={{$cert->cert_id}} />
                    <button type="submit" class="btn tab-edit-btn">Apply For Certification 
                        <i class="fas fa-edit"></i></button>
                    </form>
                    @endif
                    @endforeach
                </li>
                @endforeach
                         </ul>
        </div>            
    </div>

@endsection