@extends('user.layout.masterlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/user/user-7-1-internship-list.css') }}" />
<div class="ji-list-content col-12 col-sm-12 col-md-12 col-lg-12 text-center no-pad no-gutters">
    <br>
    <div class="ji-list-header">
        <div class="row no-gutters">
            <div class="col-12 col-sm-12 col-md-12 col-lg-7 offset-lg-4">
                <h4><?php $i=0; ?>
                    @foreach($jobsobj as $jo)
                        <?php $i++; ?>
                    @endforeach<?php echo $i;?> internships available
                    <i class="fas fa-chevron-down"></i></h4>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-7 offset-lg-4 ji-list-m-filter">
                <div class="accordion" id="accordionExample">
                    <div class="col-10 offset-1">
                        <div class="card text-center" style="background-color:transparent">
                            <div class="" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <h4><small><b>Filters</b></small> <i class="fas fa-filter"></i></h4>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse hide" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <form method="POST" action="/jobfilterapply">
                                        @csrf
                                        @if(count($errors))
                                            <div class="alert alert-danger">
                                                <strong>Whoops!</strong> There were some problems with your input.
                                                <br />
                                                <ul>
                                                    @foreach($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <label>Domain</label>
                                            <select class="form-control custom-select col-12" id="job_domain"
                                                name="job_domain">
                                                <option value=''>--</option>
                                                @foreach($jobdomainobj as $sl)
                                                    <option value="{{ $sl->job_domain }}">{{ $sl->job_domain }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Location</label>
                                            <select class="form-control custom-select col-12" id="job_location"
                                                name="job_location">
                                                <option value=''>--</option>
                                                @foreach($joblocationobj as $sl)
                                                    <option value="{{ $sl->job_location }}">{{ $sl->job_location }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Job Duration</label>
                                            <select class="form-control custom-select col-12" id="job_shift"
                                                name="job_shift">
                                                <option value=''>--</option>
                                                @foreach($jobshiftobj as $sl)
                                                    <option value="{{ $sl->job_shift }}">{{ $sl->job_shift }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input type="hidden" name="job_type_id" value="2">
                                        <div class="form-group col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary" style="font-weight: 500">
                                                Search
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="ji-list-body col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="ji-list-content">
            <div class="row no-gutters">
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 offset-lg-1 ji-list-filter">
                    <br>
                    <div class="card">
                        <p></p>
                        <h5><small><b>FILTERS</b><i class="fas fa-filter"></i></small></h5>
                        <div class="card-body text-left">
                            <form method="POST" action="/jobfilterapply">
                                @csrf
                                @if(count($errors))
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.
                                        <br />
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label>Domain</label>
                                    <select class="form-control custom-select col-12" id="job_domain" name="job_domain">
                                        <option value=''>--</option>
                                        @foreach($jobdomainobj as $sl)
                                            <option value="{{ $sl->job_domain }}">{{ $sl->job_domain }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Location</label>
                                    <select class="form-control custom-select col-12" id="job_location"
                                        name="job_location">
                                        <option value=''>--</option>
                                        @foreach($joblocationobj as $sl)
                                            <option value="{{ $sl->job_location }}">{{ $sl->job_location }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Job Shift</label>
                                    <select class="form-control custom-select col-12" id="job_shift" name="job_shift">
                                        <option value=''>--</option>
                                        @foreach($jobshiftobj as $sl)
                                            <option value="{{ $sl->job_shift }}">{{ $sl->job_shift }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="job_type_id" value="2">
                                <div class="form-group col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary" style="font-weight: 500">
                                        Search
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-10 offset-1 col-sm-10 offset-sm-1 col-lg-7">
                    @foreach($jobsobj as $jo)
                        <div class="ji-list-data text-left">
                            <br>
                            <div class="data-job-title col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                {{ $jo->job_title }}
                            </div>
                            <div class="data-job-company col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                {{ $jo->job_company }}
                            </div>
                            <br>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                Salary: ₹{{ $jo->job_salary }}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                Start Date: {{ $jo->job_starttime }}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                Apply By: <?php echo date_format($jo->job_apply_by,"d M' Y");?>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-md-6 text-left" style="color:#25ac25;padding: .375rem 1rem;">
                                        <?php $i=true; ?>
                                        @foreach($jobsappboj as $ja)
                                            @if($ja->job_id==$jo->job_id)
                                                Applied <i class="fas fa-check-square"></i>
                                                <?php $i=false; ?>
                                                @break
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col-12 col-md-6 text-right">
                                        <form method="post" action="/viewinternshipdetails">
                                            @csrf
                                            <input type="hidden" name="job_id" value={{ $jo->job_id }} />
                                            <button type="submit" class="btn btn-primary">
                                                View Details <i class="fas fa-arrow-right"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
</div>
@endsection
