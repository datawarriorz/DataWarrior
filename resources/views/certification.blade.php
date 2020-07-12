@extends('layout.mainlayout')

@section('content')
<link rel="stylesheet" href="./css/certification.css" />

    <div class="container">
        <p ><h3> Certifications</h3></p>
        <div class="col-xs-12"> 
            <ul class="row list-unstyled certification-list"> 
                @foreach($certification as $cert)
                <li class="col-sm-6"> 
                    
                    <h3> 
                        {{$cert->title}}
                    </h3> 
                    <h5>
                        - By {{$cert->provider}}
                    </h5>
                    <p>
                        {{$cert->description}}
                    </p>
                    <?php $i=1;
                    ?>
                    @foreach($certificationapplied as $ca)
                        @if($cert->cert_id==$i)
                        @if($ca->cert_id==$cert->cert_id)
                            You have already applied for this certification
                            @break
                         
                    
                        @else
                        
                   
                            <form method="POST" action="/applycertification">
                                @csrf
                            <input type="hidden" name="cert_id" value={{$cert->cert_id}} />
                            <button type="submit" class="btn tab-edit-btn">Apply For Certification 
                            <i class="fas fa-edit"></i></button>
                            </form>
                            @break
                        @endif 
                        @endif

                         @endforeach

                        

                         
                </li>
                <?php 
               $i++; ?>
                @endforeach
                         </ul>
        </div>   
        @foreach($certification as $cert)
        @foreach($certificationapplied as $ca) 
        @if($cert->cert_id==$ca->cert_id)
            applied
           certid {{$ca->cert_id}}
        @else
            @if($ca->cert_id==$cert->cert_id)
            button
            @endif    
        @endif    

        @endforeach
        @endforeach
    </div>


@endsection